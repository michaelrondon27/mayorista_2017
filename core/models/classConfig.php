<?php
	class Config{
		private $db;
		private $nombre;
		private $direccion;
		private $reporte;
		private $id;
		private $producto;
		private $juguete;
		private $precio;
		private $modelo;
		private $usuario;
		private $user;
		private $almacenadora;
		private $cronograma;
		public function __construct(){
			$this->db=new Conexion();
		}
		public function AddAlmacenadora($usuario){
			$this->nombre=$this->db->real_escape_string($_POST['nombre']);
			$this->nombre=trim(ucwords($this->nombre));
			$this->direccion=$this->db->real_escape_string($_POST['direccion']);
			$this->direccion=trim(ucwords($this->direccion));
			$this->reporte=$this->db->real_escape_string($_POST['reporte']);
			$this->usuario=$usuario;
			$sql=$this->db->query("SELECT * FROM almacenadoras WHERE nombre='$this->nombre' LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->liberar($sql);
				$this->db->query("INSERT INTO almacenadoras(nombre, direccion, reporte) VALUES('$this->nombre', '$this->direccion', $this->reporte);");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Inserto la Almacenadora: ".$this->nombre;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header("location: ?view=config&mode=allAlmacenadoras&success=1");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=addAlmacenadoras&error=1");
			}
		}
		public function EditAlmacenadora($usuario){
			$this->id=intval($_GET['id']);
			$this->nombre=$this->db->real_escape_string($_POST['nombre']);
			$this->nombre=trim(ucwords($this->nombre));
			$this->direccion=$this->db->real_escape_string($_POST['direccion']);
			$this->direccion=trim(ucwords($this->direccion));
			$this->reporte=$this->db->real_escape_string($_POST['reporte']);
			$this->usuario=$usuario;
			$this->db->query("UPDATE almacenadoras SET nombre='$this->nombre', direccion='$this->direccion', reporte=$this->reporte WHERE id_almacenadoras=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Actualizo la Almacenadora: ".$this->nombre;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=config&mode=editAlmacenadoras&id=".$this->id."&success=1");
		}
		public function AddProducto($usuario){
			$this->producto=$this->db->real_escape_string($_POST['producto']);
			$this->producto=trim(strtolower($this->producto));
			$this->producto=ucwords($this->producto);
			$this->usuario=$usuario;
			$sql=$this->db->query("SELECT * FROM producto WHERE producto='$this->producto' LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->liberar($sql);
				$this->db->query("INSERT INTO producto(producto) VALUES('$this->producto');");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Inserto el producto: ".$this->producto;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header("location: ?view=config&mode=allProductos&success=1");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=addProductos&error=1");
			}
		}
		public function EditProducto($usuario){
			$this->id=intval($_GET['id']);
			$this->producto=$this->db->real_escape_string($_POST['producto']);
			$this->producto=trim(ucwords($this->producto));
			$this->usuario=$usuario;
			$this->db->query("UPDATE producto SET producto='$this->producto' WHERE id_producto=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Actualizo el producto: ".$this->producto;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=config&mode=editProductos&id=".$this->id."&success=1");
		}
		public function AddJuguete($usuario){
			$this->juguete=$this->db->real_escape_string($_POST['juguete']);
			$this->juguete=trim(ucwords($this->juguete));
			$this->precio=$this->db->real_escape_string($_POST['precio']);
			$this->precio=number_format($this->precio, 2, '.', '');
			$this->usuario=$usuario;
			$sql=$this->db->query("SELECT * FROM juguetes WHERE juguete='$this->juguete' LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->liberar($sql);
				$this->db->query("INSERT INTO juguetes(juguete, precio) VALUES('$this->juguete', $this->precio);");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Inserto el juguete: ".$this->juguete;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header("location: ?view=config&mode=allJuguetes&success=1");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=addJuguetes&error=1");
			}
		}
		public function EditJuguete($usuario){
			$this->id=intval($_GET['id']);
			$this->juguete=$this->db->real_escape_string($_POST['juguete']);
			$this->juguete=trim(ucwords($this->juguete));
			$this->precio=$this->db->real_escape_string($_POST['precio']);
			$this->precio=number_format($this->precio, 2, '.', '');
			$this->usuario=$usuario;
			$this->db->query("UPDATE juguetes SET juguete='$this->juguete', precio='$this->precio' WHERE id_juguete=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Actualizo el juguete: ".$this->producto;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=config&mode=editJuguetes&id=".$this->id."&success=1");
		}
		public function AddModelo($usuario){
			$this->modelo=$this->db->real_escape_string($_POST['modelo']);
			$this->modelo=trim(strtoupper($this->modelo));
			$this->precio=$this->db->real_escape_string($_POST['precio']);
			$this->precio=number_format($this->precio, 2, '.', '');
			$this->producto=$this->db->real_escape_string($_POST['producto']);
			$this->usuario=$usuario;
			$this->cronograma=$this->db->real_escape_string($_POST['cronograma']);
			$sql=$this->db->query("SELECT * FROM modelo WHERE modelo='$this->modelo' AND cronograma=$this->cronograma LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->liberar($sql);
				$this->db->query("INSERT INTO modelo(modelo, precio, id_producto, cronograma) VALUES('$this->modelo', $this->precio, $this->producto, $this->cronograma);");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="Inserto el modelo: ".$this->modelo;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header("location: ?view=config&mode=allModelos&success=1");
			}else{
				$this->db->liberar($sql);
				header("location: ?view=config&mode=addModelo&error=1");
			}
		}
		public function EditModelo($usuario){
			$this->id=intval($_GET['id']);
			$this->modelo=$this->db->real_escape_string($_POST['modelo']);
			$this->modelo=trim(strtoupper($this->modelo));
			$this->precio=$this->db->real_escape_string($_POST['precio']);
			$this->precio=number_format($this->precio, 2, '.', '');
			$this->producto=$this->db->real_escape_string($_POST['producto']);
			$this->usuario=$usuario;
			$this->cronograma=$this->db->real_escape_string($_POST['cronograma']);
			$this->db->query("UPDATE modelo SET modelo='$this->modelo', precio=$this->precio, id_producto=$this->producto, cronograma=$this->cronograma WHERE id_modelo=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Actualizo el modelo: ".$this->modelo;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
			header("location: ?view=config&mode=editModelo&id=".$this->id."&success=1");
		}
		public function AddAsignar($usuario){
			$this->almacenadora=$this->db->real_escape_string($_POST['almacenadora']);
			$this->user=$this->db->real_escape_string($_POST['user']);
			$this->usuario=$usuario;
			$sql=$this->db->query("SELECT * FROM asignar_almacenadora WHERE id_usuario=$this->user AND id_almacenadora=$this->almacenadora LIMIT 1;");
			if($this->db->rows($sql)==0){
				$this->db->query("INSERT INTO asignar_almacenadora(id_usuario, id_almacenadora) VALUES($this->user, $this->almacenadora);");
				$indicesServer = array('REMOTE_ADDR',);
				$ip=$_SERVER['REMOTE_ADDR'];
				$evento="asigno la almacenadora: ".$this->almacenadora." al usuario ".$this->user;
				$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
				header("location: ?view=config&mode=addAsignar&success=1");
			}else{
				header("location: ?view=config&mode=addAsignar&error=2");
			}
		}
		public function DeleteAsignar($usuario){
			$this->id=intval($_GET['id']);
			$this->usuario=$usuario;
			$this->db->query("DELETE FROM asignar_almacenadora WHERE id_asignar=$this->id;");
			header("location: ?view=config&mode=allAsignar&success=1;");
		}
		public function __destruct(){
			$this->db->close();
		}
	}
?>