<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				?>
					<script>
						swal(
							{title:'Debe llenar los campos indicados!',
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}
		}
	?>
	<script src="asset/js/calculo3er.js"></script>
	<body>
		<div id="content">
			<div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-10">
                        <p class="animated fadeInDown">
                          	3er Cronograma <span class="fa-angle-right fa"></span> Editar Presupuesto <span class="fa-angle-right fa"></span> <?php echo $_cotizacion3ercronograma[$_GET['id']]['cotizacion'];?> <span class="fa-angle-right fa"></span> Agregar Producto
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=3erCronograma&mode=editCotizacion&id=<?php echo $_GET['id'];?>"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
                        </p>
                    </div>
                </div>
            </div>
			<div class="col-md-10">
                <div class="col-md-10 col-md-offset-2 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Agregar Producto</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="addProducto" method="post" action="?view=3erCronograma&mode=addProducto&id=<?php echo $_GET['id'];?>">
                          		<div class="col-md-12">
                          			<input type="hidden" id="art1" value="1">
                          			<div class="col-sm-2">
										<label>*Producto:</label>
									</div>
	          						<div class="form-group form-animate-text col-md-10" style="margin-top: -10px !important;">
	                                	<select class="form-control" name="prod1" id="prod1">
	                                		<option value="">Seleccione</option>
									    	<?php
											   	foreach ($_producto as $_producto) {
													?>
														<option value="<?php echo $_producto['id_producto'];?>"><?php echo $_producto['producto'];?></option>
													<?php
												}
											?>
	                                	</select>
	                                </div>
	                                <div class="col-sm-2">
										<label>*Modelo:</label>
									</div>
	          						<div class="form-group form-animate-text col-md-10" style="margin-top: -10px !important;">
	                                	<select class="form-control" id="modelo1" name="mod1">
											<option value="">Seleccione</option>
										</select>
	                                </div>
	                                <div class="form-group form-animate-text col-md-12" style="margin-top:-22px !important;" id="disponible1">
	                                	<input type="text" class="form-text" id="cant" name="cant1" required onkeypress="return solonumeros(event)">
					                    <span class="bar"></span>
                              			<label>*Cantidad</label>
									</div>
									<div class="form-group form-animate-text col-md-12" style="margin-top: 0px !important;">
	                                	<input type="text" class="form-text" id="subtotal1" name="subtotal1" onkeypress="return deshabilitarteclas(event)" autocomplete="off">
	                                	<input type="hidden" class="form-control" id="sub1" name="sub1">
					                    <span class="bar"></span>
                              			<label>Precio Total</label>
									</div>
                          		</div>  
                          		<div class="col-md-12">
                              		<div class="form-group form-animate-checkbox"></div>
                              		<input class="submit btn btn-danger" type="submit" value="Guardar">
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
				$("#cronograma3er").addClass("active");
			});
		</script>
	</body>
</html>