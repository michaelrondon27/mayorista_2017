<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<script src="asset/js/inventario.js"></script>
	<?php
		if(isset($_GET['success'])){
			if($_GET['success']==1){
				?>
					<script>
						swal(
							{title:'Agregado al inventario!',
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
                    <div class="col-md-8">
                        <p class="animated fadeInDown">
                          	Inventario <span class="fa-angle-right fa"></span> Agregar
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=inventario&mode=allInventario3erCronograma">3er Cronograma <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=inventario&mode=allInventario4toCronograma">4to Cronograma <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-md-offset-2">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Agregar Inventario</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="inventario" method="post" action="?view=inventario&mode=addInventarioCronograma">
                          		<div class="col-md-12">
			                        <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                          	<span class="bar"></span>
			                          	<label>*Almacenadora:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
	                                	<select class="form-control" name="almacenadora" id="almacenadora">
	                                		<option value="">Seleccione</option>
										    <?php
		                            			foreach ($_almacenadora as $almacenadora) {
		                            				?>
		                            					<option selected value="<?php echo $almacenadora['id_almacenadoras'];?>"><?php echo $almacenadora['nombre'];?></option>
		                            				<?php
		                            			}
		                            		?>
	                                	</select>
	                                </div>
	                                <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                          	<span class="bar"></span>
			                          	<label>*Cronograma:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
	                                	<select name="cronograma" id="cronograma" class="form-control">
		                            		<option value="">Seleccione</option>
		                            		<option value="1">3er Cronograma</option>
		                            		<option value="2">4to Cronograma</option>
		                            	</select>
	                                </div>
	                                <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                          	<span class="bar"></span>
			                          	<label>*Producto:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
	                                	<select name="producto" id="producto" class="form-control">
		                            		<option value="">Seleccione</option>
		                            		<?php
		                            			foreach($_producto as $producto){
		                            				?>
		                            					<option value="<?php echo $producto['id_producto'];?>"><?php echo $producto['producto'];?></option>
		                            				<?php
		                            			}
		                            		?>
		                            	</select>
	                                </div>
	                                 <div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                          	<span class="bar"></span>
			                          	<label>*Modelo:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
	                                	<select name="modelo" id="modelo" class="form-control">
		                            		<option value="">Seleccione</option>
		                            	</select>
	                                </div>
	                                <div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                              			<input type="text" class="form-text" name="cantidad" id="cantidad" onkeypress="return solonumeros(event)" required>
                              			<span class="bar"></span>
                              			<label>*Cantidad:</label>
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
		    	$("#inventario").addClass("active");
		  	});
		</script>
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
	</body>
</html>