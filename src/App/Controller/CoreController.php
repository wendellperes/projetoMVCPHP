<?php
    namespace App\Controller;
    class CoreController{
        private $url;
        private $controller;
        private $methods = 'index';
        private $params = [];
        private $user;

        /**
         * recebe o Parametro get do index e um chamada
         * @param $request
         * @return chamada para um controller diferente
         */
        public function __construct(){
            $this->user = $_SESSION['user'] ?? null;
        }

        public function star($request){
            //verifica se existe uma url
            if(isset($request['url'])){
                //quebra a url em array e atribui valor de um dos 3 indices a varivael
                $this->url = explode('/', $request['url']);
                $this->controller = ucfirst($this->url[1].'Controller');
                if (isset($this->url[2]) && $this->url[2]  != ''){
                    $this->methods = $this->url[2];
                }else {
                    $this->url[2] = $this->methods;
                };

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

                }else if ($this->controller === 'LoginController' && $this->methods === 'check'){
                    $view = new LoginController();
                    $view->loginUser();
                }else if($this->controller === 'UserController' && $this->methods === 'logado'){

                    require_once 'src/App/view/home-professor.php';
                }else if ($this->controller === 'CreateController' && $this->methods === 'curso'){
                    $view = new CreateCursoController();
                    $view->createCurso();
                }else{
                    include __DIR__."/../view/404error.php";
                }
            }else{
                //caso nao exista url
                //chama a homeController responsavel por exibir a view da home
                $view = new HomeController();
                $view->exibirHome();

                require_once 'src/App/view/footer.php';
            }

        }
    }
