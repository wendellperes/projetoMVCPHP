<?php
require 'vendor/autoload.php';
require_once 'src/App/view/header.php';
use App\Controller\CoreController;
use App\Model\ReadDatabaseModel;
session_start();
$core = new CoreController();
$core->star($_GET);


//resgate de dados via model
//$dados =  ReadDatabaseModel::getDadosBanco('email_aluno = "wendel.peres@hotmail.com"');
//
//echo "<pre>"; print_r($dados); echo "</pre>";


