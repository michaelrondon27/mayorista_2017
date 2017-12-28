<?php
	//EL NUCLEO DE LA APLICACION
	session_start();
	#CONSTATNTES DE CONEXTION
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'mayorista_2017');
	#CONSTANTES DE LA APP
	define('HTML_DIR','html/');
	define('APP_TITLE','VENEZUELA PRODUCTIVA, C.A.');
	define('APP_NAME','SISTEMA DE FACTURACIÓN 2017');
	define('APP_COPY', 'Copyright &copy; '.date('Y',time()).' Desarrollado por Michael Rondón & Brandon Velasquez, VENEZUELA PRODUCTIVA, C.A.');
	define('APP_URL','http://localhost/mayorista_2017/');
	define('LOGO','asset/images/logovp.png');
	define('ICON','asset/images/logovp.png');

	#CONEXION
	require('core/models/classConexion.php');
	require('core/bin/functions/Encrypt.php');
	require('core/bin/functions/Users.php');
	$_users=Users();
	#GLOBALES
	if(isset($_SESSION['app_id'])){
		require('core/bin/functions/Status.php');
		require('core/bin/functions/Perfiles.php');
		require('core/bin/functions/codTlf.php');
		require('core/bin/functions/Beneficiarios.php');
		require('core/bin/functions/Modelos.php');
		require('core/bin/functions/Productos.php');
		require('core/bin/functions/Almacenadoras.php');
		require('core/bin/functions/Juguetes.php');
		require('core/bin/functions/Existencia3erCronograma.php');
		require('core/bin/functions/Existencia4toCronograma.php');
		require('core/bin/functions/Cotizacion4toCronograma.php');
		require('core/bin/functions/Cotizacion3erCronograma.php');
		/*require('core/bin/functions/NroOrden4toCronograma.php');
		require('core/bin/functions/NroOrden3erCronograma.php');*/
		//require('core/bin/functions/Asignar.php');
		$_status=Status();	
		$_perfil=Perfiles();
		$_cod_tlf=codTlf();
		$_beneficiario=Beneficiario();
		$_modelo=Modelos();
		$_producto=Productos();
		$_almacenadora=Almacenadoras();
		$_juguete=Juguetes();
		$_existencia3erCronograma=Existencia3erCronograma();
		$_existencia4toCronograma=Existencia4toCronograma();
		$_cotizacion4tocronograma=Cotizacion4toCronograma();
		$_cotizacion3ercronograma=Cotizacion3erCronograma();
		/*$_nroOrden4toCronograma=NroOrden4toCronograma();
		$_nroOrden3erCronograma=NroOrden3erCronograma();*/
		//$_asignar=Asignar();
	}
?>