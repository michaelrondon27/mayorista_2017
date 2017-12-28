<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
		$db=new Conexion();
	?>
	<script src="asset/js/cotizacion.js"></script>
	<?php
		if(isset($_GET['success'])){
			if($_GET['success']==1){
				?>
					<script>
						swal(
							{title:'Cotización editada!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['success']==2){
				?>
					<script>
						swal(
							{title:'Producto agregado!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['success']==3){
				?>
					<script>
						swal(
							{title:'Descuento agregado!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['success']==4){
				?>
					<script>
						swal(
							{title:'Producto elimininado!',
							type:'success',
							confirmButtonText:'Aceptar'}
						);
					</script>
				<?php
			}else if($_GET['success']==5){
				?>
					<script>
						swal(
							{title:'Producto editado!',
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
							{title:'Por favor coloque otro número de presupuesto!',
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
                          	4to Cronograma <span class="fa-angle-right fa"></span> Editar Presupuesto <span class="fa-angle-right fa"></span> <?php echo $_cotizacion4tocronograma[$_GET['id']]['cotizacion'];?>
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
                      	<h4>Editar Cabecera</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<p>Los campos con (*) son obligatorios.</p>
                    	<br>
                      	<div class="col-md-12">
                        	<form class="cmxform" id="form_cotizacion" method="post" action="?view=4toCronograma&mode=editCotizacion&id=<?php echo $_GET['id'];?>">
                          		<div class="col-md-12">
                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
                              			<input type="text" class="form-text" id="cotizacion" name="cotizacion" required value="<?php echo $_cotizacion4tocronograma[$_GET['id']]['cotizacion'];?>">
                              			<span class="bar"></span>
                              			<label>*Cotizaci&oacute;n Nro.:</label>
                            		</div>
                            		<div class="form-group form-animate-text col-md-3" style="margin-top: -10px !important;">
			                          	<input type="text" class="form-text dateAnimate" id="fecha" name="fecha" required autocomplete="off" value="<?php echo $fec=date("d-m-Y", strtotime($_cotizacion4tocronograma[$_GET['id']]['fecha']));?>">
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
													if($beneficiario['id_empresa']==$_cotizacion4tocronograma[$_GET['id']]['id_empresa']){
														?>
															<option selected value="<?php echo $beneficiario['id_empresa']?>"><?php echo $beneficiario['nombre'];?></option>
														<?php
													}else{
														?>
															<option value="<?php echo $beneficiario['id_empresa']?>"><?php echo $beneficiario['nombre'];?></option>
														<?php
													}
												}
									    	?>
	                                	</select>
	                                </div>
	                            </div>
	                            <div class="col-md-12">
                              		<input class="submit btn btn-danger" type="submit" value="Guardar">
                        		</div>
                      		</form>
		                </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4 class="col-md-4">Editar Productos</h4>
                      	<div class="col-md-3">
                        	<p class="animated fadeInDown">
                          		<a class="btn btn-danger" href="?view=4toCronograma&mode=addProducto&id=<?php echo $_GET['id'];?>">Agregar Producto <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        	</p>
                    	</div>
                    	<div class="col-md-3">
                        	<p class="animated fadeInDown">
                          		<a class="btn btn-danger" href="?view=4toCronograma&mode=addDescuento&id=<?php echo $_GET['id'];?>">Agregar o Editar Descuento <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        	</p>
                    	</div>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<br>
                      	<div class="col-md-12">
                        	<div class="form-group">
					            <table class="table table-striped table-bordered" id="mitabla">
									<tr>
										<td align="center">ITEM</td>
										<td align="center">PRODUCTO</td>
										<td align="center">MODELO</td>
										<td align="center">CANTIDAD</td>
										<td align="center">PRECIO TOTAL</td>
										<td></td>
									</tr>
									<?php 
										$id=$_GET['id']; 
										$sql=$db->query("SELECT o.id_ordenes, o.cantidad, o.precio_total, p.producto, m.modelo FROM ordenes_4tocronograma o INNER JOIN producto p ON o.id_producto=p.id_producto INNER JOIN modelo m ON o.id_modelo=m.id_modelo WHERE id_cotizacion=$id;");
										$contador=1;
										if($db->rows($sql)){
											while($data=$db->recorrer($sql)){
												?>
													<tr>
														<td align="center"><?php echo $contador;?></td>
														<td align="center"><?php echo $data[3];?></td>
														<td align="center"><?php echo $data[4];?></td>
														<td align="center"><?php echo $data[1];?></td>
														<td align="center"><?php echo $data[2];?></td>
														<td>
															<div class="dropdown">
						  										<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    										Acciones
						    										<span class="caret"></span>
						  										</button>
						  										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						    										<li><a href="?view=4toCronograma&mode=editProducto&orden=<?php echo $data[0];?>&id=<?php echo $id;?>">Editar Producto</a></li>
																	<li><a onclick="DeleteItem('¿Está seguro de eliminar este producto?','?view=4toCronograma&mode=deleteProducto&orden=<?php echo $data[0];?>&id=<?php echo $_GET['id'];?>')"">Eliminar Producto</a></li>
						  										</ul>
															</div>
														</td>
													</tr>
												<?php
												$contador++;
											}
										}
									?>
									<tr>
										<td colspan='3' align='right' class='abajo izquierda'>
											<strong>CANTIDAD TOTAL:</strong>
										</td>
										<td align=center><?php echo $_cotizacion4tocronograma[$_GET['id']]['unidades_total'];?></td>
										<td></td>
										<td></td>
									</tr>
									<?php
										if($_cotizacion4tocronograma[$_GET['id']]['desc_porcentaje']!=""){
											?>
												<tr>
													<td colspan='4' align='right'>
														<strong>SUBTOTAL:</strong>
													</td>
													<td align=center><?php echo $_cotizacion4tocronograma[$_GET['id']]['subtotal'];?></td>
													<td></td>
												</tr>
												<tr>
													<td colspan='3' align='right'>
														<strong>DESCUENTO:</strong>
													</td>
													<td align=center><?php echo $_cotizacion4tocronograma[$_GET['id']]['desc_porcentaje']."%";?></td>
													<td  align=center><?php echo $_cotizacion4tocronograma[$_GET['id']]['descuento'];?></td>
													<td></td>
												</tr>
											<?php
										}
									?>
									<tr>
										<td colspan='4' align='right' class='izquierda'>
											<strong>TOTAL:</strong>
										</td>
										<td align=center><?php echo $_cotizacion4tocronograma[$_GET['id']]['total'];?></td>
										<td></td>
									</tr>
								</table>       
				            </div>
		                </div>
                    </div>
                </div>
            </div>
		</div>
		<script>
		  	$(document).ready(function(){
		    	$("#cronograma4to").addClass("active");
		  	});
		</script>
	</body>
</html>