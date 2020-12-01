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

        for ($i = 0; $i < count($url); $i++) {
            if (strcmp($url[$i], "src") == 0) {
                array_splice($url, 0, $i);
            }
        }

        $arrLength = count($url);

        switch ($arrLength) {

            case 1:
                break;
            
            case 2: 
                $url_controller = count($url) - 1 != -1 ? $url[count($url) - 1] : null;

                $this->url_controller = isset($url_controller) ? $url_controller : null;
                $this->url_action = isset($url_action) ? $url_action : null;
        
                break;
            case 3: 
                $url_controller = count($url) - 2 != -1 ? $url[count($url) - 2] : null;

                $url_action = count($url) - 1 != -1 ? $url[count($url) - 1] : null;

                $this->url_controller = isset($url_controller) ? $url_controller : null;
                $this->url_action = isset($url_action) ? $url_action : null;
        
                break;

            case 4: 
                $url_controller = count($url) - 3 != -1 ? $url[count($url) - 3] : null;

                $url_action = count($url) - 2 != -1 ? $url[count($url) - 2] : null;

                $this->url_controller = isset($url_controller) ? $url_controller : null;
                $this->url_action = isset($url_action) ? $url_action : null;
        
                $this->url_params = [end($url)];
                break;
            default:
                # code...
                break;
        }
    }
}
?>