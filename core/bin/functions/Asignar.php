<?php
	function Asignar(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM asignar_almacenadora;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_asignar[$data['id_asignar']]=$data;
			}
		}else{
			$_asignar=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_asignar;
	}
?>