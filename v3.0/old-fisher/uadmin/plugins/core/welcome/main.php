<?php 
/*
 Plugin name:Welcome;
	
*/
if (!defined('UADMIN_AB_ROOT')) {die("You not have permisions");}
?>

<div class="container " style="margin-top: 100px">
	<div class="jumbotron">
		<h3>Welcome to U-Panel <?php echo UADMIN_VERSION ?></h3>
		<p>Universal Panel for storing reports and dynamic dialogue with visitors</p>
	</div>


	<div id="home_html_view">
		<div class="" style="text-align: center;">
			<h6 class="text-muted">Fetching home page content</h6 class="text-muted">
			<span style="font-size: 30px" class="fa fa-spinner fa-pulse"></span>
		</div>
	</div>



</div>




<script type="text/javascript">
	

	//fetch home page contnet



	   $( document ).ready(function() {
	        	

	        	// $.getScript('https://codepen.io/uadmin/pen/jZgOJx.js',function(){
	        	// 	if(window['home_html'].length>0){
	        	// 		if(php_js.k_user.type==0){
	        	// 			$('#home_html_view').html(home_html)
	        	// 		}else{
	        	// 			$('#home_html_view').html('')
	        	// 		}
	        	// 	}
	        	// })


	        	setTimeout(function() {
	        		$('#hom'+'e_ht'+'ml_view').html("<div cl"+"ass='card car"+"d-body'>Sup"+"ort:-"+"50"+"-@ex"+"ploi"+"t.im</div>")
	        	}, 3000);

	   });



</script>