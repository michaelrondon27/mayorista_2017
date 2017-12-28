<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<script src="asset/js/user.js"></script>
	<?php
		if(isset($_GET['success'])){
			if($_GET['success']==true){
				?>
					<script>
						swal(
							{title:'Usuario editado!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
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
			}
		}
	?>
	<body>
		<div id="content">
            <div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	Usuarios <span class="fa-angle-right fa"></span> Editar Usuario <span class="fa-angle-right fa"></span> <?php echo $_users[$_GET['id']]['user'];?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=user">Consultar Usuarios <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Editar Usuario</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="user" method="post" action="?view=user&mode=edit&id=<?php echo $_GET['id'];?>">
                          		<div class="col-md-12">
                          			<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                              			<input type="text" class="form-text" name="user" id="user" value="<?php echo $_users[$_GET['id']]['user'];?>" onkeypress="return deshabilitarteclas(event)">
                              			<span class="bar"></span>
                              			<label>Usuario:</label>
                            		</div>
                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                              			<input type="text" class="form-text" name="nombre" id="nombre" required value="<?php echo $_users[$_GET['id']]['nombre'];?>">
                              			<span class="bar"></span>
                              			<label>*Nombre:</label>
                            		</div>
			                        <div class="form-group form-animate-text col-md-2" style="margin-top: -10px !important;">
			                          	<span class="bar"></span>
			                          	<label>*Perfil:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-10" style="margin-top:0px !important;">
	                                	<select class="form-control" name="perfil" id="perfil">
	                                		<option value="">Seleccione</option>
										    <?php
										        foreach($_perfil as $perfil){
										        	if($perfil['id_perfil']==$_users[$_GET['id']]['id_perfil']){
										        		?>
											       			<option selected value="<?php echo $perfil['id_perfil']?>"><?php echo $perfil['perfil']?></option>
											       		<?php
										        	}else{
														?>
											       			<option value="<?php echo $perfil['id_perfil']?>"><?php echo $perfil['perfil']?></option>
											       		<?php
										        	}
										        }
										    ?>
	                                	</select>
	                                </div>
	                                <div class="form-group form-animate-text col-md-2" style="margin-top: -10px !important;">
			                          	<span class="bar"></span>
			                          	<label>*Estatus:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-10" style="margin-top:0px !important;">
	                                	<select class="form-control" name="status" id="status">
	                                		<option value="">Seleccione</option>
										    <?php
										        foreach($_status as $status){
										        	if($status['id_status']==$_users[$_GET['id']]['id_status']){
										        		?>
											       			<option selected value="<?php echo $status['id_status']?>"><?php echo $status['status']?></option>
											       		<?php
										        	}else{
														?>
											       			<option value="<?php echo $status['id_status']?>"><?php echo $status['status']?></option>
											       		<?php
										        	}
										        }
										    ?>
	                                	</select>
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
		<script>
		  	$(document).ready(function(){
		    	$("#usuario").addClass("active");
		  	});
		</script>
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
	</body>
</html>