<?php
	include(HTML_DIR."overall/header.php");
	include(HTML_DIR."overall/menu.php");
?>
<script src="views/app/js/juguete.js"></script>
<?php
	if(isset($_GET['success'])){
		if($_GET['success']==1){
			?>
				<script>
					swal(
						{title:'Juguete editado!',
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
						type:'warning',
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
							<a class="btn btn-danger" href="?view=config&mode=allJuguetes"><i class="fa fa-reply" aria-hidden="true"></i> Volver</a>
						</div>
		                <div class="row">
		                    <div class="col-sm-8 col-sm-offset-2" data-form-type="formoid">
		                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
		                            <h2 class="mbr-header__text">EDITAR JUGUETE</h2>
		                        </div>
		                        <p>Los campos con (*) son obligatorios.</p>
		                        <form id="juguetes" method="post" action="?view=config&mode=editJuguetes&id=<?php echo $_GET['id'];?>">
		                            <div class="form-group col-sm-2">
		                                *Juguete:
		                            </div>
		                            <div class="form-group col-sm-10">
		                            	<input type="text" class="form-control" name="juguete" id="juguete" value="<?php echo $_juguete[$_GET['id']]['juguete']?>">
									</div>
									<div class="form-group col-sm-2">
		                                *Precio:
		                            </div>
		                            <div class="form-group col-sm-10">
		                            	<input type="text" class="form-control" name="precio" id="precio" onkeypress="return solonumeros2(event)" value="<?php echo $_juguete[$_GET['id']]['precio']?>">
		                            	Ejemplo: 12345.67
									</div>
									<div class="form-group col-sm-2">
		                                Verifique el Precio:
		                            </div>
		                            <div class="form-group col-sm-10">
		                            	<input type="text" class="form-control" name="verifique" id="verifique" onkeypress="return deshabilitarteclas(event)" value="<?php echo $precio=number_format($_juguete[$_GET['id']]['precio'], 2, ',', '.')?>">
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