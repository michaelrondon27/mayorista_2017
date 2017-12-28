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
                          	Beneficiarios <span class="fa-angle-right fa"></span> Consultar Beneficiarios
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="animated fadeInDown">
                          <a class="btn btn-danger" href="?view=beneficiario&mode=add">Nuevo Beneficiario <i class="fa fa-sign-in" aria-hidden="true"></i></a>
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
											<th>Beneficiario</th>
											<th>Rif</th>
											<th>Direcci&oacute;n</th>
											<th>Tel&eacute;fono</th>
											<th>Contacto</th>
											<th>Correo</th>
											<th></th>                       					
										</tr>
                    				</thead>
                    				<tbody>
                      					<?php
											if($_beneficiario>0){
												foreach ($_beneficiario as $beneficiario) {
													?>
														<tr>
															<td><?php echo $beneficiario['nombre'];?></td>
															<td><?php echo $beneficiario['rif'];?></td>
															<td><?php echo $beneficiario['direccion']?></td>
															<?php
																foreach ($_cod_tlf as $cod_tlf) {
																	if($cod_tlf['id_cod_tlf']==$beneficiario['id_cod_tlf']){
																		?>
																			<td><?php echo $cod_tlf['cod_tlf']."-".$beneficiario['telefono'];?></td>
																		<?php
																	}
																}
															?>
															<td><?php echo $beneficiario['contacto'];?></td>
															<td><?php echo $beneficiario['correo'];?></td>
															<td><a href="?view=beneficiario&mode=edit&id=<?php echo $beneficiario['id_empresa'];?>">Editar</a></td>
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
		<script type="text/javascript">
		  	$(document).ready(function(){
		    	$('#datatables-example').DataTable();
		    	$("#beneficiario").addClass("active");
		  	});
		</script>
		<?php
			//include(HTML_DIR."overall/footer.php");
		?>
	</body>
</html>