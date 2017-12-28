<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
		$db=new Conexion();
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
		if(isset($_GET['success'])){
			if($_GET['success']==1){
				?>
					<script>
						swal(
							{title:'Orden de despacho editada!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['success']==2){
				?>
					<script>
						swal(
							{title:'Pago agregado!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['success']==3){
				?>
					<script>
						swal(
							{title:'Pago eliminado!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}

		}
	?>
	<script>
		$(document).ready(function(){
			$("#pago").change(function(){
				var pago=$("#pago").val();
				if(pago==""){
					$("#factura").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="C"){
					$("#factura").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="D"){
					$("#factura").attr("disabled", false).focus().attr("class", "required").attr("class", "form-control").attr("title", " ");
					$("#contado").attr("disabled", false).focus().attr("class", "required").attr("class", "form-control").attr("title", " ");
				}else if(pago=="T"){
					$("#factura").attr("disabled", false).focus().attr("class", "required").attr("class", "form-control").attr("title", " ");
					$("#contado").attr("disabled", false).focus().attr("class", "required").attr("class", "form-control").attr("title", " ");
				}else if(pago=="DO"){
					$("#factura").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado").attr("disabled", true).val("").attr("class", "form-control");
				}else if(pago=="DS"){
					$("#factura").attr("disabled", true).val("").attr("class", "form-control");
					$("#contado").attr("disabled", true).val("").attr("class", "form-control");
				}
			});
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
                          	4to Cronograma <span class="fa-angle-right fa"></span> Editar Orden de Despacho del Presupuesto <span class="fa-angle-right fa"></span> <?php echo $_cotizacion4tocronograma[$_GET['id']]['cotizacion'];?>
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
                      	<h4>Editar Orden de Despacho <span class="fa-angle-right fa"></span> <?php echo $_nroOrden4toCronograma[$_cotizacion4tocronograma[$_GET['id']]['id_cotizacion']]['nro_orden']?></h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="form_orden" method="post" action="?view=4toCronograma&mode=editOrden&id=<?php echo $_GET['id'];?>">
                          		<div class="col-md-12">
	                                <div class="form-group form-animate-text col-md-12" style="margin-top:-12px !important;">
	                                	<input type="text" class="form-text" id="orden" name="orden" required value="<?php echo $_nroOrden4toCronograma[$_cotizacion4tocronograma[$_GET['id']]['id_cotizacion']]['nro_orden']?>">
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
									$id_cotizacion=$_GET['id'];
									$sql=$db->query("SELECT pago, deposito, banco, id_despacho FROM despacho_4tocronograma WHERE id_cotizacion=$id_cotizacion");
									$contador=1;
									while($data=$db->recorrer($sql)){
										?>
											<div class="form-group">
					                           	<div class="col-sm-1">
													<label for="tipo" class="col-sm-2 control-label"><?php echo $contador?>:</label>
												</div>
												<input type="hidden" name="id_despacho<?php echo $contador?>" value="<?php echo $data[3];?>">
											    <div class="col-sm-3">
											      	<select class="form-control" name="pago<?php echo $contador?>" id="pago<?php echo $contador?>">
											      		<?php
											      			if($data[0]=='C'){
											      				?>
											      					<option value="">Seleccione</option>
															        <option selected value="C">Cr&eacute;dito</option>
															        <option value="D">Dep&oacute;sito</option>
															        <option value="T">Transferencia</option>
															        <option value="DO">Donación</option>
									        						<option value="DS">Deuda Social</option>
											      				<?php
											      			}else if($data[0]=='D'){
											      				?>
											      					<option value="">Seleccione</option>
															        <option value="C">Cr&eacute;dito</option>
															        <option selected value="D">Dep&oacute;sito</option>
															        <option value="T">Transferencia</option>
															        <option value="DO">Donación</option>
									        						<option value="DS">Deuda Social</option>
											      				<?php
											      			}else if($data[0]=='T'){
											      				?>
											      					<option value="">Seleccione</option>
															        <option value="C">Cr&eacute;dito</option>
															        <option value="D">Dep&oacute;sito</option>
															        <option selected value="T">Transferencia</option>
															        <option value="DO">Donación</option>
									        						<option value="DS">Deuda Social</option>
											      				<?php
											      			}else if($data[0]=='DO'){
											      				?>
											      					<option value="">Seleccione</option>
															        <option value="C">Cr&eacute;dito</option>
															        <option value="D">Dep&oacute;sito</option>
															        <option value="T">Transferencia</option>
															        <option selected value="DO">Donación</option>
									        						<option value="DS">Deuda Social</option>
											      				<?php
											      			}else if($data[0]=='DS'){
											      				?>
											      					<option value="">Seleccione</option>
															        <option value="C">Cr&eacute;dito</option>
															        <option value="D">Dep&oacute;sito</option>
															        <option value="T">Transferencia</option>
															        <option value="DO">Donación</option>
									        						<option selected value="DS">Deuda Social</option>
											      				<?php
											      			}else{
											      				?>
											      					<option value="">Seleccione</option>
															        <option value="C">Cr&eacute;dito</option>
															        <option value="D">Dep&oacute;sito</option>
															        <option value="T">Transferencia</option>
															        <option value="DO">Donación</option>
									        						<option value="DS">Deuda Social</option>
											      				<?php
											      			}
											      		?>
												    </select>
											    </div>
											    <?php
											    	if($data[0]=='C' || $data[0]=='DS' || $data[0]=='DO'){
											    		?>
											    			<div class="col-sm-3">
																<input type="text" class="form-control" id="factura<?php echo $contador?>" name="factura<?php echo $contador?>" disabled onkeypress="return solonumeros(event)" maxlength="10">
															</div>
											    		<?php
											    	}else{
											    		?>
											    			<div class="col-sm-3">
																<input type="text" class="form-control" id="factura<?php echo $contador?>" name="factura<?php echo $contador?>" onkeypress="return solonumeros(event)" maxlength="10" value="<?php echo $data[1]?>">
															</div>
											    		<?php
											    	}
											    ?>
											    <?php
											    	if($data[0]=='C' || $data[0]=='DS' || $data[0]=='DO'){
											    		?>
											    			<div class="col-sm-3">
																<select class="form-control" name="contado<?php echo $contador?>" id="contado<?php echo $contador?>" disabled>
														      		<option value="">Seleccione</option>
															        <option value="Banco de Venezuela">Banco de Venezuela</option>
															        <option value="Banco Bicentenario">Banco Bicentenario</option>
															    </select>
															</div>
											    		<?php
											    	}else{
											    		if($data[2]=="Banco de Venezuela"){
											    			?>
												    			<div class="col-sm-3">
																	<select class="form-control" name="contado<?php echo $contador?>" id="contado<?php echo $contador?>">
															      		<option value="">Seleccione</option>
																        <option selected value="Banco de Venezuela">Banco de Venezuela</option>
																        <option value="Banco Bicentenario">Banco Bicentenario</option>
																    </select>
																</div>
												    		<?php
											    		}else if($data[2]=="Banco Bicentenario"){
											    			?>
												    			<div class="col-sm-3">
																	<select class="form-control" name="contado<?php echo $contador?>" id="contado<?php echo $contador?>">
															      		<option value="">Seleccione</option>
																        <option value="Banco de Venezuela">Banco de Venezuela</option>
																        <option selected value="Banco Bicentenario">Banco Bicentenario</option>
																    </select>
																</div>
												    		<?php
											    		}
											    	}
											    ?>
											    <div class="form-group col-sm-2">
											    	<a class="btn btn-danger" onclick="DeleteItem('¿Está seguro de eliminar este pago?','?view=4toCronograma&mode=deletePago&id=<?php echo $_cotizacion4tocronograma[$_GET['id']]['id_cotizacion'];?>&id_despacho=<?php echo $data[3];?>')">Eliminar</a>
											    </div>
											</div>
											<?php
										$contador++;
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
            <div class="col-md-10">
                <div class="col-md-10 col-md-offset-2 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>Agregar Pago al Presupuesto <span class="fa-angle-right fa"></span> <?php echo $_cotizacion4tocronograma[$_GET['id']]['cotizacion'];?></h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<?php
							$add=5-$contador;
							if($add>0){
								?>
									<form class="form-horizontal" method="POST" action="?view=4toCronograma&mode=addPago&id=<?php echo $_GET['id'];?>">
										<div class="form-group">
					                       	<div class="col-sm-1">
												<label for="tipo" class="col-sm-2 control-label">Nuevo:</label>
											</div>
										    <div class="col-sm-3">
										      	<select class="form-control" name="pago" id="pago">
										      		<option value="">Seleccione</option>
											        <option value="C">Cr&eacute;dito</option>
											        <option value="D">Dep&oacute;sito</option>
											        <option value="T">Transferencia</option>
											        <option value="DO">Donación</option>
										    		<option value="DS">Deuda Social</option>
											    </select>
											</div>
											<div class="col-sm-3">
												<input type="text" class="form-control" id="factura" name="factura" disabled onkeypress="return solonumeros(event)" maxlength="10">
											</div>
											<div class="col-sm-4">
												<select class="form-control" name="contado" id="contado" disabled>
											   		<option value="">Seleccione</option>
											        <option value="Banco de Venezuela">Banco de Venezuela</option>
											        <option value="Banco Bicentenario">Banco Bicentenario</option>
											    </select>
											</div>
										</div>
										<div class="mbr-buttons mbr-buttons--center"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-danger">GUARDAR</button></div>
		                        	</form>
								<?php
							}
						?>
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