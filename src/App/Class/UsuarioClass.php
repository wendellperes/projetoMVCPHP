<?php
namespace App\Controller;

class UsuarioClass{
    private $nome;
    private $email;
    private $senha;
    private $permissao;
    private $array = [];

    public function __construct($nome, $email, $senha, $permissao){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->permissao = $permissao;
    }
    public function getDadosUser(){
        $this->array['nome'] = $this->nome;
        $this->array['email'] = $this->email;
        $this->array['senha'] = $this->senha;
        $this->array['permissao'] = $this->permissao;
        require $this->array;
    }

    public function createUser(){


    }
}
