<?php
	function NroOrden4toCronograma(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM nro_orden_4tocronograma;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_nroOrden4toCronograma[$data['id_cotizacion']]=$data;
			}
		}else{
			$_nroOrden4toCronograma=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_nroOrden4toCronograma;
	}
?>