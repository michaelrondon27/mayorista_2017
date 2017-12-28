<?php
	function Almacenadoras(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM almacenadoras;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_almacenadora[$data['id_almacenadoras']]=$data;
			}
		}else{
			$_almacenadora=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_almacenadora;
	}
?>