<?php
	class Inventario{
		private $almacenadora;
		private $producto;
		private $modelo;
		private $cantidad;
		private $db;
		private $cronograma;
		private $usuario;
		public function __construct(){
			$this->db=new Conexion();
		}
		public function AddInventario($usuario){
			$this->almacenadora=$this->db->real_escape_string($_POST['almacenadora']);
			$this->producto=$this->db->real_escape_string($_POST['producto']);
			$this->modelo=$this->db->real_escape_string($_POST['modelo']);
			$this->cantidad=$this->db->real_escape_string($_POST['cantidad']);
			$this->cronograma=$this->db->real_escape_string($_POST['cronograma']);
			$this->usuario=$usuario;
			$sql=$this->db->query("SELECT * FROM existencia_cronograma WHERE id_almacenadora=$this->almacenadora AND id_modelo=$this->modelo AND cronograma=$this->cronograma LIMIT 1;");
			if($this->db->rows($sql)>0){
				$this->db->query("UPDATE existencia_cronograma SET unidades=unidades+$this->cantidad WHERE id_almacenadora=$this->almacenadora AND id_modelo=$this->modelo LIMIT 1;");
				//$this->db->query("UPDATE modelo SET unidades=unidades+$this->cantidad WHERE id_modelo=$this->modelo LIMIT 1;");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego la cantidad de: ".$this->cantidad." unidades al modelo: ".$this->modelo." y a la almacenadora: "-$this->almacenadora;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header("location: ?view=inventario&mode=addInventarioCronograma&success=1");
			}else{
				$this->db->query("INSERT INTO existencia_cronograma(id_almacenadora, id_modelo, unidades, id_producto, cronograma) VALUES($this->almacenadora, $this->modelo, $this->cantidad, $this->producto, $this->cronograma);");
				//$this->db->query("UPDATE modelo SET unidades=unidades+$this->cantidad WHERE id_modelo=$this->modelo LIMIT 1;");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Agrego la cantidad de: ".$this->cantidad." unidades al modelo: ".$this->modelo." y a la almacenadora: "-$this->almacenadora;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header("location: ?view=inventario&mode=addInventarioCronograma&success=1");
			}
		}
		public function __destruct(){
			$this->db->close();
		}
	}
?>