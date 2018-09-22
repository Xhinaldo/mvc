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
		$username_err=$email_err=$password_err=$kpassword_err=$general_err=$dega_err="";
		require_once('view/user/register.php');
		global $DB;
		
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$username = strtolower($_REQUEST['username']);
			$email = $_REQUEST['email'];
			$password =$_REQUEST['password'];
			$hashed_password = md5($password);
			$active=0;
			$hash = md5( rand(0,1000) );
			$status = $_POST['Radio'];
			if($status == "HS")
				$status = 0;
			else
				$status = 1;
			$dega = $_POST['degas'];
			
			$sql = "INSERT INTO users (username, email, password, hash, active, status, dega_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$result= $DB->execute($sql, array($username, $email, $hashed_password, $hash, $active, $status, $dega));
			
			$this->send_email($email,$hash);
			echo("<script>alert('Ju lutem verifikoni emailin.')</script>");
			echo("<script>location.href = 'index.php?controller=user&action=login';</script>");
		}
		
	} 

	public function registerAJAX(){
		global $DB;
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
	}

	public function login (){
		$email_err=$password_err=$general_err="";
		require_once('view/user/login.php');
		global $DB;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$email=strtolower($_POST['email']);	
			$_SESSION['email'] = $email;
			echo("<script>location.href = 'index.php?controller=view&action=home';</script>");
		}
	}

	public function loginAJAX(){
		global $DB;
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
			    $row = $result->fetch(PDO::FETCH_ASSOC);
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
						//echo "<script>alert('Dicka shkoi gabim. Provoni serisht.');</script>";
						//header("Refresh: 0; url = index.php");
					}
				}
			}

			echo json_encode(array('username' => $username_err,
									'password' => $password_err,
									'general' => $general_err,
									'sukses' => $sukses,
			 ));
	}

	public function logout()
	{
		echo "<script>alert('Ju dolet nga llogaria')</script>";
		session_destroy();
		header('Refresh: 0;url=http://localhost/mvc/index.php?controller=view&action=home');
	}

	public function send_email($email,$hash) {
		
		global $DB;
		

		global $mail;                             				  // Passing `true` enables exceptions
		//echo "<script>alert('Gabimmmm.');</script>";
				try {

				    //Server settings
				    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
				    $mail->isSMTP();                                      // Set mailer to use SMTP
				    $mail->Host = 'smtp.gmail.com;';  					  // Specify main and backup SMTP servers
				    $mail->SMTPAuth = true;                               // Enable SMTP authentication
				    $mail->Username = 'dergoemailtaleas@gmail.com';       // SMTP username
    				$mail->Password = 'emaildergues1';                    // SMTP password
				    $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
				    $mail->Port = 587;                                    // TCP port to connect to

				    //Recipients
				    $mail->setFrom('dergoemailtaleas@gmail.com', 'Mailer');
				    $mail->addAddress($email);     // Add a recipient
				    $mail->isHTML(false);                                  // Set email format to HTML
				    $mail->Subject = 'Verifikimi';
				    $mail->Body    = "
 
						Faleminderit qe u regjistruat!
						Llogaria juaj u krijua dhe eshte gati per tu perdorur.
						 
						Kopjoni kete link dhe shkoni tek ky link:
						https://localhost/mvc/index.php?controller=user&action=verify_email&email=".$email."&hash=".$hash."
						 
						";
				    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				    $mail->send();
				    //echo 'Message has been sent';
				} catch (Exception $e) {
				   echo "<script>alert('Gabim.".$mail->ErrorInfo."');</script>";
				}
	}

	public function verify_email() {
		global $DB;
		if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
		    $email = $_GET['email']; 
		    $hash = $_GET['hash'];
		    $search = $DB->execute("SELECT email, hash, active FROM users WHERE email='$email' AND hash='$hash' AND active=0");
		    $row = $search->fetchAll(PDO::FETCH_ASSOC);
		    if(count($row) > 0){
		        $DB->execute("UPDATE users SET active=1 WHERE email='$email' AND hash='$hash' AND active=0");
		        //echo "<script>alert('Llogaria juaj eshte verifikuar. Tani mund te logoheni.')</script>";
		        header("Refresh: 0; url=index.php?controller=view&action=verified");
	    	}
	    	else{
	        	//echo "<script>alert('asdf.')</script>";
	        	header("Refresh: 0; url=index.php?controller=view&action=broken_link");
	   		}
		}
		else{
		    echo "<script>alert('URL eshte e pavlefshme ose ju e keni aktivizuar llogarine tuaj.')</script>";
	        header("Refresh: 0; url=index.php?controller=view&action=home");
		}
	}

	public function upload_picture(){
		global $DB;
		$uploadOk=1;
		$target_dir = "uploads/";
	    $target_file = $target_dir . basename($_FILES["image"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	    
	    if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["image"]["tmp_name"]);
	        if($check !== false) {
	        	if ($_FILES["image"]["size"] > 500000) {
	                echo "<script>alert('Sorry, your file is too large.')</script>";
	                $uploadOk = 0;
	            }else{
	            	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" ){
	            		echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
	                   $uploadOk = 0;
	                }
	            }
	      
	        }
	        else {
	        	echo "<script>alert('File is not an image.')</script>";
	        	$uploadOk = 0;
	        }
	    }
	    if ($uploadOk == 0) {
	    	echo "<script>alert('Sorry, your file was not uploaded.')</script>";
	    	echo("<script>location.href = index.php?controller=view&action=uni_menu';</script>");
	    // if everything is ok, try to upload file
	     } else {
	    $image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$fileinfo=PATHINFO($_FILES["image"]["name"]);
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["image"]["tmp_name"],$target_dir . $newFilename);
		$location=$target_dir . $newFilename;
	 	$dega_id = $_SESSION['dega_id'];
		$query = $DB->execute("INSERT INTO image_tb (img_location,image,dega_id) VALUES ('$location','$image','$dega_id')");
		header('location:http://localhost/mvc/index.php?controller=view&action=university&dega_id='.$dega_id);
	    }

	}

	public function addComment(){
		global $DB;
		$comment = $_POST['comment'];
		$email = $_SESSION['email'];
		$lenda = $_POST['lenda'];
		$post_id = $_POST['post_id'];

		$comment_err = $general_err = $sukses = '';

		if(empty($comment))
			$comment_err = 'Nuk mund ta lini bosh.';
		else if(isset($comment)){
			if(!preg_match("/([A-Za-z0-9]+)/",$comment))
				$comment_err = 'Gabim ne koment.';
		}
		if(empty($email))
			$general_err = 'Dicka shkoi gabim. Ju lutem i beni refresh faqes dhe provoni serisht';
		if(empty($lenda))
			$general_err = 'Dicka shkoi gabim. Ju lutem i beni refresh faqes dhe provoni serisht';
		if(empty($post_id))
			$general_err = 'Dicka shkoi gabim. Ju lutem i beni refresh faqes dhe provoni serisht';
		if(empty($comment_err) && empty($general_err)){
			$email_result = $DB->execute("SELECT * FROM users WHERE email = '$email' OR username = '$email'");
			$email_row = $email_result->fetch(PDO::FETCH_ASSOC);
			if(count($email_row) == 0)
				$email_id = 128;
			else{
				$email_id = $email_row["id"];
			}
			$sql = $DB->execute("INSERT INTO comments(comment, user_id, lenda_id, post_id) VALUES ('$comment', '$email_id', '$lenda', '$post_id')"); 
			$comments_db = $DB->execute("SELECT comments.*, users.username FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE comments.lenda_id = $lenda AND comments.post_id = $post_id ORDER BY id DESC LIMIT 1");
			$row = $comments_db->fetchAll(PDO::FETCH_ASSOC);
			$comments = array();
			foreach($row as $index) {
				array_push($comments, $index);
			}
		}

		echo json_encode(array('comment' => $comment_err,
								'comments' => $comments,
		));
	}

	public function thjeshteso($data)
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
}

?>