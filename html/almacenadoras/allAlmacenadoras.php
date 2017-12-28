<?php
	include(HTML_DIR."overall/header.php");
	include(HTML_DIR."overall/menu.php");
	if(isset($_GET['success'])){
		if($_GET['success']==1){
			?>
				<script>
					swal(
						{title:'Almacenadora guardada!',
						type:'success',
						confirmButtonText:'Aceptar'}
					);
				</script>
			<?php
		}
	}
?>
<body class="fondo">
	<div class="container-fluid" style="margin-left: 170px; padding-top: 50px;">
		<br>
		<div class="mbr-header mbr-header--center mbr-header--std-padding">
		    <h2 class="mbr-header__text">Almacenadoras</h2>
		</div>
		<?php 
			if($_users[$_SESSION['app_id']]['id_perfil']<=2){
				?>
					<div class="col-md-2">
						<a class="btn btn-danger" href="?view=config&mode=addAlmacenadoras">Agregar Almacenadora <i class="fa fa-sign-in" aria-hidden="true"></i></a>
					</div>
					<br><br>
				<?php
			}
		?>
		<table id="tabla" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>N</th>
					<th>Almacenadora</th>
					<th>Dirección</th>
					<th>Reporte</th>
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
					if($_almacenadora>0){
						foreach ($_almacenadora as $almacenadoras) {
							?>
								<tr>
									<td><?php echo $contador;?></td>
									<td><?php echo $almacenadoras['nombre'];?></td>
									<td><?php echo $almacenadoras['direccion'];?></td>
									<td>
										<?php
											if($almacenadoras['reporte']==1){
												?>
													Todos
												<?php
											}else if($almacenadoras['reporte']==2){
												?>
													3er y 4to Cronograma
												<?php
											}else if($almacenadoras['reporte']==3){
												?>
													Juguetes
												<?php
											}else if($almacenadoras['reporte']==4){
												?>
													Ninguno
												<?php
											}
										?>
									</td>
									<?php
										if($_users[$_SESSION['app_id']]['id_perfil']==1){
											?>
												<td><a href="?view=config&mode=editAlmacenadoras&id=<?php echo $almacenadoras['id_almacenadoras'];?>">Editar <i class="fa fa-pencil-square-o azul" aria-hidden="true"></i></a></td>
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
	<script>
		$(document).ready(function(){
			$("#tabla").DataTable();
		});
	</script>
	<br><br>
	<?php
		include(HTML_DIR."overall/footer.php");
	?>
</body>
</html>