<?php
	function DespachoCronograma(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM despacho_cronograma;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_despachocronograma[$data['id_cotizacion']]=$data;
			}
		}else{
			$_despachocronograma=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_despachocronograma;
	}
?>