<?php

namespace App\Model;

use App\Classes\BancoConexao;
use \PDO;

class ReadDatabaseModel{
    /*
     * As variaveis de usu para Verificação do usuario
     * Serao atribuidas no Construct da Class
     */
    private $nomeUsuario;
    private $emailUsuario;
    private $senha;
    private $permissao;
    private $nomeTabela;

    public function __construct($nome = null, $email = null, $senha = null, $permissao = null){
        $this->nomeUsuario = $nome;
        $this->emailUsuario = $email;
        $this->senha = $senha;
        $this->permissao = $permissao;
        $this->permissao == 'Aluno' ? $this->nomeTabela = 'usuario_aluno' : $this->nomeTabela = 'usuario_professor';
    }

    /**
     * metodo estatico responsavel por trazer dados do Banco conforme as
     * parametros da busca
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getDadosBanco($where = null, $order = null, $limit = null){
        return (new BancoConexao('usuario_aluno'))->select($where, $order, $limit)
                                                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
