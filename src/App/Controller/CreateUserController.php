<?php
namespace App\Controller;

class CreateUserController{
    private $resposta = false;
    public function createUser(){
        echo $_POST['nome'];
        //$chamarDadosUser = new UsuarioClass($_POST['nome']);


    }
}
