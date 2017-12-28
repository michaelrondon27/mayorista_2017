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
			}else if($_GET['error']==2){
				?>
					<script>
						swal(
							{title:'no hay nada que reportar!',
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
			$('#desde').bootstrapMaterialDatePicker({
				weekStart : 0, 
				time: false,
				animation:true
			});
			$('#hasta').bootstrapMaterialDatePicker({
				weekStart : 0, 
				time: false,
				animation:true
			});
			$("#estadoCotizaciones").validate({
				rules:{
					desde:"required",
					hasta:"required"
				},
				messages:{
					desde:"Seleccione una fecha, por favor",
					hasta:"Seleccione una fecha, por favor"
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
                          3er Cronograma <span class="fa-angle-right fa"></span> Estado Cotizaciones
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=3ercronograma&mode=allCotizacion">Consultar Presupuesto <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
			<div class="col-md-8 col-md-offset-2">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Reporte Estado Cotizaciones</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="estadoCotizaciones" method="post" action="?view=3erCronograma&mode=estadoCotizaciones">
                          		<div class="col-md-12">
                            		<div class="form-group form-animate-text col-md-6" style="margin-top: -10px !important;">
			                          	<input type="text" class="form-text dateAnimate" id="desde" name="desde" autocomplete="off" required>
			                          	<span class="bar"></span>
			                          	<label><span class="fa fa-calendar"></span> *Desde</label>
			                        </div>
                            		<div class="form-group form-animate-text col-md-6" style="margin-top: -10px !important;">
			                          	<input type="text" class="form-text dateAnimate" id="hasta" name="hasta" autocomplete="off" required>
			                          	<span class="bar"></span>
			                          	<label><span class="fa fa-calendar"></span> *Hasta</label>
			                        </div>
			                        <div class="form-group col-md-12" style="margin-top: -10px !important;">
			                          	<label class="radio-inline">
									  		<input type="radio" name="tipo" id="inlineRadio1" value="pdf"> PDF
										</label>
										<label class="radio-inline">
									 		<input type="radio" name="tipo" id="inlineRadio2" value="excel"> EXCEL
										</label>
			                        </div>
			                        <div class="col-md-12">
	                              		<div class="form-group form-animate-checkbox"></div>
	                              		<input class="submit btn btn-danger" type="submit" value="Generar">
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