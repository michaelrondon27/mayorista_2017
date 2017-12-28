<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
		$db=new Conexion();
	?>
	<body>
		<div id="content">
			<div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	3er Cronograma <span class="fa-angle-right fa"></span> Ver Presupuesto <span class="fa-angle-right fa"></span> <?php echo $_cotizacion3ercronograma[$_GET['id']]['cotizacion'];?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=3ercronograma&mode=allCotizacion">Consultar Presupuesto <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
			<div class="col-md-10">
                <div class="col-md-10 col-md-offset-2 panel">
                    <div class="col-md-12 panel-heading">
                      	<h4>
                      		Fecha: <?php echo $fec=date("d-m-Y", strtotime($_cotizacion3ercronograma[$_GET['id']]['fecha']));?>
                      		 <span class="fa-angle-right fa"></span> 
                      		Beneficiario: <?php echo $_beneficiario[$_cotizacion3ercronograma[$_GET['id']]['id_empresa']]['nombre'];?>
                      	</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                    	<br>
                      	<div class="col-md-12">
				            <table class="table table-striped table-bordered">
								<tr>
									<td align="center">ITEM</td>
									<td align="center">PRODUCTO</td>
									<td align="center">MODELO</td>
									<td align="center">CANTIDAD</td>
									<td align="center">PRECIO TOTAL</td>
								</tr>
								<?php 
									$id=$_GET['id']; 
									$sql=$db->query("SELECT o.id_ordenes, o.cantidad, o.precio_total, p.producto, m.modelo FROM ordenes_3ercronograma o INNER JOIN producto p ON o.id_producto=p.id_producto INNER JOIN modelo m ON o.id_modelo=m.id_modelo WHERE o.id_cotizacion=$id;");
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
									<td align=center><?php echo $_cotizacion3ercronograma[$_GET['id']]['unidades_total'];?></td>
								</tr>
								<?php
									if($_cotizacion3ercronograma[$_GET['id']]['desc_porcentaje']!=""){
										?>
											<tr>
												<td colspan='4' align='right'>
													<strong>SUBTOTAL:</strong>
												</td>
												<td align=center><?php echo $_cotizacion3ercronograma[$_GET['id']]['subtotal'];?></td>
											</tr>
											<tr>
												<td colspan='3' align='right'>
													<strong>DESCUENTO:</strong>
												</td>
												<td align=center><?php echo $_cotizacion3ercronograma[$_GET['id']]['desc_porcentaje']."%";?></td>
												<td  align=center><?php echo $_cotizacion3ercronograma[$_GET['id']]['descuento'];?></td>
											</tr>
										<?php
									}
								?>
								<tr>
									<td colspan='4' align='right' class='izquierda'>
										<strong>TOTAL:</strong>
									</td>
									<td align=center><?php echo $_cotizacion3ercronograma[$_GET['id']]['total'];?></td>
								</tr>
							</table>
		                </div>
                    </div>
                </div>
            </div>
		</div>
		<script>
		  	$(document).ready(function(){
		    	$("#cronograma3er").addClass("active");
		  	});
		</script>
	<body>
</html>