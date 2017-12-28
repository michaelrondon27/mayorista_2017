<?php
	function Productos(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM producto;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_producto[$data['id_producto']]=$data;
			}
		}else{
			$_producto=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_producto;
	}
?>