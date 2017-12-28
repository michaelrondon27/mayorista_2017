<?php
	if(isset($_SESSION['app_id']) AND ($_users[$_SESSION['app_id']]['id_perfil']==1 || $_users[$_SESSION['app_id']]['id_perfil']==2)){
		$isset_id=isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id']>=1;
		require('core/models/classInventario.php');
		$inventario=new Inventario();
		switch (isset($_GET['mode']) ? $_GET['mode'] : null){
			case 'allInventario3erCronograma':
				include(HTML_DIR.'inventario/allInventario3erCronograma.php');
				break;
			case 'allInventario3erGlobal':
				include(HTML_DIR.'inventario/allInventario3erGlobal.php');
				break;
			case 'allInventario4toCronograma':
				include(HTML_DIR.'inventario/allInventario4toCronograma.php');
				break;
			case 'allInventario4toGlobal':
				include(HTML_DIR.'inventario/allInventario4toGlobal.php');
				break;
			case 'allInventarioJuguetes':
				include(HTML_DIR.'inventario/allInventarioJuguetes.php');
				break;
			case 'addInventarioCronograma':
				if($_POST){
					if(!empty($_POST['almacenadora']) && !empty($_POST['producto']) && !empty($_POST['modelo']) && !empty($_POST['cantidad']) && !empty($_POST['cronograma'])){
						$usuario=$_users[$_SESSION['app_id']]['user'];
						$inventario->AddInventario($usuario);
					}else{
						header('location: ?view=inventario&mode=addInventarioCronograma&error=1');
					}
				}else{
					include(HTML_DIR.'inventario/addInventarioCronograma.php');
				}
				break;
			case 'allInventarioGlobal':
				include(HTML_DIR.'inventario/allInventarioGlobal.php');
				break;
			case 'añadirCantidad':
				if($_POST){

				}else{
					include(HTML_DIR.'inventario/addCantidad.php');
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