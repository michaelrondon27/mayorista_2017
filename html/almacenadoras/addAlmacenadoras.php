<?php
	include(HTML_DIR."overall/header.php");
	include(HTML_DIR."overall/menu.php");
?>
<script src="views/app/js/almacenadora.js"></script>
<?php
	if(isset($_GET['error'])){
		if($_GET['error']==1){
			?>
				<script>
					swal(
						{title:'Esta almacenadora ya se encuentra registrada en el sistema!',
						type:'warning',
						confirmButtonText:'Aceptar'}
					);
				</script>
			<?php
		}else if($_GET['error']==2){
			?>
				<script>
					swal(
						{title:'Debe llenar los campos indicados!',
						type:'error',
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
							<a class="btn btn-danger" href="?view=config&mode=allAlmacenadoras"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
						</div>
		                <div class="row">
		                    <div class="col-sm-8 col-sm-offset-2" data-form-type="formoid">
		                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
		                            <h2 class="mbr-header__text">REGISTRO DE ALMACENADORA</h2>
		                        </div>
		                        <p>Los campos con (*) son obligatorios.</p>
		                        <form id="almacenadora" method="post" action="?view=config&mode=addAlmacenadoras">
		                            <div class="form-group col-sm-1">
		                                *Nombre:
		                            </div>
		                            <div class="form-group col-sm-11">
		                            	<input type="text" class="form-control" name="nombre" id="nombre">
									</div>
									<div class="form-group col-sm-2">
		                                *Dirección: 
		                            </div>
		                            <div class="form-group col-sm-10">
		                            	<textarea class="form-control" rows="3" id="direccion" name="direccion"></textarea>
									</div>
									<div class="form-group col-sm-12">
									   	*Seleccione en cual reporte quiere que aparezca la almacenadora
									</div>
		                            <div class="checkbox form-group col-sm-12">
									    <label>
									      	<input type="radio" name="reporte" value="1"> Todos
									    </label>
									    <label>
									      	<input type="radio" name="reporte" value="2"> Mi Casa Bien Equipada
									    </label>
									    <label>
									      	<input type="radio" name="reporte" value="3"> Juguetes
									    </label>
									    <label>
									      	<input type="radio" name="reporte" value="4"> Ninguno
									    </label>
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