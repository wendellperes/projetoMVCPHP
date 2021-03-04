<?php
    namespace App\Controller;
    class CoreController{
        private $url;
        private $controller;
        private $methods = 'index';
        private $params = [];

        public function star($request){
            if(isset($request['url'])){
                $this->url = explode('/', $request['url']);
                $this->controller = ucfirst($this->url[1].'Controller');

                if (isset($this->url[2]) && $this->url[2]  != ''){
                    $this->methods = $this->url[2];
                }else return false;

                if (isset($this->url[3]) && $this->url[3] != ''){
                    $this->params = $this->url[3];
                }else {
                    $this->params = $this->params;
                }

                /*
                 * Verificar cada url chamada pelos formulario ou links
                 */
                if ($this->controller === 'CreateController' && $this->methods === 'user'){
                    $view = new CreateUserController();
                    $view->createUser();
                }
            }else{
                $view = new HomeController();
                $view->exibirHome();
                //redireciona para home
            }

        }
    }
