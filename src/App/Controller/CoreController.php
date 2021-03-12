<?php
    namespace App\Controller;
    use App\view\footer;

    class CoreController{
        private $url;
        private $controller;
        private $methods = 'index';
        private $params = '';
        private $user;

        /**
         * recebe o Parametro get do index e um chamada
         * @param $request
         * @return chamada para um controller diferente
         */
        public function __construct(){
            $this->user = $_SESSION['id'] ?? null;
        }

        public function star($request){
            //verifica se existe uma url
            //echo $_SESSION['id'];
            if(isset($request['url'])){
                //quebra a url em array e atribui valor de um dos 3 indices a varivael
                $this->url = explode('/', $request['url']);
                $this->controller = ucfirst($this->url[1].'Controller');

                if (isset($this->url[2]) && $this->url[2]  != ''){
                    $this->methods = $this->url[2];
                }else {
                    $this->methods = $this->methods;
                };
                if (isset($this->url[3]) && $this->url[3] != ''){
                    $this->params = $this->url[3];
                }else {
                    $this->params = '';
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


                }else if($this->controller === 'UserController' && $this->methods === 'logado' && $this->params == 'professor'){
                    require_once 'src/App/view/home-professor.php';
                    //aqui foi um teste criando uma classe que ira retornar o footer atraves de um echo
                    $footer = new footer();
                    $footer->getDados();


                }else if($this->controller === 'UserController' && $this->methods === 'logado' && $this->params == 'aluno'){

                    //chama o controller responsavel por renderizar a tela do home aluno
                    $view = new AlunoController();
                    $view->exibirHome();


                }else if ($this->controller === 'CreateController' && $this->methods === 'curso'){
                    $view = new CreateCursoController();
                    $view->createCurso();


                }else if ($this->controller === 'LogoutController' && $this->methods === 'check'){
                    session_destroy();
                    header("location: http://localhost/webart/");


                }else{
                    if(isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'Professor'){
                        require_once 'src/App/view/home-professor.php';

                    }else if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'Aluno'){

                        //chama o controller responsavel por renderizar a tela do home aluno
                        $view = new AlunoController();
                        $view->exibirHome();

                    }else{
                        //chama o controller home que exibe a tela home
                        $view = new HomeController();
                        $view->exibirHome();
                    }

                }
            }else{
                //verifica a existencia de session
                if(isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'Professor'){
                    require_once 'src/App/view/home-professor.php';

                }else if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'Aluno'){
                    //chama o controller responsavel por renderizar a tela do home aluno
                    $view = new AlunoController();
                    $view->exibirHome();


                }else{
                    //caso nao exista url
                    //e nem session ele exibe a home
                    //chama o controller home que exibe a tela home
                    $view = new HomeController();
                    $view->exibirHome();

                }

            }

        }
    }
