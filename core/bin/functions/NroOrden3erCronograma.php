<?php
	function NroOrden3erCronograma(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM nro_orden_3ercronograma;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_nroOrden3erCronograma[$data['id_cotizacion']]=$data;
			}
		}else{
			$_nroOrden3erCronograma=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_nroOrden3erCronograma;
	}
?>