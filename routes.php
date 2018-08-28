<?php


  function call($controller, $action) {
    require_once('controller/' . $controller . '_controller.php');

    switch($controller) {
      case 'view':
        $controller = new PagesController();
      break;
      case 'user':
        $controller = new User_Controller();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array('view' => ['home', 'error','university' ],
                        'user' => ['register','test','login','logout'] , 
                      );

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('view', 'error_2');
    }
  } else {
    call('view', 'error_1');
  } 

?>