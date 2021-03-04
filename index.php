<?php
require 'vendor/autoload.php';
require_once 'src/App/view/header.php';
use App\Controller\CoreController;
$core = new CoreController();
$core->star($_GET);
