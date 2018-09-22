<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';

  require_once('config.php');

  require_once('model/connectdb.php');

 
$DB = new DBPDO();

$mail = new PHPMailer(true);


  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'view';
    $action     = 'home';
  }

  session_start();
  
  if(isset($_GET['type']) && $_GET['type'] == 'action'){
    require_once('routes.php'); 
  }else{
    require_once('view/layout.php');
  }


  
?>