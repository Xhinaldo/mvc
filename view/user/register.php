<head>
<meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; display: block; margin-left: auto; margin-right: auto}
        .help-block{color: red;}
    </style>
</head>

<body>
	<!-- style="background-image: url('images/bg-01.jpg'); background-position: center; background-repeat: no-repeat;background-size: cover; width: 100%;height: 100%;" -->
	<div class="container-fluid" >
		<!-- <?php //include ("menu.php");?> -->
    <div class="wrapper">
    	<fieldset>
			<legend style="text-align: center;">Rregjistrohu</legend>
	        <h2>Rregjistrohu</h2>
	        <p>Krijo nje llogari</p>
	        <form action="" method="POST">
	        	<label class="help-block" id="general_err" style="color: #BA0101;"></label>
	            <div class="form-group">
	                <label>Username</label>
	                <input type="text" name="username" id="username" class="form-control" autocomplete="off" required="on" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')">
	                <span class="help-block" style="color: #BA0101;"><b><?php echo $username_err; ?></b></span>
	            </div>
	            <div class="form-group">
	                <label>Email</label>
	                <input type="text" name="email" id="email" class="form-control" autocomplete="off" required="on" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')">
	                <span class="help-block" style="color: #BA0101;"><b><?php echo $email_err; ?></b></span>
	            </div>   
	            <div class="form-group">
	                <label>Password</label>
	                <input type="password" name="password" id="password" class="form-control" required="on"" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')">
	                <span class="help-block" style="color: #BA0101;"><b><?php echo $password_err; ?></b></span>
	            </div>
	            <div class="form-group">
	                <label>Konfirmo Password</label>
	                <input type="password" name="kpassword" id="kpassword" class="form-control" required="on" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')">
	                <span class="help-block" <?php echo $kpassword_err; ?></b></span>
	            </div>
	            <div class="form-group">
	                <input type="submit" class="btn btn-danger" value="Rregjistrohu" id="sub">
	                <input type="reset" class="btn btn-default" value="Fshi">
	            </div>
	            <p>Keni nje llogari? <a href="index.php"style="color: #BA0101;"><b>Bej login ketu.</b></a></p>
	        </form>
        </fieldset>
    </div>
   </div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		// $('#butonhs').click(function(){
		// 	$('#divhs').slideToggle('slow');
		// 	$('#divuni').hide(500);
		// });
		// $('#butonuni').click(function(){
		// 	$('#divuni').slideToggle('slow');
		// 	$('#divhs').hide(500);
		// });
        //alert('return sent');
        $("#sub").click(function(event){
				event.preventDefault();
				var username = $('#username').val();
				var email = $('#email').val();
				var password = $('#password').val();
				var kpassword = $('#kpassword').val();
				
				$.ajax({
		            type: "POST",
		            url: "http://localhost/mvc/index.php?controller=user&action=register",
		            data: { get_param: 'value'},
		            dataType:'json', 
		            success function(data){
		            	var json = $.parseJSON('data');
		                $('#general_err').append(json.email_err);
		            }
		        });
			});
        
	});

</script>