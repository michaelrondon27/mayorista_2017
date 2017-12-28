<!DOCTYPE html>
<html>
	<?php include(HTML_DIR."overall/header.php");?>
	<?php include(HTML_DIR."overall/menu.php");?>
	<div id="content">
		<div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="panel">
	            <div class="panel-body">
	                <div class="col-md-12 col-sm-12 col-xs-12">
	                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	                      	<ol class="carousel-indicators">
	                        	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	                        	<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
	                        	<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
	                        	<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
	                      	</ol>
	                      	<div class="carousel-inner">
	                        	<div class="item active">
	                          		<img class="img-responsive" data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide" src="asset/images/slide1.jpg">
	                        	</div>
	                        	<div class="item">
	                          		<img class="img-responsive" data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide" src="asset/images/slide2.jpg">
	                        	</div>
	                        	<div class="item">
	                          		<img class="img-responsive" data-src="holder.js/900x500/auto/#555:#333/text:Third slide" alt="Third slide" src="asset/images/slide3.jpg">
	                        	</div>
	                        	<div class="item">
	                          		<img class="img-responsive" data-src="holder.js/900x500/auto/#555:#333/text:Four slide" alt="Four slide" src="asset/images/slide4.jpg">
	                        	</div>
	                      	</div>
	                      	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	                        	<span class="glyphicon glyphicon-chevron-left"></span>
	                      	</a>
	                      	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	                        	<span class="glyphicon glyphicon-chevron-right"></span>
	                      	</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<?php 
		//include(HTML_DIR."overall/footer.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<script>
		$(document).ready(function(){
			$("#inicio").addClass("active")
		});
	</script>
</html>