<?php
	function Cotizacion3erCronograma(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM cotizacion_3ercronograma;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_cotizacion3ercronograma[$data['id_cotizacion']]=$data;
			}
		}else{
			$_cotizacion3ercronograma=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_cotizacion3ercronograma;
	}
?>