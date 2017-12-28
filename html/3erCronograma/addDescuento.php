<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<body>
		<div id="content">
			<div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-10">
                        <p class="animated fadeInDown">
                          	3er Cronograma <span class="fa-angle-right fa"></span> Editar Presupuesto <span class="fa-angle-right fa"></span> <?php echo $_cotizacion3ercronograma[$_GET['id']]['cotizacion'];?> <span class="fa-angle-right fa"></span> Agregar Descuento
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
                      	<h4>Agregar Descuento</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Si desea quitarle el descuento solo deje el campo vacio y le das click en guardar.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="addProducto" method="post" action="?view=3erCronograma&mode=addDescuento&id=<?php echo $_GET['id'];?>">
                          		<div class="col-md-12">
	                                <div class="form-group form-animate-text col-md-12" style="margin-top: 0px !important;" id="disponible1">
	                                	<input type="text" class="form-text" id="descuento" name="descuento" onkeypress="return solonumeros(event)">
					                    <span class="bar"></span>
                              			<label>Descuento</label>
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