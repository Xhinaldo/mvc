<head>
<meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; display: block; margin-left: auto; margin-right: auto}
        .help-block{color: red;}
    </style>
</head>

<body>
	<!-- style="background-image: url('images/bg-01.jpg'); background-position: center; background-repeat: no-repeat;background-size: cover; width: 100%;height: 100%;" -->
	<div class="container-fluid">
	    <div class="wrapper">
	    	<fieldset>
				<legend style="text-align: center;">Regjistrohu</legend>
		        <p>Krijo nje llogari</p>
		        <form action="http://localhost/mvc/index.php?controller=user&action=register" method="POST" id="register">
		        	<label class="help-block" id="sukses" style="color: #BA0101;"></label>
		            <div class="form-group">
		                <label>Username</label>
		                <input type="text" name="username" id="username" class="form-control" autocomplete="off" required="on" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')">
		                <span class="help-block" style="color: #BA0101;" id='unpsan'></span>
		            </div>
		            <div class="form-group">
		                <label>Email</label>
		                <input type="text" name="email" id="email" class="form-control" autocomplete="off" required="on" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')">
		                <span class="help-block" style="color: #BA0101;" id='emspan'></span>
		            </div>   
		            <div class="form-group">
		                <label>Password</label>
		                <input type="password" name="password" id="password" class="form-control" required="on"" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')">
		                <span class="help-block" style="color: #BA0101;" id='passpan'></span>
		            </div>
		            <div class="form-group">
		                <label>Konfirmo Password</label>
		                <input type="password" name="kpassword" id="kpassword" class="form-control" required="on" oninvalid="this.setCustomValidity('Nuk mund te lihet bosh')" oninput="this.setCustomValidity('')">
		                <span class="help-block" style="color: #BA0101;" id='kpasspan'></span>
		            </div>
		            <div class="form-group">
		                <label>Status</label>
		                <input type="radio" class="radio-inline" name="Radio" value="HS" required>HS
			            <input type="radio" class="radio-inline" name="Radio" value="UNI" required >UNI
		            </div>
		            <div class="form-group" style="display: none;" id='uni'>
		              	<div class="form-group">
			                <label>Zgjidh degen:</label>
						  	<select class="form-control" id="unis" name="unis">
						  		<option class="unis" value="0">--zgjidh universitetin</option>
						    	<option class="unis" value="1">Universiteti i Tiranes</option>
							    <option class="unis" value="2">Universiteti Politeknik</option>
							</select>
							<span class="help-block" style="color: #BA0101;" id='unispan'></span>
			            </div>
		            </div>
		            <div class="form-group" style="display: none;" id='fakul' name="fakuls">
		              	<div class="form-group">
			                <label >Select list:</label>
						  	<select class="form-control" id="fakuls">
							</select>
			            </div>
			            <span class="help-block" style="color: #BA0101;" id='fakulspan'></span>
		            </div>
		            <div class="form-group" style="display: none;" id='dega'>
		              	<div class="form-group">
			                <label >Select list:</label>
						  	<select class="form-control" id="degas" name="degas">
							</select>
							<span class="help-block" style="color: #BA0101;" id='degaspan'></span>
			            </div>
		            </div>
		            <div class="form-group" style="display: none;" id='review'>
		              	<label>Lini nje review per degen tuaj(opsionale):</label>
		              	<textarea class="form-control" rows="5"></textarea>
		            </div>
		            <div class="form-group">
		                <input type="submit" class="btn btn-danger" value="Regjistrohu">
		                <input type="reset" class="btn btn-default" value="Fshi">
		            </div>
		            <p>Keni nje llogari? <a href="http://localhost/mvc/index.php?controller=user&action=register"style="color: #BA0101;"><b>Bej login ketu.</b></a></p>
		        </form>
	        </fieldset>
	    </div>
   </div>
</body>

<script>
        
	$(document).ready(function(){
		//REGISTER AJAX
		$('#register input').keyup(function(){
			var username = $('#username').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var kpassword = $('#kpassword').val();
			var status = $('input[type="radio"]').val();
			var universiteti = $('#unis option:selected').text();
			var fakulteti = $('#fakuls option:selected').text();
			var dega = $('#degas option:selected').text();
			//alert(status);
			event.preventDefault();
			$.post('model/check.php',{username: username, email: email, password: password, kpassword: kpassword, universiteti: universiteti, fakulteti: fakulteti, dega: dega}, function(data){
				//alert(data);
				var json = JSON.parse(data);
				console.log(json);
				$('#unpsan').text(json.username);
				$('#emspan').text(json.email);
				$('#passpan').text(json.password);
				$('#kpasspan').text(json.kpassword);
				$('#unispan').text(json.universiteti);
				$('#fakulspan').text(json.fakulteti);
				$('#degaspan').text(json.dega);
				$('#sukses').text(json.sukses);
				$('input[type="submit"]').click(function(){
					$('#register').submit();
				});
			});
		});
       //RADIO BUTTONS
		$('input[type="radio"]').click(function(){
	        if($(this).attr("value")=="HS"){
	            $("#uni").hide('slow');
	            $('#fakul').hide('slow');
	            $('#dega').hide('slow');
				$('#review').hide('slow');
	        }
	        if($(this).attr("value")=="UNI"){
	            $("#uni").show('slow');
	        }
	    });
		$('input[type="radio"]').trigger('click');
		
		//DROPDOWN AJAX
		$('#unis').change(function(event) {
			event.preventDefault();
			var universiteti = $('#unis').val();
			//alert(universiteti);
			$('#dega').hide('slow');
			$('#review').hide('slow');
			if(universiteti == 0){
				$('#fakul').hide('slow');
				$('#dega').hide('slow');
			}
			else{
			$.post('model/get_fakultet.php',{universiteti: universiteti}, function(data){
				//alert(data);
				var json = JSON.parse(data);
				console.log(json);
				var html = "<option value='0'>--zgjidh fakultetin</option>";
				for(var i=0; i < json.fakultetet.length; i++ ){
					//console.log(i);
					html += "<option value='"+json.fakultetet[i].id+"'>"+json.fakultetet[i].name+"</option>"
				}
				$('#fakuls').html(html);
				$('#fakul').show('slow');
			});
			}
		});
		$('#fakuls').change(function(event) {
			event.preventDefault();
			$('#review').hide('slow');
			var fakulteti = $('#fakuls').val();
			//alert(fakulteti);
			if(fakulteti == 0)
				$('#dega').hide('slow');
			else{
				$.post('model/get_dega.php',{fakulteti: fakulteti}, function(data){
					//alert(data);
					var json = JSON.parse(data);
					console.log(json);
					var html = "<option value='0'>--zgjidh degen</option>";
					for(var i=0; i < json.deget.length; i++ ){
						//console.log(i);
						html += "<option value='"+json.deget[i].id+"'>"+json.deget[i].name+"</option>"
					}
					$('#degas').html(html);
					$('#dega').show('slow');
				});
			}
		});
		$('#degas').change(function(event) {
			var dega = $('#degas').val();
			if(dega == 0)
				$('#review').hide('slow');
			else
				$('#review').show('slow');
		});
	});
	



</script>