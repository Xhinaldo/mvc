<?php 

require_once('model/model.php');

class Controller

{

	public $connect;

	public function __construct()
	{
		$this->model = new connect();
	}

}


?>
