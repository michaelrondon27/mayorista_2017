<?php
	if(isset($_SESSION['app_id']) AND ($_users[$_SESSION['app_id']]['id_perfil']==1 || $_users[$_SESSION['app_id']]['id_perfil']==2)){
		$isset_id=isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id']>=1;
		require('core/models/classConfig.php');
		$config=new Config();
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){
			case 'allAlmacenadoras':
				include(HTML_DIR.'almacenadoras/allAlmacenadoras.php');
				break;
			case 'addAlmacenadoras':
				if($_POST){
					if(!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['reporte'])){
						$usuario=$_users[$_SESSION['app_id']]['user'];
						$config->AddAlmacenadora($usuario);
					}else{
						header("location: ?view=config&mode=addAlmacenadoras&error=2");
					}
				}else{
					include(HTML_DIR.'almacenadoras/addAlmacenadoras.php');
				}
				break;
			case 'editAlmacenadoras':
				if($isset_id AND array_key_exists($_GET['id'], $_almacenadora)){
					if($_POST){
						if(!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['reporte'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$config->EditAlmacenadora($usuario);
						}else{
							header("location: ?view=config&mode=editAlmacenadoras&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'almacenadoras/editAlmacenadoras.php');
					}
				}else{
					header('location: ?view=config&mode=allAlmacenadoras');
				}
				break;
			case 'allProductos':
				include(HTML_DIR.'productos/allProductos.php');
				break;
			case 'addProductos':
				if($_POST){
					if(!empty($_POST['producto'])){
						$usuario=$_users[$_SESSION['app_id']]['user'];
						$config->AddProducto($usuario);
					}else{
						header("location: ?view=config&mode=addProductos&error=2");
					}
				}else{
					include(HTML_DIR.'productos/addProductos.php');
				}
				break;
			case 'editProductos':
				if($isset_id AND array_key_exists($_GET['id'], $_producto)){
					if($_POST){
						if(!empty($_POST['producto'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$config->EditProducto($usuario);
						}else{
							header("location: ?view=config&mode=editProductos&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'productos/editProductos.php');
					}
				}else{
					header('location: ?view=config&mode=allProductos');
				}
				break;
			case 'allJuguetes':
				include(HTML_DIR.'Juguetes/allJuguetes.php');
				break;
			case 'addJuguetes':
				if($_POST){
					if(!empty($_POST['juguete']) && !empty($_POST['precio'])){
						$usuario=$_users[$_SESSION['app_id']]['user'];
						$config->AddJuguete($usuario);
					}else{
						header("location: ?view=config&mode=addJuguetes&error=2");
					}
				}else{
					include(HTML_DIR.'Juguetes/addJuguetes.php');
				}
				break;
			case 'editJuguetes':
				if($isset_id AND array_key_exists($_GET['id'], $_juguete)){
					if($_POST){
						if(!empty($_POST['juguete']) && !empty($_POST['precio'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$config->EditJuguete($usuario);
						}else{
							header("location: ?view=config&mode=editJuguetes&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'Juguetes/editJuguetes.php');
					}
				}else{
					header('location: ?view=config&mode=allJuguetes');
				}
				break;
			case 'allModelos':
				include(HTML_DIR.'modelos/allModelos.php');
				break;
			case 'addModelo':
				if($_POST){
					/*if(!empty($_POST['modelo']) && !empty($_POST['precio']) && !empty($_POST['producto'])){
						$usuario=$_users[$_SESSION['app_id']]['user'];
						$config->AddModelo($usuario);
					}else{
						header("location: ?view=config&mode=addModelo&error=2");
					}*/
					echo ($_POST['precio']);
					echo number_format($_POST['precio'], 2, '.', '');
				}else{
					include(HTML_DIR.'modelos/addModelo.php');
				}
				break;
			case 'editModelo':
				if($isset_id AND array_key_exists($_GET['id'], $_modelo)){
					if($_POST){
						if(!empty($_POST['modelo']) && !empty($_POST['precio']) && !empty($_POST['producto'])){
							$usuario=$_users[$_SESSION['app_id']]['user'];
							$config->EditModelo($usuario);
						}else{
							header("location: ?view=config&mode=editModelo&id=".$_GET['id']."&error=1");
						}
					}else{
						include(HTML_DIR.'modelos/editModelo.php');
					}
				}else{
					header('location: ?view=config&mode=allModelos');
				}
				break;
			case 'allAsignar':
				include(HTML_DIR.'asignar/allAsignar.php');
				break;
			case 'addAsignar':
				if($_POST){
					if(!empty($_POST['user']) && !empty($_POST['almacenadora'])){
						$usuario=$_users[$_SESSION['app_id']]['user'];
						$config->AddAsignar($usuario);
					}else{
						header("location: ?view=config&mode=addAsignar&error=1");
					}
				}else{
					include(HTML_DIR.'asignar/addAsignar.php');
				}
				break;
			case 'deleteAsignar':
				if($isset_id AND array_key_exists($_GET['id'], $_asignar)){
					$usuario=$_users[$_SESSION['app_id']]['user'];
					$config->DeleteAsignar($usuario);
				}else{
					header('location: ?view=config&mode=allAsignar');
				}
				break;
			default:
				header('location: ?view=index');
				break;
		}
	}else{
		header('location: ?view=index');
	}
?>