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
							{title:'Producto guardado!',
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
                          	Configuración <span class="fa-angle-right fa"></span> Consultar Productos
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=config&mode=addProductos">Nuevo Producto <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    	<div class="panel-heading"><h3>Productos</h3></div>
                   		<div class="panel-body">
                    		<div class="responsive-table">
                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    				<thead>
                      					<tr>
                      						<th>N</th>
											<th>Producto</th>
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
											if($_producto>0){
												foreach ($_producto as $productos) {
													?>
														<tr>
															<td><?php echo $contador;?></td>
															<td><?php echo $productos['producto'];?></td>
															<?php
																if($_users[$_SESSION['app_id']]['id_perfil']==1){
																	?>
																		<td><a href="?view=config&mode=editProductos&id=<?php echo $productos['id_producto'];?>">Editar <i class="fa fa-pencil-square-o azul" aria-hidden="true"></i></a></td>
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