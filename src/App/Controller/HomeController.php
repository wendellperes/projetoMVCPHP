<?php
namespace App\Controller;
use Twig\Environment;
use Twig\Error\Error;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Loader\FilesystemLoader;

class HomeController{
    public function exibirHome(){

        try {
            $loader = new FilesystemLoader('src/App/View');
            $twig = new Environment($loader, [
                'cache'=>'/path/to/compilation_cache',
                'auto_reload'=>true]);
            $body = $twig->load('home.html');

            //$conteudohead = $head->render();
            $conteudobody = $body->render();
            //echo $conteudohead;
            echo $conteudobody;
        }catch (LoaderError $error){
            echo 'errorLoader1--'.$error;
        }catch (RuntimeError $error2){
            echo 'errorRodar'.$error2;
        }catch (Error $error3){

        }

    }
}
