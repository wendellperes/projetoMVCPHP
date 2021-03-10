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
            $where = 'email_aluno = "'.$_POST["emailLogin"].'" and senha = "'.$_POST["senhaLogin"].'"'
            : $where = 'email_professor = "'.$_POST["emailLogin"].'" and senha = "'.$_POST["senhaLogin"].'"';

        $response =  ReadDatabaseModel::getDadosBanco($nometabela, $where);

        //verifica se retornou com dados
        if ($response){

            //verifica qual a permissao do usuario que tentou logar para redirecionar para pagina certa
            if($response[0]->permissao === 'Professor'){

                $_SESSION['id'] = $response[0]->id;
                $_SESSION['nomeUser'] = $response[0]->nome_professor;
                header("location: http://localhost/webart/user/logado");
                //chama dashboard professor


            }else{
                $_SESSION['id'] = $response[0]->id;
                echo $_SESSION['id'];
                echo "<pre>"; print_r($response); echo "</pre>";
                //chama dashbaord aluno
            }

        //caso nao tenha restornado dados informa que email e senha estao incorretos
        }else{
            //volta a home com notificação de email e senha incorretos
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
                $conteudobody = $body->render(['cadastroRealizado'=>'naoencontrado', ]);
                //da um echo da rendizacao
                echo $conteudobody;
            }catch (LoaderError $error){
                echo 'errorLoader1--'.$error;
            }catch (RuntimeError $error2){
                echo 'errorRodar'.$error2;
            }catch (Error $error3){

            }
        }
    }
}
