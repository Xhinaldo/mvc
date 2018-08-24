<?php

  class PagesController {
    public function home() {
      require_once('view/home.php');
    }

    public function error_1() {
      require_once('view/error_1.php');

    }

    public function error_2() {
      require_once('view/error_2.php');
    }
    public function university() {
      require_once('view/university.php');
    }
  }
?>