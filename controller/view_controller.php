<?php

  class PagesController {
    public function home() {
      require_once('view/home.php');
    }

    public function error_1() {
      require_once('view/error_1.php');

    }

    public function uni_menu(){
      require_once('view/uni_menu.php');
    }

    public function error_2() {
      require_once('view/error_2.php');
    }
    public function university() {
      require_once('view/university.php');
    }
    public function verified() {
      require_once('view/verified.php');
    }
    public function broken_link(){
      require_once('view/broken_link.php');
    }
  }
?>