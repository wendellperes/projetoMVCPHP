<?php
namespace App\Classes;
class DadosBanco{
    private $host = 'localhost';
    private $user = 'root';
    private $senha = '';
    private $database = 'webart';

    public function getHost(){
        return $this->host;
    }
    public function getUser(){
        return $this->user;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getDataBase(){
        return $this->database;
    }
}