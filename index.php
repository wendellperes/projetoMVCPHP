<?php
require 'vendor/autoload.php';
require_once 'src/App/view/header.php';
use App\Controller\CoreController;
use App\Model\ReadDatabaseCursosModel;

session_start();
$core = new CoreController();
$core->star($_GET);

//
//if($response == 'UsuarioLogado'){
//    include __DIR__."/../webart/src/App/view/home-professor.php";
////    require_once 'src/App/view/home-professor.php';
//}
//if (isset($_SESSION['id'])){
//    $cursos = ReadDatabaseCursosModel::getDadosBanco('id_professor = "'.$_SESSION["id"].'"');
//    echo "<pre>"; print_r($cursos); echo "</pre>";
//}


