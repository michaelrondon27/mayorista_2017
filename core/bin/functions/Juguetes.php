<?php
	function Juguetes(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM juguetes;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_juguete[$data['id_juguete']]=$data;
			}
		}else{
			$_juguete=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_juguete;
	}
?>