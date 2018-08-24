<?php


  require_once('config.php');

  require_once('model/connectdb.php');

 
$DB = new DBPDO();


  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'view';
    $action     = 'home';
  }
  session_start();
  require_once('view/layout.php');

  
?>