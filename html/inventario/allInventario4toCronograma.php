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
							{title:'Guardado en el inventario!',
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
                          	Inventario <span class="fa-angle-right fa"></span> 4to Cronograma
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=inventario&mode=addInventarioCronograma">Agregar Inventario <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    	<div class="panel-heading"><h3>4to Cronograma</h3></div>
                   		<div class="panel-body">
                    		<div class="responsive-table">
                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    				<thead>
                      					<tr>
                      						<th>Almacenadora</th>
											<th>Producto</th>
											<th>Modelo</th>
											<th>Unidades</th>     					
										</tr>
                    				</thead>
                    				<tbody>
                      					<?php
											if($_existencia4toCronograma>0){
												foreach ($_existencia4toCronograma as $_existencia4toCronograma) {
													?>
														<tr>
															<td><?php echo $_almacenadora[$_existencia4toCronograma['id_almacenadora']]['nombre'];?></td>
															<td><?php echo $_producto[$_existencia4toCronograma['id_producto']]['producto'];?></td>
															<td><?php echo $_modelo[$_existencia4toCronograma['id_modelo']]['modelo'];?></td>
															<td><?php echo $_existencia4toCronograma['unidades']?></td>
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
		    	$("#inventario").addClass("active");
		  	});
		</script>
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
	</body>
</html>