<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<script src="views/app/js/beneficiario.js"></script>
	<?php
		if(isset($_GET['success'])){
			if($_GET['success']==true){
				?>
					<script>
						swal(
							{title:'Beneficiario editado!',
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
			}
		}
	?>
	<body>
		<div id="content">
			<div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	Beneficiarios <span class="fa-angle-right fa"></span> Editar Beneficiario <span class="fa-angle-right fa"></span> <?php echo $_beneficiario[$_GET['id']]['nombre'];?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=beneficiario">Consultar Beneficiarios <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
			<div class="col-md-10">
                <div class="col-md-10 col-md-offset-2 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Registro de Beneficiario</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="beneficiaro" method="post" action="?view=beneficiario&mode=edit&id=<?php echo $_GET['id']?>">
                          		<div class="col-md-12">
                            		<div class="form-group form-animate-text col-md-12" style="margin-top:0px !important;">
                              			<input type="text" class="form-text" id="nombre" name="nombre" required value="<?php echo $_beneficiario[$_GET['id']]['nombre'];?>">
                              			<span class="bar"></span>
                              			<label>*Nombre</label>
                            		</div>
	                                <div class="form-group form-animate-text col-md-12" style="margin-top:-32px !important;">
	                                	<input type="text" class="form-text" id="rif" name="rif" maxlength="13" value="<?php echo $_beneficiario[$_GET['id']]['rif'];?>">
					                    <span class="bar"></span>
                              			<label>*Rif</label>
									</div>
									<div class="form-group form-animate-text col-md-12" style="margin-top:-30px !important;">
                              			<input type="text" class="form-text" id="direccion" name="direccion" required value="<?php echo $_beneficiario[$_GET['id']]['direccion'];?>">
                              			<span class="bar"></span>
                              			<label>*Dirección</label>
                            		</div>
									<div class="form-group form-animate-text col-md-3" style="margin-top:-20px !important;">
	                                	<select class="form-control" name="cod_tlf" id="cod_tlf">
	                                		<option value="">Seleccione</option>
	                                		<?php
										        foreach($_cod_tlf as $tlf){
										        	if($tlf['id_cod_tlf']==$_beneficiario[$_GET['id']]['id_cod_tlf']){
										        		?>
										        			<option selected value="<?php echo $tlf['id_cod_tlf']?>"><?php echo $tlf['cod_tlf']?></option>
										        		<?php
										        	}else{
										        		?>
											       			<option value="<?php echo $tlf['id_cod_tlf']?>"><?php echo $tlf['cod_tlf']?></option>
											       		<?php
										        	}
										        }
										    ?>
	                                	</select>
	                                </div> 
	                                <div class="form-group form-animate-text col-md-9" style="margin-top:-32px !important;">
	                                	<input type="text" class="form-text" id="telefono" name="telefono" required onkeypress="return solonumeros(event)" maxlength="7" value="<?php echo $_beneficiario[$_GET['id']]['telefono'];?>">
					                    <span class="bar"></span>
                              			<label>*Teléfono</label>
									</div>
									<div class="form-group form-animate-text col-md-12" style="margin-top:-30px !important;">
                              			<input type="text" class="form-text" id="contacto" name="contacto" required value="<?php echo $_beneficiario[$_GET['id']]['contacto'];?>">
                              			<span class="bar"></span>
                              			<label>*Persona de Contacto</label>
                            		</div>
                            		<div class="form-group form-animate-text col-md-12" style="margin-top:-10px !important;">
                              			<input type="text" class="form-text" id="correo" name="correo" value="<?php echo $_beneficiario[$_GET['id']]['correo'];?>">
                              			<span class="bar"></span>
                              			<label>Correo</label>
                            		</div>
                            		<div class="form-group form-animate-text col-md-3" style="margin-top:-10px !important;">
	                                	<select class="form-control" name="cod_tlf2" id="cod_tlf2">
	                                		<option value="">Seleccione</option>
	                                		<?php
										        foreach($_cod_tlf as $tlf){
										        	if($tlf['id_cod_tlf']==$_beneficiario[$_GET['id']]['id_cod_tlf2']){
										        		?>
										        			<option selected value="<?php echo $tlf['id_cod_tlf']?>"><?php echo $tlf['cod_tlf']?></option>
										        		<?php
										        	}else{
										        		?>
											       			<option value="<?php echo $tlf['id_cod_tlf']?>"><?php echo $tlf['cod_tlf']?></option>
											       		<?php
										        	}
										        }
										    ?>
	                                	</select>
	                                </div> 
	                                <div class="form-group form-animate-text col-md-9" style="margin-top:-22px !important;">
	                                	<input type="text" class="form-text" id="telefono2" name="telefono2" onkeypress="return solonumeros(event)" maxlength="7" value="<?php echo $_beneficiario[$_GET['id']]['telefono2'];?>">
					                    <span class="bar"></span>
                              			<label>Otro teléfono</label>
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
				$("#beneficiario").addClass("active");
			});
		</script>
	</body>
</html>