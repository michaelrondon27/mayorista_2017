<?php
	if(isset($_SESSION['app_id'])){
		$isset_id=isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id']>=1;
		require('core/models/classJuguetes.php');
		$juguetes=new Juguetes();
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){
			case 'addCotizacion':
				if($_POST){
					$db=new Conexion();
					if(!empty($_POST['cotizacion']) && !empty($_POST['fecha']) && !empty($_POST['empresa']) && !empty($_POST['total'])){
						$cotizacion=$_POST['cotizacion'];
						$empresa=$_POST['empresa'];
						$total=$_POST['total'];
						$productos=$_POST['productos'];
						$descuento=$_POST['descuento'];
						$subtotal_num=$_POST['subtotal_num'];
						$subtot=$_POST['subtot'];
						$descuento2=$_POST['descuento2'];
						$uni=$_POST['uni_total'];
						if($_POST['desc_num']!=""){
							$desc_num=$_POST['desc_num'];
						}else{
							$desc_num=0;
						}
						$total_num=$_POST['total_num'];
						$fecha=date("Y-m-d", strtotime($_POST['fecha']));
						$sql=$db->query("SELECT * FROM cotizacion_juguetes WHERE cotizacion='$cotizacion';");
						if($db->rows($sql)==0){
							$sql1=$db->query("INSERT INTO cotizacion_juguetes(cotizacion, id_empresa, total, fecha, desc_porcentaje, subtotal_num, subtotal, descuento, descuento_num, total_num, registro, unidades_total) VALUES('$cotizacion', $empresa, '$total', '$fecha', '$descuento', $subtotal_num, '$subtot', '$descuento2', $desc_num, $total_num, NOW(), $uni);");
							$indicesServer = array('REMOTE_ADDR',);
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$ip=$_SERVER['REMOTE_ADDR'];
							$evento="Inserto la cotizacion de juguetes: ".$cotizacion.", con fecha: ".$fecha." y el id del beneficiario: ".$empresa;
							$sql6=$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario', '$evento', NOW(), 'INSERT');");
							$sql2=$db->query("SELECT id_cotizacion FROM cotizacion_juguetes WHERE cotizacion='$cotizacion';");
							$data=$db->recorrer($sql2);
							for($x=1;$x<=$productos;$x++){
								if(isset($_POST['cant'.$x])){
									$alma=$_POST['alma'.$x];
									$prod=$_POST['prod'.$x];
									$cant=$_POST['cant'.$x];
									$precio=$_POST['subtotal'.$x];
									$precio_num=$_POST['sub'.$x];
									$sql3=$db->query("INSERT INTO ordenes_juguetes(id_cotizacion, cantidad, precio_total, precio_num, id_almacenadora, id_producto) VALUES($data[0], $cant, '$precio', $precio_num, $alma, $prod);");
									$sql4=$db->query("UPDATE existencia_juguetes SET unidades=unidades-$cant WHERE id_producto=$prod AND id_almacenadora=$alma;");
									$indicesServer = array('REMOTE_ADDR',);
									$ip=$_SERVER['REMOTE_ADDR'];
									$evento="Inserto el producto: ".$prod.", de la almacenadora: ".$alma." y la cantidad de ".$cant." unidades a la cotizacion de juguetes ".$data[0];
									$sql6=$db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$usuario', '$evento', NOW(), 'INSERT');");
											}
							}
							header("location: ?view=Juguetes&mode=addCotizacion&success=true");
						}else{
							header("location: ?view=Juguetes&mode=addCotizacion&error=2");
						}
					}else{
						header("location: ?view=Juguetes&mode=addCotizacion&error=1");
					}
				}else{
					include(HTML_DIR.'Juguetes/addCotizacion.php');
				}
				break;
			case 'addProducto':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					if($_POST){
						if(!empty($_POST['alma1']) && !empty($_POST['prod1']) && !empty($_POST['cant1'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$juguetes->AddProducto($usuario);
						}else{
							header("location: ?view=Juguetes&mode=addProducto&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'Juguetes/addProducto.php');
					}
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'addDescuento':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					if($_POST){
						$usuario=$_users[$_SESSION['app_id']]['user'];
						$juguetes->AddDescuento($usuario);
					}else{
						include(HTML_DIR.'Juguetes/addDescuento.php');
					}
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'editCotizacion':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					if($_POST){
						if(!empty($_POST['cotizacion']) && !empty($_POST['fecha']) && !empty($_POST['empresa'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$juguetes->EditCotizacion($usuario);
						}else{
							header("location: ?view=Juguetes&mode=editCotizacion&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'Juguetes/editCotizacion.php');
					}
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'editProducto':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					if($_POST){
						if(!empty($_POST['alma1']) && !empty($_POST['prod1']) && !empty($_POST['cant1'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$juguetes->EditProducto($usuario);
						}else{
							header("location: ?view=Juguetes&mode=editCotizacion&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'Juguetes/editProducto.php');
					}
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'deleteCotizacion':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					$usuario=$_users[$_SESSION['app_id']]['user'];
					$juguetes->DeleteCotizacion($usuario);
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'deleteProducto':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					$usuario=$_users[$_SESSION['app_id']]['user'];
					$juguetes->DeleteProducto($usuario);
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'verCotizacion':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					include(HTML_DIR.'Juguetes/verCotizacion.php');
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'pdfCotizacion':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					include(HTML_DIR.'Juguetes/pdfCotizacion.php');
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'pdfFactura':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacion3er)){
					if($_POST){
						if(!empty($_POST['fecha'])){
							include(HTML_DIR.'Juguetes/pdfFactura.php');
						}else{
							header("location: ?view=Juguetes&mode=factura&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'Juguetes/factura.php');
					}
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'excelCotizacion':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					include(HTML_DIR.'Juguetes/excelCotizacion.php');
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'addOrden':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					if($_POST){
						if(!empty($_POST['orden']) && !empty($_POST['pago1'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$juguetes->AddOrden($usuario);
						}else{
							header("location: ?view=Juguetes&mode=addOrden&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'Juguetes/addOrden.php');
					}
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'editOrden':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					if($_POST){
						if(!empty($_POST['orden'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$juguetes->EditOrden($usuario);
						}else{
							header("location: ?view=Juguetes&mode=editOrden&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'Juguetes/editOrden.php');
					}
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'addPago':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					if($_POST){
						if(!empty($_POST['pago'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$juguetes->AddPago($usuario);
						}else{
							header("location: ?view=Juguetes&mode=editOrden&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'Juguetes/editOrden.php');
					}
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'deletePago':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacionJuguetes)){
					$usuario=$_users[$_SESSION['app_id']]['user'];
					$juguetes->DeletePago($usuario);
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			case 'estadoFinanciero':
				if($_POST){
					if(!empty($_POST['desde']) && !empty($_POST['hasta'])){
						include(HTML_DIR.'Juguetes/pdfFinanciero.php');
					}else{
						header('location: ?view=Juguetes&mode=estadoFinanciero&error=1');
					}					
				}else{
					include(HTML_DIR.'Juguetes/estadoFinanciero.php');
				}
				break;
			case 'estadoCotizaciones':
				if($_POST){
					if(!empty($_POST['desde']) && !empty($_POST['hasta'])){
						if($_GET['tipo']=='pdf'){
							include(HTML_DIR.'Juguetes/pdfCotizacionesMensual.php');
						}else if($_GET['tipo']=='excel'){
							include(HTML_DIR.'Juguetes/excelCotizacionesMensual.php');
						}
					}else{
						header('location: ?view=Juguetes&mode=estadoCotizaciones&error=1');
					}					
				}else{
					include(HTML_DIR.'Juguetes/estadoCotizaciones.php');
				}
				break;
			case 'factura':
				if($isset_id AND array_key_exists($_GET['id'], $_cotizacion3er)){
					include(HTML_DIR.'Juguetes/factura.php');
				}else{
					header('location: ?view=Juguetes');
				}
				break;
			default:
				include(HTML_DIR.'Juguetes/allCotizacion.php');
				break;
		}
	}else{
		header('location: ?view=index');
	}
?>