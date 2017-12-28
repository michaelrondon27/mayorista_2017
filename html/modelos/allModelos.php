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
							{title:'Modelo guardado!',
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
                          	Configuración <span class="fa-angle-right fa"></span> Consultar Modelos
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=config&mode=addModelo">Nuevo Modelo <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    	<div class="panel-heading"><h3>Modelos</h3></div>
                   		<div class="panel-body">
                    		<div class="responsive-table">
                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    				<thead>
                      					<tr>
                      						<th>N</th>
											<th>Cronograma</th>
											<th>Producto</th>
											<th>Modelo</th>
											<th>Precio</th>
											<!--<th>Unidades</th>-->
											<?php
												if($_users[$_SESSION['app_id']]['id_perfil']==1){
													?>
														<th></th>
													<?php
												}
											?>   					
										</tr>
                    				</thead>
                    				<tbody>
                      					<?php
										$contador=1;
										if($_modelo>0){
											foreach ($_modelo as $modelos) {
												?>
													<tr>
														<td><?php echo $contador;?></td>
														<td>
															<?php
																if($modelos['cronograma']==1){
																	echo "3er Cronograma";
																}else if($modelos['cronograma']==2){
																	echo "4to Cronograma";
																}
															?>
														</td>
														<td><?php echo $_producto[$modelos['id_producto']]['producto'];?></td>
														<td><?php echo $modelos['modelo'];?></td>
														<td><?php echo $precio=number_format($modelos['precio'], 2, ",", ".")." Bs.";?></td>
														<!--<td><?php //echo $modelos['unidades'];?></td>-->
														<?php
															if($_users[$_SESSION['app_id']]['id_perfil']==1){
																?>
																	<td><a href="?view=config&mode=editModelo&id=<?php echo $modelos['id_modelo'];?>">Editar <i class="fa fa-pencil-square-o azul" aria-hidden="true"></i></a></td>
																<?php
															}
														?>
													</tr>
												<?php
												$contador++;
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
		    	$("#configuracion").addClass("active");
		  	});
		</script>
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
	</body>
</html>