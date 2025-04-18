<?php

include('header.php');



?>

<div class="banner">
	 <div class="container">			
			<script src="js/responsiveslides.min.js"></script>
			  <script>
					$(function () {
					  $("#slider").responsiveSlides({
						auto: true,
						nav: false,
						speed: 500,
						namespace: "callbacks",
						pager: true,
					  });
					});
			 </script>
			 <div class="slider">
				 <div class="callbacks_container">
				     <ul class="rslides" id="slider">
						<li>	          
							  <h2>Let Us Join Our College Event</h2>
							 <h3>Dance.</h3>
						 </li>
						 <li>	          
							 <h2>Programming</h2>
							 <h3>Quiz.</h3>
						 </li>
						 <li>	          
							 <h2>Analysis</h2>		
							 <h3>Team Work.</h3>
						 </li>
					  </ul>
				 </div>
			 </div>
			  <!----->		  

	 </div>
</div>
<?php

include('footer.php');



?>


