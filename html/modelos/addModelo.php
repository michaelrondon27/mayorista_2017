<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<script src="asset/js/modelo.js"></script>
	<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				?>
					<script>
						swal(
							{title:'Este modelo ya se encuentra registrado en el sistema!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==2){
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
                          	Configuracióm <span class="fa-angle-right fa"></span> Nuevo Modelo
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          	<a class="btn btn-danger" href="?view=config&mode=allModelos">Consultar Modelos <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Agregar Modelo</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="modelo" method="post" action="?view=config&mode=addModelo">
                          		<div class="col-md-12">
                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                              			<input type="text" class="form-text" name="modelo" id="modelo" required>
                              			<span class="bar"></span>
                              			<label>*Modelo:</label>
                            		</div>
                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                              			<input type="text" class="form-text" name="precio" id="precio" onkeypress="return solonumeros2(event)" required>
                              			<span class="bar"></span>
                              			<label>*Precio:</label>
                              			<p style="margin-top: 10px;">Ejemplo: 12345.67</p>
                            		</div>
                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -30px !important;">
                              			<input type="text" class="form-text" name="verifique" id="verifique" onkeypress="return deshabilitarteclas(event)" autocomplete="off" required>
                              			<span class="bar"></span>
                              			<label>*Verifique el precio:</label>
                            		</div>
                            		<!--<div class="form-group form-animate-text col-md-12" style="margin-top:-20px !important;">
				                        <input type="text" class="form-text mask-money" name="precio" id="precio" required>
				                        <span class="bar"></span>
				                        <label>*Precio:</label>
				                    </div>-->
                            		<div class="form-group form-animate-text col-md-2" style="margin-top: -10px !important;">
			                          	<span class="bar"></span>
			                          	<label>*Producto:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-10" style="margin-top:0px !important;">
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
			                          	<label>*Cronograma:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-9" style="margin-top:0px !important;">
	                                	<select name="cronograma" id="cronograma" class="form-control">
		                            		<option value="">Seleccione</option>
		                            		<option value="1">3er Cronograma</option>
		                            		<option value="2">4to Cronograma</option>
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
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
		<script>
		  	$(document).ready(function(){
		  		$('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
		    	$("#configuracion").addClass("active");
		  	});
		</script>
	</body>
</html>