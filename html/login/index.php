<!DOCTYPE html>
<html>
	<?php include(HTML_DIR."overall/header.php");?>
	<body id="mimin" class="dashboard form-signin-wrapper">
	    <div class="container">
	    	<?php
				if(isset($_GET['error'])){
					if($_GET['error']==1){
						?>
							<div class="container">
								<div class="alert alert-dismissible alert-danger">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>ERROR:</strong>Usuario o contraseña incorrecta.
								</div>
							</div>
						<?php
					}else if($_GET['error']==2){
						?>
							<div class="container">
								<div class="alert alert-dismissible alert-danger">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>ERROR:</strong>Todos los datos deben estar llenos.
								</div>
							</div>
						<?php
					}else if($_GET['error']==3){
						?>
							<div class="container">
								<div class="alert alert-dismissible alert-danger">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>ERROR:</strong>Ud. se encuentra bloqueado del sistema.
								</div>
							</div>
						<?php
					}
				}
			?>
		    <form class="form-signin" action="login.php" method="post">
	    	    <div class="panel periodic-login">
	              	<div class="panel-body text-center">
	                  	<h1 class="atomic-symbol"><img src="<?php echo LOGO;?>" style="width: 250px;"></h1>
	                  	<br>
	                  	<p class="element-name"><?php echo APP_NAME;?></p>
						<i class="fa fa-arrow-down" aria-hidden="true"></i>
	                  	<div class="form-group form-animate-text" style="margin-top:40px !important;">
	                    	<input type="text" name="user" class="form-text">
	                    	<span class="bar"></span>
	                    	<label>Usuario</label>
	                  	</div>
	                  	<div class="form-group form-animate-text" style="margin-top:40px !important;">
	                    	<input type="password" name="pass" class="form-text">
	                    	<span class="bar"></span>
	                    	<label>Contraseña</label>
	                  	</div>
	                  	<input type="submit" class="btn col-md-12" value="Iniciar Sesión"/>
	              	</div>
	          	</div>
	        </form>
	        <?php include(HTML_DIR."overall/footer.php");?>
	    </div>
	    <!-- custom -->
	    <script src="views/app/js/main.js"></script>
	    <script type="text/javascript">
	       	$(document).ready(function(){
	         	$('input').iCheck({
	          		checkboxClass: 'icheckbox_flat-aero',
	          		radioClass: 'iradio_flat-aero'
	        	});
	       	});
	    </script>
	</body>
</html>