<?php
namespace App\Controller;


use App\Classes\Usuario;
use App\Model\UpdateCursosModel;
use App\Model\CreateUsuarioModel;
use App\Model\ReadDatabaseModel;
use App\Model\VerificacaoUsuarioModel;
use App\Classes\BancoConexao;
use Twig\Environment;
use Twig\Error\Error;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Loader\FilesystemLoader;
class UpdateCursoController{
    /**
     * reposta que ira prosseguir com o cadastro
     * @var string
     */
    public static  $resposta;


    public function UpdateCurso(){

        /*
         * Instanciando um novo Objeto da Classe CreateCursoModel na Variavel $chamarDadosCursos
         * Passando os Dados do Formulario via Post para o Construct
         */

        if (isset($_POST['imageCursoAtualiza'])){
            $chamarDadosCursos = new UpdateCursosModel($_POST['id_professor'], $_POST['nomeCursoAtualiza'], $_POST['imageCursoAtualiza'], $_POST['cargaHorariaAtualiza'], $_POST['categoriaAtualiza'], $_POST['id_curso']);
            $response = $chamarDadosCursos->enviarDadosCurso();
            var_dump($response);
            exit;
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
        }else{
            $chamarDadosCursos = new UpdateCursosModel($_POST['id_professor'], $_POST['nomeCursoAtualiza'], null, $_POST['cargaHorariaAtualiza'], $_POST['categoriaAtualiza'], $_POST['id_curso']);
            $response = $chamarDadosCursos->enviarDadosCurso();
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



        exit;
        //print_r($response);





    }
    public static function getResposta(){
        if (self::$resposta == 'true'){
            return 'true';

        }else{
            return 'false';
        }
    }

}
