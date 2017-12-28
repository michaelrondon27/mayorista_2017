<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<script src="asset/js/producto.js"></script>
	<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				?>
					<script>
						swal(
							{title:'Este prodcuto ya se encuentra registrado en el sistema!',
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
                          	Configuracióm <span class="fa-angle-right fa"></span> Nuevo Producto
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          	<a class="btn btn-danger" href="?view=config&mode=allProductos">Consultar Productos <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Agregar Producto</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="productos" method="post" action="?view=config&mode=addProductos">
                          		<div class="col-md-12">
                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
                              			<input type="text" class="form-text" name="producto" id="producto" required>
                              			<span class="bar"></span>
                              			<label>*Producto:</label>
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
		    	$("#configuracion").addClass("active");
		  	});
		</script>
	</body>
</html>