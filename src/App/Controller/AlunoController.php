<?php
namespace App\Controller;
use Twig\Environment;
use Twig\Error\Error;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Loader\FilesystemLoader;
use App\Model\ReadDatabaseCursosModel;

class AlunoController{

    public function exibirHome(){

        try {

            $loader = new FilesystemLoader('src/App/View');
            $twig = new Environment($loader, [
                'cache'=>'/path/to/compilation_cache',
                'auto_reload'=>true]);
            $body = $twig->load('homealuno.html');
            $footer = $twig->load('footer.html');

            $valores = array(
                "dados" => ReadDatabaseCursosModel::getDadosBanco('id_professor = "1"'),
                "nomeuser" => 'professorparams'
            );

            $conteudobody = $body->render( $valores);
            $conteudoFooter = $footer->render();
            echo $conteudobody;
            echo $conteudoFooter;
        }catch (LoaderError $error){
            echo 'errorLoader1--'.$error;
        }catch (RuntimeError $error2){
            echo 'errorRodar'.$error2;
        }catch (Error $error3){

        }

    }
}
