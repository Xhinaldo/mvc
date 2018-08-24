<section class="hero viewport-height desktop active" id="hero" style="position: relative; z-index: 1;">
 			<div class="row" >
	 			<div class="col-sm-6 px-0">
	 				
	 				<a href="http://localhost:8080/mvc/index.php?controller=view&action=hs" style="position: relative;">
	 					<h1 class="align-middle" style="display: none; position: absolute;" id="mos">MOS KLIKO KETU</h1>
	 					<img class="img-fluid w-100 h-100" src="view/images/hs.jpg" id="hs">
	 				</a>
	 				
	 			</div>
	 			<div class="col-sm-6 px-0">
	 				<a href="http://localhost:8080/mvc/index.php?controller=view&action=university" >
	 					<img class="img-fluid" src="view/images/uni.jpg">
	 				</a>
	 				
	 			</div>
	 			</div>
</section>

<script type="text/javascript">
		$(document).ready(function(){
		$('#hs').hover(function(){
			$('#mos').show();
		});
		$('#hs').mouseout(function(){
			$('#mos').hide();
		});
	});
</script>