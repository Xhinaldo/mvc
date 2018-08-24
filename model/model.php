<?php

include 'connectdb.php';

$conn=connect::connect();
/**
 * 
 */
class model
{
	
	function model(){

		public function exists($data)
	{
		$email=$data;
		$sql="SELECT email,password,name,surname,active FROM users WHERE email='$email'";
		global $conn;
		$result=$conn->query($sql);
		if($result->num_rows>0)
			return 1;
		return 2;
	}
	public function login()
	{
		if (isset($_REQUEST['email'])&&isset($_REQUEST['password'])) {
			$loguar=Model::exists($_REQUEST['email']);
			return $loguar;
		}
		return 3;
	}
	public function register()
	{
		if (isset($_REQUEST['name'])&&isset($_REQUEST['surname'])&&isset($_REQUEST['email'])&&isset($_REQUEST['password'])&&isset($_REQUEST['kpassword'])) {
			$rregjistruar=Model::exists($_REQUEST['email']);
			if($rregjistruar==1)
				return 'exists';
			else{
				$name=$_REQUEST['name'];
				$surname=$_REQUEST['surname'];
				$email=$_REQUEST['email'];
				$hash_password=md5($_REQUEST['name']);
				$active=0;
				$hash = md5( rand(0,1000) );
				$sql="INSERT INTO users(name,surname,email,password,hash,active) VALUES('$name','$surname','$email','$hash_password','$hash','$active')";
				global $conn;
				$result=$conn->query($sql);
				
			}return 'done';
		}
	}
}
}
	


?>