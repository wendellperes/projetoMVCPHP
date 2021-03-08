<?php
namespace App\Classes;
class Usuario{
    private $nome;
    private $email;
    private $senha;
    private $permissao;
    private $array = [];
    public function __construct($nome = null, $email = null, $senha = null, $permissao = null){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->permissao = $permissao;
    }
    public function getDados(){

        $this->array['nome'] = $this->nome;
        $this->array['email'] = $this->email;
        $this->array['senha'] = $this->senha;
        $this->array['permissao'] = $this->permissao;
        return $this->array;
    }
}
