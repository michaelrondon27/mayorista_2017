<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
		if(isset($_GET['success'])){
			if($_GET['success']==1){
				?>
					<script>
						swal(
							{title:'Cotización eliminada!',
							type:'success',
							confirmButtonText:'Aceptar'},
							function(){
								window.location.href='?view=3ercronograma&mode=allCotizacion';
							}
						);
					</script>
				<?php
			}
			if($_GET['success']==2){
				?>
					<script>
						swal(
							{title:'Orden generada!',
							type:'success',
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
                          	3er Cronograma <span class="fa-angle-right fa"></span> Consultar Presupuestos
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=3ercronograma&mode=addCotizacion">Nuevo Presupuesto <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    	<div class="panel-heading"><h3>Beneficiarios</h3></div>
                   		<div class="panel-body">
                    		<div class="responsive-table">
                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    				<thead>
                      					<tr>
                      						<th></th> 
											<th>Presupuesto</th>
											<th>Beneficiario</th>
											<th>Cant. Productos</th>
											<th>Fecha</th>
											<th>Orden de despacho</th>
											<th>Total</th>       					
										</tr>
                    				</thead>
                    				<tbody>
                      					<?php
											if($_cotizacion3ercronograma>0){
												foreach ($_cotizacion3ercronograma as $cotizacion3ercronograma) {
													$fecha=date("d-m-Y", strtotime($cotizacion3ercronograma['fecha']));
													if($cotizacion3ercronograma['despacho']==0){
													$color="#FFF";
													}else if($cotizacion3ercronograma['despacho']==1){
														$color="#CCFFD4";
													}else if($cotizacion3ercronograma['despacho']==2){
														$color="#FFCCCC";
													}
														?>
															<tr style="background-color: <?php echo $color;?>;">
															<td>
																<div class="dropdown">
							  										<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    										Acciones
							    										<span class="caret"></span>
							  										</button>
							  										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								  										<?php
								  											if($cotizacion3ercronograma['despacho']==0 || $cotizacion3ercronograma['despacho']==1){
								  												?>
								  													<li><a href="?view=3erCronograma&mode=editCotizacion&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>">Editar Presupuesto <i class="fa fa-pencil-square-o azul" aria-hidden="true"></i></a></li>
											    									<li><a href="?view=3erCronograma&mode=pdfCotizacion&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>" target="_blank">PDF Presupuesto <i class="fa fa-file-pdf-o rojo" aria-hidden="true"></i></a></li>
											    									<!--<li><a href="?view=3erCronograma&mode=excelCotizacion&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>" target="_blank">EXCEL Presupuesto <i class="fa fa-file-excel-o verde" aria-hidden="true"></i></a></li>-->
											    									<li><a href="?view=3erCronograma&mode=factura&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>">Imprimir Factura <i class="fa fa-print" aria-hidden="true"></i></a></li>
								  												<?php
								  											}
							                        						if($cotizacion3ercronograma['despacho']==0){
							                        							?>
							                        								<li><a href="?view=3erCronograma&mode=addOrden&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>">Generar Orden <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
							                        								<li><a onclick="AnularItem('¿Está seguro de anular esta cotización?','?view=3erCronograma&mode=anularCotizacion&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>')">Anular <i class="fa fa-times rojo" aria-hidden="true"></i></a></li>
																					<li><a onclick="DeleteItem('¿Está seguro de eliminar esta cotización?','?view=3erCronograma&mode=deleteCotizacion&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>')">Eliminar <i class="fa fa-trash" aria-hidden="true"></i></a></li>
							                        							<?php
							                        						}
							                        						if($cotizacion3ercronograma['despacho']==1){
							                        							?>
							                        								<li><a href="?view=3erCronograma&mode=editOrden&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>">Editar Orden <i class="fa fa-pencil-square-o azul" aria-hidden="true"></i></a></li>
							                        								<li><a href="?view=3erCronograma&mode=pdfOrdenDespacho&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>" target="_blank">PDF Orden <i class="fa fa-file-pdf-o rojo" aria-hidden="true"></i></a>
							                        							<?php
							                        						}
							                        						if($cotizacion3ercronograma['despacho']==2){
							                        							?>
							                        								<li><a onclick="ReversarItem('¿Está seguro de reversar esta cotización?','?view=3erCronograma&mode=reversarCotizacion&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>')">Reversar <i class="fa fa-refresh" aria-hidden="true"></i></a></li>
							                        							<?php
							                        						}
							                        					?>
							  										</ul>
																</div>
															</td>
															<td><a href="?view=3erCronograma&mode=verCotizacion&id=<?php echo $cotizacion3ercronograma['id_cotizacion'];?>"><?php echo $cotizacion3ercronograma['cotizacion'];?></a></td>
															<td><?php echo $_beneficiario[$cotizacion3ercronograma['id_empresa']]['nombre'];?></td>
															<td><?php echo $cotizacion3ercronograma['unidades_total'];?></td>
															<td><?php echo $fecha;?></td>
															<td>
																<?php
																	if($cotizacion3ercronograma['despacho']==0){
																		echo "Sin Orden de Despacho.";
																	}else if($cotizacion3ercronograma['despacho']==1){
																		echo $_nroOrden3erCronograma[$cotizacion3ercronograma['id_cotizacion']]['nro_orden'];
																	}else if($cotizacion3ercronograma['despacho']==2){
																		echo "Anulada";
																	}
																?>
															</td>
															<td><?php echo $cotizacion3ercronograma['total'];?></td>
														</tr>
													<?php
												}
											}
										?>
                    				</tbody>
                      			</table>
                    		</div>
                  		</div>
                	</div>
              	</div>  
            </div>
        </div>
		<script>
		  	$(document).ready(function(){
		    	$('#datatables-example').DataTable();
		    	$("#cronograma3er").addClass("active");
		  	});
		</script>
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
	</body>
</html>