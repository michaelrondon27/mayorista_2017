<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'mayorista_2017');
	require('../models/classConexion.php');
	require('../models/classBuscar.php');
	$buscar=new Buscar();
	$valor=$_POST['valor'];
	switch ($valor) {
		case 1:
			$buscar->modeloCronograma();
			break;
		case 2:
			$buscar->disponibleCronograma();
			break;
		case 3:
			$buscar->modeloInventario();
			break;
	}
?>