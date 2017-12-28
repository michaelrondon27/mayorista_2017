<!DOCTYPE html>
<html>
	<?php
		include(HTML_DIR."overall/header.php");
		include(HTML_DIR."overall/menu.php");
		include(HTML_DIR."overall/scripts.php");
	?>
	<body>
		<div id="content">
            <div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-9">
                        <p class="animated fadeInDown">
                          	Usuarios <span class="fa-angle-right fa"></span> Consultar Usuarios
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=user&mode=add">Nuevo Usuario <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                    	<div class="panel-heading"><h3>Usuarios</h3></div>
                   		<div class="panel-body">
                    		<div class="responsive-table">
                    			<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    				<thead>
                      					<tr>
                      						<th>Foto</th>
											<th>Usuario</th>
											<th>Nombre</th>
											<th>Estatus</th>
											<th>Perfil</th>
											<th></th>   					
										</tr>
                    				</thead>
                    				<tbody>
                      					<?php
											foreach ($_SESSION['users'] as $user) {
												?>
													<tr>
														<td align="center"><img src="<?php echo $user['foto'];?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/></td>
														<td><?php echo $user['user'];?></td>
														<td><?php echo $user['nombre'];?></td>
														<td><?php echo $_status[$user['id_status']]['status'];?></td>
														<td><?php echo $_perfil[$user['id_perfil']]['perfil'];?></td>
														<td>
															<div class="dropdown">
							  									<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    									Acciones
							    									<span class="caret"></span>
							  									</button>
							  									<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    									<li><a href="?view=user&mode=edit&id=<?php echo $user['id_usuario']?>">Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
							    									<li><a href="?view=user&mode=adminPass&id=<?php echo $user['id_usuario']?>">Cambiar Password <i class="fa fa-cog" aria-hidden="true"></i></a></li>
							  									</ul>
															</div>
														</td>
													</tr>
												<?php
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
		    	$("#usuario").addClass("active");
		  	});
		</script>
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
	</body>
</html>