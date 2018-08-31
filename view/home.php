<style>
	.hover08 figure img {
		-webkit-filter: grayscale(100%);
		filter: grayscale(100%);
		-webkit-transition: .3s ease-in-out;
		transition: .3s ease-in-out;
	}
	.hover08 figure:hover img {
		-webkit-filter: grayscale(0);
		filter: grayscale(0);
	}
	.centeredhs {
		display: none;
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	}
	.centereduni {
		display: none;
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	}
	
 </style>


<section class="hero viewport-height desktop active" id="hero" style="position: relative; z-index: 1;">
 			<div class="row" >
	 			<div class="col-sm-6 px-0 hover08">
	 				<a href="http://localhost/mvc/index.php?controller=view&action=hs">
	 					<figure>
	 						<img class="img-fluid width-100 img-thumbnail" src="view/images/hs.jpg" id="hs" style="min-height: 500px;max-height: 500px;object-fit: cover;">
	 						<div style="background-color: red;"><h1 class="centeredhs" style="border: 0px solid #007bff3b; border-radius: 25px; background: #ffffff7a;padding: 10px;">Shkolla e mesme</h1></div>
	 					</figure>
	 					
	 				</a>
	 			</div>
	 			<div class="col-sm-6 px-0 hover08" >
	 				<a href="http://localhost/mvc/index.php?controller=view&action=uni_menu" >
	 					<figure >
	 						<img class="img-fluid img-thumbnail" src="view/images/uni.jpg" id="uni" style="min-height: 500px;max-height: 500px;object-fit: cover;">
	 						<div >
	 							<h1  class="centereduni" style="border: 0px solid #007bff3b; border-radius: 25px;background: #ffffff7a;padding: 10px;">Universiteti</h1>
	 						</div>
	 					</figure>
	 					
	 				</a>
	 				
	 			</div>
	 		</div>
</section>


<script type="text/javascript">
		$(document).ready(function(){
			$('#hs').hover(function(){
				$('.centeredhs').show();
			});
			$('#hs').mouseout(function(){
				$('.centeredhs').hide();
			});
			$('.centeredhs').hover(function(){
				$('.centeredhs').show();
			});

			$('#uni').hover(function(){
				$('.centereduni').show();
			});
			$('#uni').mouseout(function(){
				$('.centereduni').hide();
			});
			$('.centereduni').hover(function(){
				$('.centereduni').show();
			});
		});
</script>