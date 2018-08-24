<?php


class User_Controller
{
	
	function __construct()
	{
		
	}
	public function test (){
		require_once('view/user/test.php');
	}

	public function register(){

		 require_once('view/user/register.php');
		global $DB;

		//$_SESSION['email'] = $_REQUEST['email'] ;
		//$_SESSION['username'] = $_REQUEST['username'] ;
		

		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if ($_SESSION['hs']) {
			
				$username = $_REQUEST['username'];
				$email = $_REQUEST['email'];
				$password =$_REQUEST['password'];

				
				
				//$sql= 
				$sql = "SELECT * FROM user_hs WHERE email=? ";
	    		$result = $DB->execute($sql, array($email));
			    
			    $result = $result->fetchAll(PDO::FETCH_ASSOC);

				
				if(count($result) > 0){
					echo "yes";
				} else{
					echo "nope";
					$sql = "INSERT INTO user_hs (username, email, password) VALUES (?, ?, ?)";
					$result= $DB->execute($sql, array($username,$email,$password));
				}
			}
			elseif ($_SESSION['uni']) {
			  	$username = $_REQUEST['username'];
				$email = $_REQUEST['email'];
				$password =$_REQUEST['password'];

				
				
				//$sql= 
				$sql = "SELECT * FROM user_uni WHERE email=? ";
	    		$result = $DB->execute($sql, array($email));
			    
			    $result = $result->fetchAll(PDO::FETCH_ASSOC);

				
				if(count($result) > 0){
					echo "yes";
				} else
				echo "nope";



				$sql = "INSERT INTO user_uni (username, email, password) VALUES (?, ?, ?)";
				$result= $DB->execute($sql, array($username,$email,$password));
				
			  }  
			  header("Location: http://localhost:8080/mvc/index.php?controller=user&action=login");
			  /* if ( mysqli_query($DB,$sql) ){


			        //$_SESSION['active'] = 0;
			        //$_SESSION['logged_in'] = true; 
			        //$_SESSION['message'] =
			   	    $_SESSION["email"]=$email;
			        $_SESSION["hash"]=$hash;
			                echo "<script>alert('sukses')</script>";
			                 "Confirmation link has been sent to $email, please verify
			                 your account by clicking on the link in the message!";

			        


			      
			        include("mail.php"); 
			        

			    }

			    else {
			        $_SESSION['message'] = 'Registration failed!';
			        header("location: error.php");
			    }
			} 
		}*/
		
		
		
	}
	} 



public function login (){
	require_once('view/user/login.php');
global $DB;
// session_start();
if (isset($_SESSION['email'])) {
	echo "<script>alert('Ju jeni loguar')</script>";
	header('Refresh: 0;url=http://localhost:8080/mvc/index.php?controller=view&action=home');
}

 
 

if(isset($_POST['login'])){
    
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = $_POST['password'];
    $sql = "SELECT * FROM user_hs WHERE email =?";
    $res_hs = $DB->execute($sql, array($email));
    $user_hs = $res_hs->fetch(PDO::FETCH_ASSOC);

    $sql1 = "SELECT * FROM user_uni WHERE email =?";
    $res_uni = $DB->execute($sql1, array($email));
    $user_uni = $res_uni->fetch(PDO::FETCH_ASSOC);

    if($user_hs === false && $user_uni === false){
        die('Incorrect email / password combination!');
    } 
    else{
	    if(!empty($user_hs)){
		    if ($user_hs['password']===$passwordAttempt){
		        	//Provide the user with a login session.
		            $_SESSION['user_id'] = $user['id'];
		            $_SESSION['logged_in'] = time();
		            
		            //Redirect to our protected page, which we called home.php
		            $_SESSION['email']=$email;
		            header('Location: http://localhost:8080/mvc/index.php?controller=view&action=home');
		            exit;
		        } 
		    else {
		            die('asdfsa');
		    }
	    }
	   	elseif(!empty($user_uni)){
	   		if ($user_uni['password']===$passwordAttempt){
		        	//Provide the user with a login session.
		            $_SESSION['user_id'] = $user['id'];
		            $_SESSION['logged_in'] = time();
		            
		            //Redirect to our protected page, which we called home.php
		            $_SESSION['email']=$email;
		            header('Location: http://localhost:8080/mvc/index.php?controller=view&action=home');
		            exit;
		        } 
		    else {

		        //$validPassword was FALSE. Passwords do not match.
		            die('123');
		    }
	   	}
	   	else
	   		die("nuk u gjet");
    }
            
           
            
        
    
    
}
}

	public function logout()
	{
		echo "<script>alert('Ju dolet nga llogaria')</script>";
		session_destroy();
		header('Refresh: 0;url=http://localhost:8080/mvc/index.php?controller=view&action=home');
	}
}