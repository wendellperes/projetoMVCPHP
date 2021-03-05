<?php

namespace App\Model;

use App\Classes\BancoConexao;

class VerificacaoUsuario{
    /*
     * As variaveis de usu para Verificação do usuario
     * Serao atribuidas no Construct da Class
     */
    private $nomeUsuario;
    private $emailUsuario;

    public function __construct($nome, $email){
        $this->nomeUsuario = $nome;
        $this->emailUsuario = $email;
    }

    public function checkDados(){
        $objBanco = new BancoConexao('usuario_aluno');
        $objBanco->recuperarDados([
            'nome_aluno'=>$this->nomeUsuario,
            'email_aluno'=>$this->emailUsuario
        ]);
        //echo "<pre>"; print_r($objBanco); echo "</pre>"; exit;
        //return 'usuario sendo checado';
    }
}