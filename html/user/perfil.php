<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
		if(isset($_GET['success'])){
			if($_GET['success']==1){
				?>
					<script>
						swal(
							{title:'Contraseña actualizada!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else{
				if($_GET['success']==2){
				?>
					<script>
						swal(
							{title:'Foto Actualizada!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}
			}
		}
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				?>
					<script>
						swal(
							{title:'Debe llenar los campos indicados!',
							type:'error',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==2){
				?>
					<script>
						swal(
							{title:'Las contraseñas no coinciden!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==3){
				?>
					<script>
						swal(
							{title:'Solo se aceptan imagenes con las siguientes extensiones: jpg, jpeg, png y gif!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==4){
				?>
					<script>
						swal(
							{title:'La imagen es muy grande!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}
		}
	?>
	<body>
		<div id="content">
			<div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	Mi Perfil 
                        </p>
                    </div>
                </div>
            </div>
			<div class="col-md-12">
                <div class="col-md-6">
                  	<div class="col-md-12 tabs-area">
                  	<div class="col-md-12 informacion">
                  		Información
                  	</div>
                    <div id="tabsDemo2Content" class="tab-content tab-content-v1 col-md-12" style="border-right: 1px solid #9E9E9E;">
                      	<div role="tabpanel" class="tab-pane fade active in" id="tabs-demo2-area1" aria-labelledby="tabs-demo2-area1">
                        	<div class="profile-v1-pp col-md-6" style="padding: 10px;">
                      			<img src="<?php echo $_users[$_SESSION['app_id']]['foto'];?>"/ style="width: 200px;">
                      			<div class="col-lg-12">
                      				<div class="row">
					                    <div class="input-group fileupload-v1">
					                    	<form class="cmxform" id="subir" method="post" action="?view=perfil&mode=subirFoto" enctype="multipart/form-data">
					                    		<div class="col-md-6">
					                    			Cambiar foto: 
					                    		</div>
					                    		<div class="col-md-6">
					                    			<input type="file" name="imagen" id="foto" class="fileupload-v1-file"/ required>
					                    		</div>
					                        	<div class="col-md-12">
							                        <div class="form-group form-animate-checkbox"></div>
							                        <input class="submit btn btn-danger" type="submit" value="Guardar">
							                    </div>
					                        </form>
					                    </div><!-- /input-group -->
					                </div><!-- /.col-lg-6 -->
					            </div><!-- /.row -->
					        </div>
                    		<div class="profile-v1-pp col-md-6" style="padding: 10px;">
                    			<h2><?php echo $_users[$_SESSION['app_id']]['user'];?></h2>
                      			<h2><?php echo $_users[$_SESSION['app_id']]['nombre'];?></h2>      	
                    		</div>
                      	</div>
                    </div>

                  </div>
                </div>
                <div class="col-md-6">
                  	<div class="col-md-12 tabs-area">
                  		<div class="col-md-12 informacion">
	                  		Cambiar contraseña
	                  	</div>
                    	<div id="tabsDemo2Content" class="tab-content tab-content-v1 col-md-12">
                      		<div role="tabpanel" class="tab-pane fade active in" id="tabs-demo2-area1" aria-labelledby="tabs-demo2-area1">
                        		<div class="col-md-12">
                					<div class="col-md-12 panel">
                    					<div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    						<p>Los campos con (*) son obligatorios.</p>
                    						<br>
                      						<div class="col-md-12">
						                        <form class="cmxform" id="user" method="post" action="?view=perfil&mode=change&id=<?php echo $_SESSION['app_id'];?>">
						                          	<div class="col-md-12">
						                            	<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
						                              		<input type="password" class="form-text" id="pass" name="pass" required>
						                              		<span class="bar"></span>
						                              		<label>*Contraseña:</label>
						                            	</div>
						                            	<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
						                              		<input type="password" class="form-text" id="repeat" name="repeat" required>
						                              		<span class="bar"></span>
						                              		<label>*Repetir Contraseña:</label>
						                            	</div>
						                            	<div class="col-md-12">
							                              	<div class="form-group form-animate-checkbox"></div>
							                              	<input class="submit btn btn-danger" type="submit" value="Guardar">
							                        	</div>
							                        </div>
						                      	</form>
								            </div>
						                </div>
						            </div>
						        </div>
                      		</div>
                  		</div>
                	</div>
	   			</div>
	   		</div>
	   	</div>
	</body>
</html>