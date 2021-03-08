<?php
namespace App\Controller;


use App\Classes\Usuario;
use App\Model\CreateUsuarioModel;
use App\Model\VerificacaoUsuarioModel;
use App\Classes\BancoConexao;
use Twig\Environment;
use Twig\Error\Error;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Loader\FilesystemLoader;
class CreateUserController{
    /**
     * reposta que ira prosseguir com o cadastro
     * @var string
     */
    private $resposta = false;

    /**
     * Estas duas variaveis serao enviadas para o modal para checkar duplicidade
     * @var string
     */
    private $nomeVerificacao;
    private $emailVerificacao;

    public function createUser(){
        /*
         * Instanciando um novo Objeto da Classe Usuario na Variavel $chamarDadosUser
         * Passando os Dados do Formulario via Post para o Construct
         */
        $chamarDadosUser = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['permissao']);

        /*
         * Seta nas Variaveis de verificação do nome e email
         */
        $this->nomeVerificacao = $chamarDadosUser->getDados()['nome'];
        $this->emailVerificacao = $chamarDadosUser->getDados()['email'];

        /*
         * Chama a Funcao de verificação de usuario
         */
        $this->verificationUser();

        /**
         * verifica se a variavel de resposta e false para prosseguir com o cadastro
         */
        if ($this->resposta == false){
            //instancia a model CreateUsuarioModel na variavel $chamarCreateUsermodel
            //enviado os dados do formulario para o construt da class
            $chamarCreateUserModel = new CreateUsuarioModel($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['permissao']);


            //esse if se trata da resposta do envio de dados para o banco
            //casotodo envio de dados seja verdadeiro ele vai entrar no try cath
            if ($chamarCreateUserModel->enviarDadosAluno()){

                //Neste try ele tenta exibir/renderizar a pagina home
                try {
                    $loader = new FilesystemLoader('src/App/View');

                    $twig = new Environment($loader, [
                        'cache'=>'/path/to/compilation_cache',
                        'auto_reload'=>true]);

                    //usa uma função do twig para carregar a pagina com o nome
                    $body = $twig->load('home.html');

                    //Aqui ele envia uma variavel que sera verificada pelo javascript
                    //que caso seja true exibirar um modal de sucesso na tela do usuario
                    //e mostra tbm o email que ele usou para fazer cadastro
                    $conteudobody = $body->render(['cadastroRealizado'=>'true', 'emailUser'=>"".$_POST['email'].""]);
                    //da um echo da rendizacao
                    echo $conteudobody;
                }catch (LoaderError $error){
                    echo 'errorLoader1--'.$error;
                }catch (RuntimeError $error2){
                    echo 'errorRodar'.$error2;
                }catch (Error $error3){

                }
                //chama view dashboard com sucesso
            }

        }else{

            //redireciona para home da pagina com uma mensagem de error
            //erro esse email ja esta cadastrado
        }



    }
    public function verificationUser(){
        //chamar o modal de verificação de cadastro duplicado do usuario
//        $chamarVerify = new VerificacaoUsuario($this->nomeVerificacao, $this->emailVerificacao);
//        $resposta = $chamarVerify->checkDados();

        //receber o valor booleano
        $this->resposta = false;
        return $this->resposta;
    }
}
