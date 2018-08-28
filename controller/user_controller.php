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
		$username_err=$email_err=$password_err=$kpassword_err=$general_err=$sukses="";
		require_once('view/user/register.php');
		global $DB;
		
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			if(empty($_REQUEST["username"])){
				$username_err="Ju lutem vendosni nje username te vlefshem";
				//echo $username_err;
				echo "<script>alert('Gabim 1')</script>";
			}
			else if(isset($_REQUEST["username"])){

				$username = $_REQUEST["username"];
				$username = $this->thjeshteso($username);
				if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
					$username_err="Ju lutem vendosni nje username te vlefshem";
					//echo $username_err;
					echo "<script>alert('Gabim 2')</script>";
				}
			}
			if(empty($_REQUEST["email"])){
				$email_err="Ju lutem vendosni nje email te vlefshem";
				//echo $email_err;
			}
			else if (isset($_REQUEST["email"])){
				if (!filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)){
					$email_err="Ju lutem vendosni nje email te vlefshem";
					//echo $email_err;
				}
				else{
					$email=$_REQUEST["email"];
					$email_err="";
					$sql="SELECT email FROM users WHERE email=?";
					$result = $DB->execute($sql, array($email));
					$row = $result->fetchAll(PDO::FETCH_ASSOC);
					if(count($row)>0){
						$email_err="Emaili eshte perdorur. Kaloni tek Login per te hyre ne faqe";
						//echo $email_err;
					}
				}
			}
			if(empty($_REQUEST["password"])){
				$password_err="Ju lutem vendosni nje password te vlefshem";
				//echo $password_err;
			}
			else if(isset($_REQUEST["password"])){
				$password=$_REQUEST["password"];
				$password = $this->thjeshteso($password);
				if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
					$password_err="Ju lutem vendosni nje username te vlefshem";
					//echo $password_err;
				}
				else
					$hash_password=md5($password);
			}
			if(empty($_REQUEST["kpassword"])){
				$kpassword_err="Ju lutem konfirmoni passwordin";
				//echo $kpassword_err;
			}
			else if(isset($_REQUEST["kpassword"])){
				$kpassword=$_REQUEST["kpassword"];
				if (!preg_match("/^[a-zA-Z0-9]*$/",$kpassword)) {
					$kpassword_err="Ju lutem vendosni nje username te vlefshem";
					//echo $kpassword_err;
				}
				else if($kpassword!=$password){
					$kpassword_err="Passwordet nuk ngjasojne";
					//echo $kpassword_err;
				}
			}

			if(empty($username_err) && empty($email_err) && empty($password_err) && empty($kpassword_err)){

				$username = strtolower($_REQUEST['username']);
				$email = $_REQUEST['email'];
				$password =$_REQUEST['password'];
				$hashed_password = md5($password);
				$active=0;
				$hash = md5( rand(0,1000) );
				$sql = "INSERT INTO users (username, email, password, hash, active) VALUES (?, ?, ?, ?, ?)";
				$result= $DB->execute($sql, array($username, $email, $hashed_password, $hash, $active));
				echo("<script>location.href = 'index.php?controller=view&action=home';</script>");
				$sukses = 'sukses';
				//header("Refresh: 0; url=localhost/mvc/index.php?controller=user&action=login");
			}
		}
		echo json_encode(array('username' => $username_err,
								'email' => $email_err,
								'password' => $password_err,
								'kpassword' => $kpassword_err,
								'sukses' => $sukses,
						));
	} 


	public function login (){
		$email_err=$password_err=$general_err="";
		require_once('view/user/login.php');
		global $DB;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {	
			//echo "<script>alert('asdf');</script>";
			if(empty($_POST["email"])){
				$email_err="Ju lutem vendosni nje email/username te vlefshem";
			}
			else if (isset($_POST["email"])){
				$email=$_POST["email"];
				// if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				// {

				// 	$email_err="Ju lutem vendosni nje email te vlefshem.";
				// }
			}
			if(empty($_POST["password"])){
				$password_err="Ju lutem vendosni nje password te vlefshem";
			}
			else if(isset($_POST["password"])){
				$password=$_POST["password"];
			}

			if(empty($email_err)&&empty($password_err)){
			
				$email=strtolower($_POST['email']);
				$password=trim($_POST['password']);
				$hashed_password=md5($password);
				$sql="SELECT username,email,password,active FROM users WHERE email=? OR username=?";
				$result = $DB->execute($sql, array($email,$email));
			    $row = $result->fetch(PDO::FETCH_ASSOC);
				//$result = $con->query($sql);
				if ($row != false){
					if($row['email'] == $email || $row['username'] == $email)
					{
						if ($hashed_password==$row["password"]) {
							if($row["active"]==1){
								echo "<script>alert('Login i suksesshem');</script>";
				                $_SESSION['email'] = $email;
								echo("<script>location.href = 'index.php?controller=view&action=home';</script>");
							}
							else{
								echo "<script>confirm('Llogaria juaj nuk eshte e aktivizuar. Ju lutem aktivizoni llogarine.');</script>";
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
			else{
				$general_err="Dicka shkoi gabim. Provoni serisht.";
				//echo "<script>alert('Dicka shkoi gabim. Provoni serisht');</script>";
				//header("Refresh: 0; url = index.php");
			}
		}
	}

	public function logout()
	{
		echo "<script>alert('Ju dolet nga llogaria')</script>";
		session_destroy();
		header('Refresh: 0;url=http://localhost/mvc/index.php?controller=view&action=home');
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

<script> 
	var username_err = <?php echo $username_err ?>;
	var email_err = <?php echo $email_err ?>;
	var password_err = <?php echo $password_err ?>;
	var kpassword_err = <?php echo $kpassword_err ?>;

	if (username_err == "") {
		$('#username').addClass('input-error');
	}
</script>