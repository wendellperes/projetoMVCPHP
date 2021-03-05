<?php

namespace App\Model;

use App\Classes\BancoConexao;

class CreateUsuarioModel{
    /*
     * As variaveis de usu para Verificação do usuario
     * Serao atribuidas no Construct da Class
     */
    private $id;
    private $nomeUsuario;
    private $emailUsuario;
    private $senha;
    private $permissao;

    public function __construct($nome, $email, $senha, $permissao){
        $this->nomeUsuario = $nome;
        $this->emailUsuario = $email;
        $this->senha = $senha;
        $this->permissao = $permissao;
    }

    public function enviarDados(){

        /**
         * Um operador ternario verifica em qual tabela os dados serao inseridos
         */
        $this->permissao == 'Aluno' ?
            $nomeTabela = 'usuario_aluno'
            : $nomeTabela = 'usuario_professor';


        /**
         * Seta na variavel objBanco uma conexao com o banco
         * e passa para o metedo inserir o nome da tabela recebida no construt
         * e os nomes das colunas e valores atraves de um arrau
         */
        $objBanco = new BancoConexao($nomeTabela);
        $this->id = $objBanco->inserir([
            'nome_aluno'=>$this->nomeUsuario,
            ' email_aluno'=>$this->emailUsuario,
            ' senha'=>$this->senha,
            ' permissao'=>$this->permissao,
        ]);

        //retorna true com o sucesso do insert nos dados
        return true;

    }
}