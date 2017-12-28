<?php
	function Existencia4toCronograma(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM existencia_cronograma WHERE cronograma=2;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_existencia4toCronograma[$data['id_existencia']]=$data;
			}
		}else{
			$_existencia4toCronograma=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_existencia4toCronograma;
	}
?>