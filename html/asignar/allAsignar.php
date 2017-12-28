<?php
	include(HTML_DIR."overall/header.php");
	include(HTML_DIR."overall/menu.php");
	if(isset($_GET['success'])){
		if($_GET['success']==1){
			?>
				<script>
					swal(
						{title:'Asignación eliminada!',
						type:'success',
						confirmButtonText:'Aceptar'}
					);
				</script>
			<?php
		}
	}
?>
<body>
	<div class="container-fluid" style="margin-left: 170px; padding-top: 50px;">
		<div class="mbr-header mbr-header--center mbr-header--std-padding">
		    <h2 class="mbr-header__text">Almacenadoras Asignadas</h2>
		</div>
		<?php 
			if($_users[$_SESSION['app_id']]['id_perfil']==1){
				?>
					<div class="col-md-2">
						<a class="btn btn-danger" href="?view=config&mode=addAsignar">Asignar Almacenadora <i class="fa fa-sign-in" aria-hidden="true"></i></a>
					</div>
					<br><br>
				<?php
			}
		?>
		<table id="tabla" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>N</th>
					<th>Usuario</th>
					<th>Almacenadora</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$contador=1;
					if($_asignar>0){
						foreach ($_asignar as $asignar) {
							?>
								<tr>
									<td><?php echo $contador;?></td>
									<td><?php echo $_users[$asignar['id_usuario']]['user'];?></td>
									<td><?php echo $_almacenadora[$asignar['id_almacenadora']]['nombre'];?></td>
									<td>
										<a onclick="DeleteItem('¿Está seguro de eliminar esta cotización?','?view=config&mode=deleteAsignar&id=<?php echo $asignar['id_asignar']?>')">Eliminar <i class="fa fa-times rojo" aria-hidden="true"></i></a>
									</td>
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