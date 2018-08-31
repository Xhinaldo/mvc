<?php 
require_once('../config.php');
		require_once('../model/connectdb.php');
		$DB = new DBPDO();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username_err  = $password_err = $general_err = $sukses = '';

			if(empty($username)){
				$username_err="Ju lutem vendosni nje email/username te vlefshem";
			}
			else if (isset($username)){
				if (!preg_match("/([A-Za-z0-9]+)/",$username)) {
					$username_err="Ju lutem vendosni nje username te vlefshem";
				}
			}
			if(empty($password)){
				$password_err="Ju lutem vendosni nje password te vlefshem";
			}

			if(empty($username_err)&&empty($password_err)){
			
				$username=strtolower($username);
				$password=trim($password);
				$hashed_password=md5($password);
				$sql="SELECT username,email,password,active FROM users WHERE email=? OR username=?";
				$result = $DB->execute($sql, array($username,$username));
			    $row = $result->fetchAll(PDO::FETCH_ASSOC);
				//$result = $con->query($sql);
				if ($row != false){
					if($row['email'] == $username || $row['username'] == $username)
					{
						if ($hashed_password == $row["password"]) {
							if($row["active"] == 1){
								// echo "<script>alert('Login i suksesshem');</script>";
				                $_SESSION['email'] = $username;
				                $sukses="sukses";
								echo("<script>location.href = 'index.php?controller=view&action=home';</script>");
							}
							else{
								// echo "<script>alert('Llogaria juaj nuk eshte e aktivizuar. Ju lutem aktivizoni llogarine.');</script>";
								$general_err="Llogaria juaj nuk eshte e aktivizuar. Ju lutem aktivizoni llogarine.";
								//header("Refresh: 0; url = ifNotConfirmed.php");
							}
						}
						else{
							$password_err="Passwordi i gabuar.";
						}
					}
					else{
						$general_err="Emaili/username i gabuar.";
						echo "<script>alert('Dicka shkoi gabim. Provoni serisht.');</script>";
						//header("Refresh: 0; url = index.php");
					}
				}
			}

			echo json_encode(array('username' => $username_err,
									'password' => $password_err,
									'general' => $general_err,
									'sukses' => $sukses,
			 ));	




 ?>