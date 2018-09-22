<?php

	// if(isset($_SESSION['email'])){
	// 	echo "<script>alert('jeni loguar')</script>";
	// 	header('Location: http://www.youtube.com');
	// }

?>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; display: block; margin-left: auto; margin-right: auto}
        .help-block{color: red;}
        .alerti{color: #BA0101;}
    </style>
</head>
<body>
	<div class="container-fluid" >
		<!-- style="background-image: url('images/bg-01.jpg'); background-position: center; background-repeat: no-repeat;background-size: cover;width: 100%;height: 100%;" -->
		<!-- <?php //include ("menu.php");?> -->
		
	    <div class="wrapper">
	    	<fieldset>
				<legend>Login</legend>
	        <p>Ju lutem vendosni emailin/username dhe passwordin</p>
	        <form action="http://localhost/mvc/index.php?controller=user&action=login" method="POST" id="login">
	        	<div>
	        		<span class="help-block" style="color: #BA0101;"><b><?php echo $general_err; ?></b></span>
	        		<input type="button" style="display: none;" class="btn btn-default" value="Aktivizo" onclick="location.href='ifNotConfirmed.php'" id="aktivizo">
	        	</div>
	            <div class="form-group">
	                <label>Email ose Username</label>
	                <input type="text" name="email" class="form-control" autocomplete="off" required="on" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')" id="username" >
	                <span class="help-block" class="alerti" id="emspan"></span>
	            </div>    
	            <div class="form-group">
	                <label>Password</label>
	                <input type="password" name="password" class="form-control" required="on" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')" id="password">
	                <span class="help-block" class="alerti" id="passpan"></span>
	            </div>
	            <div class="form-group">
	                <input type="submit" class="btn btn-warning" value="Hyr">
	                <input type="reset" class="btn btn-default" value="Fshi">
	            </div>
	            <p>Nuk ke nje llogari? <a href="http://localhost/mvc/index.php?controller=user&action=register" style="color: #BA0101;"><b>Rregjistrohu tani</b></a>.</p>
	        </form>
	    </fieldset>
	    </div>
	
</div>
</body>

<script >
	$(document).ready(function(){
      		$('#login input').keyup(function(){
			var username = $('#username').val();
			var password = $('#password').val();
			//alert(password);


			event.preventDefault();

			$.post('index.php?controller=user&action=loginAJAX&type=action',{username: username,  password: password}, function(data){
				//alert(data);
				var json = JSON.parse(data);
				//console.log(data);
				$('#emspan').text(json.username);
				if(json.general == '')
					$('#passpan').text(json.password);
				else
					$('#passpan').text(json.general);
				if(!empty(json.sukses)){
					$('#passpan').text('');
					$('input[type="submit"]').click(function(){
						$('#login').submit();
					});
				}
			});

       });
	});


</script>