<?php 

    namespace src\core;

    class RouterCore {
        private $uri;
        private $method;
        private $getArr = [];

        public function __construct()
        {
            $this->initialize();
            require_once('../src/routes/index.php');
            $this->execute();
        }

        private function initialize()
        {
            $this->method = $_SERVER['REQUEST_METHOD'];
            $uri = $_SERVER['REQUEST_URI'];

            $ex = explode('/', $uri);

            $uri = $this->normalizeURI($ex);

            for ($i = 0; $i < 2; $i++) {
                unset($uri[$i]);
            }

            $this->uri = implode('/', $this->normalizeURI($uri));
        }

        private function get($router, $call)
        {
            $this->getArr[] = [
                'router' => $router,
                'call' => $call
            ];
        }

        private function execute()
        {
            switch ($this->method) {
                case 'GET':
                    $this->executeGet();
                    break;
                case 'POST':

                    break;
            }
        }

        private function executeGet()
        {
            foreach ($this->getArr as $get) {
                $r = substr($get['router'], 1);
                if (substr($r, -1) == '/') {
                    $r = substr($r, 0, -1);
                }
                if ($r == $this->uri) {
                    if (is_callable($get['call'])) {
                        $get['call']();
                        break;
                    } else {
                        $this->executeController($get['call']);
                    }
                }
            }
        }

        private function executeController($get) {
            $ex = explode('@', $get);
            if (!isset($ex[0]) || !isset($ex[1])) {
                echo 'Dados inválidos';
            }

            $cont = 'src\\controller\\' . $ex[0];
            if (!class_exists($cont)) {
                echo 'Dados inválidos';
            }


            if (!method_exists($cont, $ex[1])) {
                echo 'Dados inválidos';
            }

            call_user_func_array([
                new $cont,
                $ex[1]
            ], []);
        }

        private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }
    }

?>