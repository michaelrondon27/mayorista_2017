<?php
	include(HTML_DIR."overall/header.php");
	include(HTML_DIR."overall/menu.php");
?>
<script src="views/app/js/asignar.js"></script>
<?php
	if(isset($_GET['success'])){
		if($_GET['success']==1){
			?>
				<script>
					swal(
						{title:'Asignación agregada!',
						type:'success',
						confirmButtonText:'Aceptar'}
					);
				</script>
			<?php
		}
	}
	if(isset($_GET['error'])){
		if($_GET['error']==1){
			?>
				<script>
					swal(
						{title:'Debe llenar los campos indicados!',
						type:'success',
						confirmButtonText:'Aceptar'}
					);
				</script>
			<?php
		}else if($_GET['error']==2){
			?>
				<script>
					swal(
						{title:'El usuario seleccionado ya tiene la almacenadora asignada!',
						type:'success',
						confirmButtonText:'Aceptar'}
					);
				</script>
			<?php
		}
	}
?>
<body>
	<div class="container-fluid fondo">
		<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="form1-7" style="margin-left: 180px;">
   		    <div class="mbr-section__container mbr-section__container--std-padding container" style="padding-top: 93px; padding-bottom: 93px;">
		        <div class="row">
		            <div class="col-sm-12">
		            	<div class="col-md-2">
							<a class="btn btn-danger" href="?view=config&mode=allAsignar"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
						</div>
		                <div class="row">
		                	<div class="col-sm-8 col-sm-offset-2" data-form-type="formoid">
		                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
		                            <h2 class="mbr-header__text">Asignar Almacenadoras a Usuarios</h2>
		                        </div>
		                        <form id="asignar" method="post" action="?view=config&mode=addAsignar">
		                            <div class="form-group col-sm-2">
		                                Usuario:
		                            </div>
		                            <div class="form-group col-sm-10">
		                            	<select name="user" id="user" class="form-control">
		                            		<option value="">Seleccione</option>
		                            		<?php
			                            		foreach ($_users as $user) {
			                            			?>
			                            				<option value="<?php echo $user['id_usuario']?>"><?php echo $user['user']?></option>
			                            			<?php
			                            		}
			                            	?>
		                            	</select>
									</div>
									<div class="form-group col-sm-2">
		                                Almacenadora:
		                            </div>
		                            <div class="form-group col-sm-10">
		                            	<select name="almacenadora" id="almacenadora" class="form-control">	
		                            		<option value="">Seleccione</option>
		                            		<?php
			                            		foreach ($_almacenadora as $almacenadora) {
			                            			?>
			                            				<option value="<?php echo $almacenadora['id_almacenadoras']?>"><?php echo $almacenadora['nombre']?></option>
			                            			<?php
			                            		}
			                            	?>
		                            	</select>
									</div>
									<div class="form-group col-sm-12">
			                            <div class="mbr-buttons mbr-buttons--center"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-danger">GUARDAR <i class="fa fa-paper-plane" aria-hidden="true"></i></button></div>
									</div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
	</div>
	<?php
		include(HTML_DIR."overall/footer.php");
	?>
</body>
</html>