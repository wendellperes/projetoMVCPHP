<?php

namespace App\Model;

use App\Classes\BancoConexao;

use \PDO;

class ReadDatabaseCursosModel{
    /*
     * As variaveis de usu para Verificação do usuario
     * Serao atribuidas no Construct da Class
     */
    public $categoria;




    /**
     * metodo estatico responsavel por trazer dados do Banco conforme as
     * parametros da busca
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getDadosBanco($where = null, $order = null, $limit = null){
        return (new BancoConexao('cursos_cadastrados'))->select( $where, $order, $limit)
                                                        ->fetchAll(PDO::FETCH_ASSOC);
    }
}
