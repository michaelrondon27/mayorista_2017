<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<script src="asset/js/cotizacion.js"></script>
	<script>
		$(document).ready(function(){
			$('#productos').change(function(){
				var producto=$('#productos').val();
				$.ajax({
			        type: "POST",
			        url: "html/4toCronograma/CantProd.php",
			        data:{
			          	"productos":producto
			        },
			        success: function(resp){
		                if(resp!=""){
		                    $("#respuestas").html(resp);
		                }
		            }
			    });
			});
		});
	</script>
	<?php
		if(isset($_GET['success'])){
			if($_GET['success']==true){
				?>
					<script>
						swal(
							{title:'Cotización guardada!',
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
							type:'warning',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['error']==2){
				?>
					<script>
						swal(
							{title:'Este numero de cotización ya se encuentra registrado!',
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
                          4to Cronograma <span class="fa-angle-right fa"></span> Nuevo Presupuesto
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=4tocronograma&mode=allCotizacion">Consultar Presupuesto <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
			<div class="col-md-12">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Presupuesto</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="form_cotizacion" method="post" action="?view=4toCronograma&mode=addCotizacion">
                          		<div class="col-md-12">
                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                              			<input type="text" class="form-text" id="cotizacion" name="cotizacion" required>
                              			<span class="bar"></span>
                              			<label>*Presupuesto Nro.:</label>
                            		</div>
                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                          	<input type="text" class="form-text dateAnimate" id="fecha" name="fecha" required autocomplete="off">
			                          	<span class="bar"></span>
			                          	<label><span class="fa fa-calendar"></span> *Fecha</label>
			                        </div>
			                        <div class="form-group form-animate-text col-md-2" style="margin-top: -10px !important;">
			                          <span class="bar"></span>
			                          <label><span class="fa fa-id-card-o"></span> *Beneficiario</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-4" style="margin-top:0px !important;">
	                                	<select class="form-control" name="empresa" id="empresa">
	                                		<option value="">Seleccione</option>
	                                		<?php
										    	foreach ($_beneficiario as $beneficiario) {
										    		?>
										    			<option value="<?php echo $beneficiario['id_empresa']?>"><?php echo $beneficiario['nombre'];?></option>
										    		<?php
										    	}
										    ?>
	                                	</select>
	                                </div>
	                                <div class="form-group form-animate-text col-md-12" style="margin-top: -10px !important;"></div>
	                                <div class="form-group form-animate-text col-md-3" style="margin-top: -60px !important;">
			                          <span class="bar"></span>
			                          <label>Cantidad de Productos a cotizar:</label>
			                        </div>
	          						<div class="form-group form-animate-text col-md-4 col-md-offset-3" style="margin-top:-55px !important;">
	                                	<select class="form-control" name="productos" id="productos">
	                                		<option value="">Seleccione</option>
	                                		<option value="10">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="40">40</option>
											<option value="50">50</option>
	                                	</select>
	                                </div>
	                                <div id="respuestas"></div>
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
		    	$("#cronograma4to").addClass("active");
		  	});
		</script>
	</body>
</html>