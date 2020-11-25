<?php 
namespace src\core;

class Application
{
    private $url_controller = null;

    private $url_action = null;

    private $url_params = array();

    public function __construct() {
        $this->splitUrl();

        if (!$this->url_controller) {

            $page = new \src\controller\MedicoController;
            $page->index();

        } elseif (file_exists('../src/controller/' . ucfirst($this->url_controller) . 'Controller.php')) {
            $controller = "\\src\\controller\\" . ucfirst($this->url_controller) . 'Controller';
            $this->url_controller = new $controller();

            if (method_exists($this->url_controller, $this->url_action) &&
                is_callable(array($this->url_controller, $this->url_action))) {
                
                if (!empty($this->url_params)) {
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                if (strlen($this->url_action) == 0) {
                    $this->url_controller->index();
                } else {
                    $page = new \Mini\Controller\ErrorController();
                    $page->index();
                }
            }
        } else {
            echo 'Erro!';
        }
    }
    
    private function splitUrl() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        array_splice($url, 0, 2);

        echo print_r($url);
        $this->url_controller = isset($url[0]) ? $url[0] : null;
        $this->url_action = isset($url[1]) ? $url[1] : null;

        unset($url[0], $url[1]);

        $this->url_params = array_values($url);

        echo '<br/> Controller: '.$this->url_controller;
        echo '<br/> Action: '.$this->url_action;
        echo '<br/> Id: '.print_r($this->url_params).'<br/>';
    }
}
?>