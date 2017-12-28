<?php
	function Cotizacion4toCronograma(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM cotizacion_4tocronograma;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_cotizacion4tocronograma[$data['id_cotizacion']]=$data;
			}
		}else{
			$_cotizacion4tocronograma=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_cotizacion4tocronograma;
	}
?>