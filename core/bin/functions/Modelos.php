<?php
	function Modelos(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM modelo;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_modelo[$data['id_modelo']]=$data;
			}
		}else{
			$_modelo=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_modelo;
	}
?>