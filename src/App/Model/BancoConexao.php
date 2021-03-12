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
    public  $conexao;

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
            $this->conexao = new PDO($dsn, $this->user, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
            $statement = $this->conexao->prepare($query);
            $statement->execute($param);
            return $statement;
        }catch (PDOException $e){
            echo 'erro:78'.$e;
            //return false;
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

        /**
         * chamo o metodo Executar passando os parametros de
         * Query e Valores
         * Assim executando os Valores
         */
        $this->executar($query, array_values($params));

        /**
         * um retorno do ultimo id inserido
         * caso tudo tenha dado certo o id inserido sera retornado
         */
        return  $this->conexao->lastInsertId();
    }
    /**
     * Método Responsavel pela inserção de Dados
     */
    public function update($where, $values){
    $campos = array_keys($values);

    //monta query
    $query = 'UPDATE '.$this->table.' SET '.implode('=?', $campos).' = ?   WHERE   '.$where;
        if ($this->executar($query, array_values($values))){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Método responsavel pela recuperação de dados
     */
    public function select($where = null, $order = null, $limit = null){
        $where = strlen($where) ? 'WHERE '. $where : '';
        $order = strlen($order) ? 'ORDER BY '. $order : '';
        $limit = strlen($limit) ? 'LIMIT '. $limit : '';

        $query = 'SELECT * FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        return $this->executar($query);

    }
}
