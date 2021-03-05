<?php

namespace App\Classes;
use \PDO;
use \PDOException;
class BancoConexao{
    /**
     * Variavel que armazenara minha conexão com o banco
     * e sera chamada sempre que necessitado
     * @var PDO
     */
    public static $conexao;

    /**
     * Variavel que ira receber os dados da Tabela sempre que chamado
     */
    private $table;

    /**
     * Variavel que ira receber os dados do host
     */
    private $host;

    /**
     * Variavel que ira receber os dados da user
     */
    private $user;

    /**
     * Variavel que ira receber os dados da pass
     */
    private $senha;

    /**
     * Variavel que ira receber os dados da dbname
     */
    private $database;



    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /*
     * Metodo responsavel por criar uma conexao com o Banco
     */
    private function setConnection(){
        try {
            $chamarDadosBanco = new DadosBanco();
            $this->host = $chamarDadosBanco->getHost();
            $this->user = $chamarDadosBanco->getUser();
            $this->senha = $chamarDadosBanco->getSenha();
            $this->database = $chamarDadosBanco->getDataBase();

            $dsn = 'mysql:host='.$this->host.';dbname='.$this->database.'';
            self::$conexao = new PDO($dsn, $this->user, $this->senha);
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $PDOException){
            die('Error: coneection'.$PDOException->getMessage());

        }
    }

    /**
     * metodo responsavel por executar as querys
     * @param string $query
     * @param array $param
     * @return \PDOStatement
     */
    public function executar($query, $param = []){
        try {
            $statement = self::$conexao->prepare($query);
        }catch (PDOException $e){
            die('erro:76 '.$e->getMessage());
        }
    }

    /**
     * Método Responsavel pela inserção de Dados
     */
    public function inserir($params){

        $campos = array_keys($params);

        /**
         * seta as posições de acordo com numero de campos que tiver nos params
         * atraves do array_pad
         */
        $contador = array_pad([],count($campos), '?');
        //echo "<pre>"; print_r($contador); echo "</pre>"; exit;

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$campos).') VALUES('.implode(',',$contador).')';
        echo $query;
        exit;
    }

    /**
     * Método responsavel pela recuperação de dados
     */
    public function recuperarDados($params){
//        $campos = array_keys($params);
//
//        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$campos).') VALUES(?,?,?)';
//        echo $query;
//        exit;

    }
}
