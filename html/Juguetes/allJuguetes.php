<?php
	include(HTML_DIR."overall/header.php");
	include(HTML_DIR."overall/menu.php");
	if(isset($_GET['success'])){
		if($_GET['success']==1){
			?>
				<script>
					swal(
						{title:'Juguete guardado!',
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
		    <h2 class="mbr-header__text">Juguetes</h2>
		</div>
		<?php 
			if($_users[$_SESSION['app_id']]['id_perfil']<=2){
				?>
					<div class="col-md-2">
						<a class="btn btn-danger" href="?view=config&mode=addJuguetes">Agregar Juguetes <i class="fa fa-sign-in" aria-hidden="true"></i></a>
					</div>
					<br><br>
				<?php
			}
		?>
		<table id="tabla" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>N</th>
					<th>Juguete</th>
					<th>Precio</th>
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
					if($_juguete>0){
						foreach ($_juguete as $juguetes) {
							?>
								<tr>
									<td><?php echo $contador;?></td>
									<td><?php echo $juguetes['juguete'];?></td>
									<td><?php echo $precio=number_format($juguetes['precio'], 2, ",", ".")." Bs.";?></td>
									<?php
										if($_users[$_SESSION['app_id']]['id_perfil']==1){
											?>
												<td><a href="?view=config&mode=editJuguetes&id=<?php echo $juguetes['id_juguete'];?>">Editar <i class="fa fa-pencil-square-o azul" aria-hidden="true"></i></a></td>
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