<?php
	function Existencia3erCronograma(){
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM existencia_cronograma WHERE cronograma=1;");
		if($db->rows($sql)>0){
			while($data=$db->recorrer($sql)){
				$_existencia3erCronograma[$data['id_existencia']]=$data;
			}
		}else{
			$_existencia3erCronograma=false;
		}
		$db->liberar($sql);
		$db->close();
		return $_existencia3erCronograma;
	}
?>