<?php
require 'vendor/autoload.php';
require_once 'src/App/view/header.html';
use App\Controller\CoreController;

session_start();

$core = new CoreController();
$core->star($_GET);




