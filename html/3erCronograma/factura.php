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
	<script>
		$(document).ready(function(){
			$('#fecha').bootstrapMaterialDatePicker({
				weekStart : 0, 
				time: false,
				animation:true
			});
		    $("#factura").validate({
				rules:{
					fecha:"required"
				},
				messages:{
					fecha:"Seleccione una fecha, por favor"
				}
			});
		});
	</script>
	<body>
		<div id="content">
			<div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          3er Cronograma <span class="fa-angle-right fa"></span> Imprimir Factura <span class="fa-angle-right fa"></span> <?php echo $_cotizacion3ercronograma[$_GET['id']]['cotizacion'];?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=3ercronograma&mode=allCotizacion">Consultar Presupuesto <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
			<div class="col-md-9 col-md-offset-2">
                <div class="col-md-8 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Fecha de Factura</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="factura" method="post" action="?view=3erCronograma&mode=pdfFactura&id=<?php echo $_GET['id'];?>">
                          		<div class="col-md-12">
                            		<div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;">
			                          	<input type="text" class="form-text dateAnimate" id="fecha" name="fecha" required autocomplete="off">
			                          	<span class="bar"></span>
			                          	<label><span class="fa fa-calendar"></span> *Fecha</label>
			                        </div>
	                            </div>
	                            <div class="form-group">
									<div class="col-sm-offset-3 col-sm-5">
									   	<button type="submit" class="btn btn-danger">GENERAR FACTURA</button>
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
		    	$("#cronograma3er").addClass("active");
		  	});
		</script>
	</body>
</html>