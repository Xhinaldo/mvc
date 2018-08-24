
<!DOCTYPE html>
<html>
<head>
	<script src="view/js/funk.js"></script>
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
	<title>HSUNI</title>
</head>
<body>
	<div id="container">
		<header class="navbar navbar-fixed-top scroll-up top" id=" header" style="position: relative; width: 100%;">
			
				<div class="container-fluid">
					<a href="http://localhost:8080/mvc/index.php">
						<img src="">
						<h2 class="tagline">Connections create opportunities.</h2>
					</a>
					<div class="icon-menu menu-btn" id="bars">
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
					</div>
				</div>
				<div id="actions" style="display: none">
					<?php if(isset($_SESSION['email'])): ?>
						<a href="http://localhost:8080/mvc/index.php?controller=user&action=logout"><button class="btn btn-danger">DIL</button></a>
					<?php else: ?>
						<a href="http://localhost:8080/mvc/index.php?controller=user&action=login"><button class="btn btn-info">HYR</button></a>
						<a href="http://localhost:8080/mvc/index.php?controller=user&action=register"><button class="btn btn-primary">RRGJISTROHU</button></a>
					<?php endif; ?>
				</div>	
			
		</header>

 			
 		<section>
 			<?php require_once('routes.php'); ?>
 		</section>
 			
 		

	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		$('#bars').click(function(){
			$('#actions').slideToggle('slow');
		});
	});
	</script>
</body>
</html>

