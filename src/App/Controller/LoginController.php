<?php
namespace App\Controller;


use App\Model\ReadDatabaseModel;
use App\Classes\Usuario;
use App\Model\CreateUsuarioModel;
use App\Model\VerificacaoUsuarioModel;
use App\Classes\BancoConexao;
use Twig\Environment;
use Twig\Error\Error;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Loader\FilesystemLoader;
class LoginController{
    /**
     * reposta que ira prosseguir com o cadastro
     * @var string
     */
    private $resposta = false;

    /**
     * Estas duas variaveis serao enviadas para o modal para checkar duplicidade
     * @var string
     */
    private $emailLogin;
    private $senhaLogin;

    public function loginUser(){

        /*
         * usando operador ternario para inserir nome da tabela e da condicao de busca no banco de dados
         */
        $_POST['permissao'] === 'Aluno' ? $nometabela = 'usuario_aluno' : $nometabela = 'usuario_professor';

        $nometabela === 'usuario_aluno' ?
            $whereEmail = 'email_aluno = "'.$_POST["emailLogin"].'" and senha = "'.$_POST["senhaLogin"].'"'
            : $whereEmail = 'email_professor = "'.$_POST["emailLogin"].'" and senha = "'.$_POST["senhaLogin"].'"';

        $response =  ReadDatabaseModel::getDadosBanco($nometabela, $whereEmail);

        //verifica se retornou com dados
        if ($response){

            //verifica qual a permissao do usuario que tentou logar para redirecionar para pagina certa
            if($response[0]->permissao === 'Professor'){

                $_SESSION['id'] = $response[0]->id;
                $_SESSION['nomeUser'] = $response[0]->nome_professor;
                header("location: http://localhost/webart/user/logado");
                //include __DIR__."/../view/home-professor.php";
                //chama dashboard professor


            }else{
                $_SESSION['id'] = $response[0]->id;
                //chama dashboard professor
                echo $_SESSION['id'];
                echo "<pre>"; print_r($response); echo "</pre>";
                //chama dashbaord aluno
            }

        //caso nao tenha restornado dados informa que email e senha estao incorretos
        }else{
            //volta a home com notificação de email e senha incorretos
            echo 'nao trouxe dados';
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
