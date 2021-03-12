<?php
namespace App\Controller;


use App\Classes\Usuario;
use App\Model\CreateCursosModel;
use App\Model\CreateUsuarioModel;
use App\Model\ReadDatabaseModel;
use App\Model\VerificacaoUsuarioModel;
use App\Classes\BancoConexao;
use Twig\Environment;
use Twig\Error\Error;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Loader\FilesystemLoader;
class CreateCursoController{
    /**
     * reposta que ira prosseguir com o cadastro
     * @var string
     */
    public static  $resposta;

    /**
     * Estas duas variaveis serao enviadas para o modal para checkar duplicidade
     * @var string
     */
    public $nomeVerificacao;
    private $emailVerificacao;

    public function createCurso(){

        /*
         * Instanciando um novo Objeto da Classe CreateCursoModel na Variavel $chamarDadosCursos
         * Passando os Dados do Formulario via Post para o Construct
         */
        $chamarDadosCursos = new CreateCursosModel($_POST['id_professor'], $_POST['nome'], $_POST['imageCurso'], $_POST['cargaHoraria'], $_POST['categoria']);
        $response = $chamarDadosCursos->enviarDadosCurso();
        //print_r($response);
        if($response != 0){
            header("location: http://localhost/webart/user/logado/professor");
            self::$resposta = 'true';
            echo self::$resposta;
            //echo 'cadastro Realizado com sucesso';
        }else{
            header("location: http://localhost/webart/user/logado/professor");
            self::$resposta = 'false';
            echo self::$resposta;
            //echo 'nao cadastrou';
        }




    }
    public static function getResposta(){
        if (self::$resposta == 'true'){
            return 'true';

        }else{
            return 'false';
        }
    }

}
