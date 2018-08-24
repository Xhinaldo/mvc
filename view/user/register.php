

<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">

	<style type="text/css">
		.signup-hs{
			position: absolute;
			line-height: 70px;
			top: 300px;
   			right: 700px;
    		width: 400px;
    		height: 400px;
    		
		}
		
	</style>	


</head>
<div class="container-fluid" >
		<div class="row">
			<div class="col-sm-6" >
		    		<div class="col-sm-2" id="butonhs">
					   	<button class="btn btn-danger">Student HS</button>
					</div>
		    		<div class="col-sm-8">
				    	<div class="wrapper" style="display: none;" id="divhs">
				    		<fieldset>
								<legend>Rregjistrohu si student i shkolles se mesme</legend>
						        <p>Ju lutem vendosni emailin.</p>
						        <form action="http://localhost:8080/mvc/index.php?controller=user&action=register" method="post">
									Username: <input  type="text" name="username" required placeholder="Username"> <br>
									Email: <input type="email" name="email" required placeholder="Email"> <br>
									Password: <input type="password" name="password" required placeholder="Password"><br>
									<button style="margin-left: 130px;" type="submit" class="btn" name="Register">Register</button>
								</form>
					        </fieldset>
					    </div>
					</div>
					<?php 
					$_SESSION['uni']=false;
					$_SESSION['hs']=true; ?>
		    </div>  
		    <div class="col-sm-6" >
		    		<div class="col-sm-2" id="butonuni">
					   	<button class="btn btn-danger">Student Uni</button>
					</div>
		    		<div class="col-sm-8">
				    	<div class="wrapper" style="display: none;" id="divuni">
				    		<fieldset>
								<legend>Rregjistrohu si student i universitetit</legend>
						        <p>Ju lutem vendosni emailin.</p>
						        <form action="http://localhost:8080/mvc/index.php?controller=user&action=register" method="post">
								Username: <input  type="text" name="username" required placeholder="Username"> <br>
								Email: <input type="email" name="email" required placeholder="Email"> <br>
								Password: <input type="password" name="password" required placeholder="Password"><br>
						<button style="margin-left: 130px;" type="submit" class="btn" name="Register">Register</button>
					</form>
					        </fieldset>
					    </div>
					</div>
					<?php 
					$_SESSION['hs']=false;
					$_SESSION['uni']=true; ?>
				
		    </div>  	
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#butonhs').click(function(){
			$('#divhs').slideToggle('slow');
			$('#divuni').hide(500);
		});
		$('#butonuni').click(function(){
			$('#divuni').slideToggle('slow');
			$('#divhs').hide(500);
		});
	});
</script>