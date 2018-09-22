<style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Lato:400,900);

	.square {
	    float:left;
	    position: relative;
	    width:16%;
	    padding-bottom : 16%; /* raporti 1:1  */
	    margin:1.66%;
	    background-color:#F5FFC6;
	    overflow:hidden;
	    font-size: 70%;
	}

	.content {
	    position:absolute;
	    height:90%; /* = 100% - 2*5% padding */
	    width:90%; /* = 100% - 2*5% padding */
	    padding: 5%;
	}


	/*  For responsive images */

	.content .rs{
	    width:auto;
	    height:auto;
	    max-height:100%;
	    max-width:100%;
	}
	/*  For responsive images as background */

	.bg{
	    background-position:center center;
	    background-repeat:no-repeat;
	    background-size:cover; /* you change this to "contain" if you don't want the images to be cropped */
	    color:#FBFFB9;
	}

	body {
	    font-size:20px;
	    font-family: 'Lato',verdana, sans-serif;
	    color: #F5FFC6;
	    background:#fff;
}


	</style>

	<div class="square">
		<!-- <a href="http://localhost/mvc/index.php?controller=view&action=university"> -->
	     <div class="content">
	        <input type="button" class="btn btn-danger" value="Universiteti i Tiranes" name="universiteti" id="1">
	     </div>
	    <!-- </a> -->
	</div>
	<div class="square">
		<!-- <a href="http://localhost/mvc/index.php?controller=view&action=university"> -->
	     <div class="content">
	        <input type="button" class="btn btn-danger" value="Universiteti Politeknik i Tiranes" name="universiteti" id="2">
	     </div>
	    <!-- </a> -->
	</div>
	<div class="square">
		<!-- <a href="http://localhost/mvc/index.php?controller=view&action=university"> -->
	     <div class="content">
	        <input type="button" class="btn btn-danger" value="Universiteti Bujqesor i Kamzes" name="universiteti" id="5">
	     </div>
	    <!-- </a> -->
	</div>
	<div class="square">
		<!-- <a href="http://localhost/mvc/index.php?controller=view&action=university"> -->
	     <div class="content">
	        <input type="button" class="btn btn-danger" value="Universiteti i Mjeksise" name="universiteti" id="4">
	     </div>
	    <!-- </a> -->
	</div>
	<div class="square">
		<!-- <a href="http://localhost/mvc/index.php?controller=view&action=university"> -->
	     <div class="content">
	        <input type="button" class="btn btn-danger" value="Universiteti Arteve" name="universiteti" id="3">
	     </div>
	    <!-- </a> -->
	</div>
	<div id="fakultetet" >
		
	</div>

	<script type="text/javascript">
		$(document).ready(function(event){
			//REGISTER AJAX
			var html = '';
			$(".content input").click(function(e){
				//event.preventDefault();
			    var butoni = e.target.id;
			    $.post('model/get_fakultet.php',{universiteti: butoni}, function(data){
			    	var json = JSON.parse(data);
					//console.log(json);
					var html = "";
					for(var i=0; i < json.fakultetet.length; i++ ){
						//console.log(i);
						html += "<div class='square'><a href='http://localhost/mvc/index.php?controller=view&action=university&dega_id="+json.fakultetet[i].id+"'><div class='content'><input type='button' class='btn btn-danger' value='"+json.fakultetet[i].name+"' name='universiteti' id='"+json.fakultetet[i].id+"' '></div></a></div>"
					}
					$('#fakultetet').html(html);
			    });
			    //alert(butoni);
			});
		});
		

		// $('.content input').on(function(){
			
		// 	//alert(status);
		// 	event.preventDefault();
		// 	$.post('model/check.php',{username: username, email: email, password: password, kpassword: kpassword, universiteti: universiteti, fakulteti: fakulteti, dega: dega}, function(data){
		// 		//alert(data);
		// 		var json = JSON.parse(data);
		// 		console.log(json);
		// 		$('#unpsan').text(json.username);
				
		// 		});
		// 	});
		// });
	</script>