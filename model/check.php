<?php 	
		require_once('../config.php');
		require_once('../model/connectdb.php');
		$DB = new DBPDO();
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$kpassword = $_POST['kpassword'];
		$uni = $_POST['universiteti'];
		$fakul = $_POST['fakulteti'];
		$dega = $_POST['dega'];
		$username_err = $email_err = $password_err = $kpassword_err = $uni_err = $fakul_err = $dega_err = $sukses = '';
		if(empty($username)){
				$username_err="Ju lutem vendosni nje username te vlefshem";
		}
		else if(isset($username)){
			if (!preg_match("/([A-Za-z0-9]+)/",$username)) {
				$username_err="Ju lutem vendosni nje username te vlefshem";
			}
			else if (strlen($username)<4)
				$username_err = "Username eshte shume i shkurter";
			else if (strlen($username)>15)
				$username_err = "Username eshte shume i gjate";
			else{
				$sql="SELECT username FROM users WHERE username=?";
				$result = $DB->execute($sql, array($username));
				$row = $result->fetchAll(PDO::FETCH_ASSOC);
				if(count($row)>0){
					$username_err="Username eshte perdorur.";
				}
			}
		}
		if(empty($email)){
			$email_err="Ju lutem vendosni nje email te vlefshem";
		}
		else if (isset($email)){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$email_err="Ju lutem vendosni nje email te vlefshem";
			}
			else{
				$sql1="SELECT email FROM users WHERE email=?";
				$result = $DB->execute($sql1, array($email));
				$row = $result->fetchAll(PDO::FETCH_ASSOC);
				if(count($row)>0){
					$email_err="Emaili eshte perdorur. Kaloni tek Login per te hyre ne faqe";
				}
			}
		}
		if(empty($password)){
			$password_err="Ju lutem vendosni nje password te vlefshem";
		}
		else if(isset($password)){
			if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
				$password_err="Ju lutem vendosni nje username te vlefshem";
			}
		}
		if(empty($kpassword)){
			$kpassword_err="Ju lutem konfirmoni passwordin";
		}
		else if(isset($kpassword)){
			if (!preg_match("/^[a-zA-Z0-9]*$/",$kpassword)) {
				$kpassword_err="Ju lutem vendosni nje username te vlefshem";
			}
			else if($kpassword!=$password){
				$kpassword_err="Passwordet nuk ngjasojne";
			}
		}
		if(empty($uni))
			$uni_err = "Ju lutem zgjidhni nje universitet";
		else if(empty($fakul))
			$fakul_err = "Ju lutem zgjidhni nje fakultet.";
		else if(empty($dega))
			$dega_err = "Ju lutem zgjidhni nje dege.";
		if(empty($username_err) && empty($email_err) && empty($password_err) && empty($kpassword_err) && empty($uni_err) && empty($fakul_err) && empty($dega_err))
			$sukses = 'sukses';
		echo json_encode(array('username' => $username_err,
								'email' => $email_err,
								'password' => $password_err,
								'kpassword' => $kpassword_err,
								'universiteti' => $uni_err,
								'fakulteti' => $fakul_err,
								'dega' => $dega_err,
								'sukses' => $sukses,
						));
?>