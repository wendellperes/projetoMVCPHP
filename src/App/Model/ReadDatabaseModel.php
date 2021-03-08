<?php

namespace App\Model;

use App\Classes\BancoConexao;
use \PDO;

class ReadDatabaseModel{
    /*
     * As variaveis de usu para Verificação do usuario
     * Serao atribuidas no Construct da Class
     */
    public $id;
    public $permissao;
    public $senha;




    /**
     * metodo estatico responsavel por trazer dados do Banco conforme as
     * parametros da busca
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getDadosBanco($nometable = null, $where = null, $order = null, $limit = null){
        return (new BancoConexao($nometable))->select( $where, $order, $limit)
                                                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
