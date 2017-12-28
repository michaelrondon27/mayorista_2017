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
							{title:'El número de orden de despacho ya esta registrado en el sistema!',
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
			$("#pago1").change(function(){
				var pago=$("#pago1").val();
				if(pago==""){
					$("#factura1").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado1").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="C"){
					$("#factura1").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado1").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="D"){
					$("#factura1").attr("disabled", false).focus().attr("class", "required").attr("class", "form-control").attr("title", " ");
					$("#contado1").attr("disabled", false).focus().attr("class", "required").attr("class", "form-control").attr("title", " ");
				}else if(pago=="T"){
					$("#factura1").attr("disabled", false).focus().attr("class", "required").attr("class", "form-control").attr("title", " ");
					$("#contado1").attr("disabled", false).focus().attr("class", "required").attr("class", "form-control").attr("title", " ");
				}else if(pago=="DO"){
					$("#factura1").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado1").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="DS"){
					$("#factura1").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado1").attr("disabled", true).val("").attr("class", "form-control");
				}
			});
			$("#pago2").change(function(){
				var pago=$("#pago2").val();
				if(pago==""){
					$("#factura2").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado2").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="C"){
					$("#factura2").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado2").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="D"){
					$("#factura2").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
					$("#contado2").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
				}else if(pago=="T"){
					$("#factura2").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
					$("#contado2").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
				}else if(pago=="DO"){
					$("#factura2").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado2").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="DS"){
					$("#factura2").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado2").attr("disabled", true).val("").attr("class", "form-control");
				}
			});
			$("#pago3").change(function(){
				var pago=$("#pago3").val();
				if(pago==""){
					$("#factura3").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado3").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="C"){
					$("#factura3").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado3").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="D"){
					$("#factura3").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
					$("#contado3").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
				}else if(pago=="T"){
					$("#factura3").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
					$("#contado3").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
				}else if(pago=="DO"){
					$("#factura3").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado3").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="DS"){
					$("#factura3").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado3").attr("disabled", true).val("").attr("class", "form-control");
				}
			});
			$("#pago4").change(function(){
				var pago=$("#pago4").val();
				if(pago==""){
					$("#factura4").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado4").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="C"){
					$("#factura4").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado4").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="D"){
					$("#factura4").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
					$("#contado4").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
				}else if(pago=="T"){
					$("#factura4").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
					$("#contado4").attr("disabled", false).focus().attr("class", "form-control").attr("class", "form-control").attr("title", " ");
				}else if(pago=="DO"){
					$("#factura4").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado4").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="DS"){
					$("#factura4").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado4").attr("disabled", true).val("").attr("class", "form-control");
				}
			});
			$("#form_orden").validate({
				rules:{
					orden:"required",
					pago1:"required",
					factura1:[10,11]
				},
				messages:{
					orden:"",
					pago1:"",
					factura1:"M&iacute;nimo 10 caracteres"
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
                          	4to Cronograma <span class="fa-angle-right fa"></span> Generar Orden de Despacho del Presupuesto <span class="fa-angle-right fa"></span> <?php echo $_cotizacion4tocronograma[$_GET['id']]['cotizacion'];?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=4tocronograma&mode=allCotizacion">Consultar Presupuesto <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
			<div class="col-md-10">
                <div class="col-md-10 col-md-offset-2 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Generar Orden de Despacho</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" method="post" action="?view=4toCronograma&mode=addOrden&id=<?php echo $_GET['id'];?>" id="form_orden">
                          		<div class="col-md-12">
	                                <div class="form-group form-animate-text col-md-12" style="margin-top:-12px !important;">
	                                	<input type="text" class="form-text" id="orden" name="orden" required>
					                    <span class="bar"></span>
                              			<label>*Orden de Despacho</label>
									</div>
                          		</div>
                          		<div class="col-md-12">
	                                <div class="form-group form-animate-text col-md-12" style="margin-top:-12px !important;">
	                                	<input type="text" class="form-text" value="<?php echo $_beneficiario[$_cotizacion4tocronograma[$_GET['id']]['id_empresa']]['nombre'];?>" onkeypress="return deshabilitarteclas(event)">
					                    <span class="bar"></span>
                              			<label>Beneficiario</label>
									</div>
                          		</div>
                          		<?php
									for($i=1;$i<=4;$i++){
										?>
											<div class="form-group">
				                    	       	<div class="col-sm-1">
													<label for="tipo" class="col-sm-2 control-label">*<?php echo $i;?>:</label>
												</div>
											    <div class="col-sm-3">
											      	<select class="form-control" name="pago<?php echo $i;?>" id="pago<?php echo $i;?>">
											      		<option value="">Seleccione</option>
												        <option value="C">Cr&eacute;dito</option>
												        <option value="D">Dep&oacute;sito</option>
												        <option value="T">Transferencia</option>
												        <option value="DO">Donación</option>
												        <option value="DS">Deuda Social</option>
												    </select>
											    </div>
											    <div class="col-sm-4">
													<input type="text" class="form-control" id="factura<?php echo $i;?>" name="factura<?php echo $i;?>" disabled onkeypress="return solonumeros(event)" maxlength="10">
												</div>
												<div class="col-sm-4">
													<select class="form-control" name="contado<?php echo $i;?>" id="contado<?php echo $i;?>" disabled>
											      		<option value="">Seleccione</option>
												        <option value="Banco de Venezuela">Banco de Venezuela</option>
												        <option value="Banco Bicentenario">Banco Bicentenario</option>
												    </select>
												</div>
											</div>
										<?php
									}
								?>
								<input type="hidden" name="contador" value="<?php echo $contador;?>">
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
				$("#cronograma4to").addClass("active");
			});
		</script>
	</body>
</html>