<?php
	Class User{
		private $db;
		private $user;
		private $nombre;
		private $perfil;
		private $pass;
		private $repeat;
		private $status;
		private $id;
		private $usuario;
		private $tipo;
		private $tamaño;
		public function __construct(){
			$this->db=new Conexion();
		}
		public function add($usuario){
			$this->pass=Encrypt($_POST['pass']);
			$this->repeat=Encrypt($_POST['repeat']);
			if($this->pass==$this->repeat){
				$this->user=$this->db->real_escape_string($_POST['user']);
				$this->user=trim($this->user);
				$this->nombre=$this->db->real_escape_string($_POST['nombre']);
				$this->nombre=trim(ucwords($this->nombre));
				$this->perfil=$this->db->real_escape_string($_POST['perfil']);
				$this->usuario=$usuario;
				$sql=$this->db->query("SELECT * FROM usuarios WHERE user='$this->user';");
				if($this->db->rows($sql)==0){
					$this->db->query("INSERT INTO usuarios(user, nombre, password, id_status, id_perfil) VALUES('$this->user', '$this->nombre', '$this->pass', 1, $this->perfil);");
					$carpeta=$_SERVER['DOCUMENT_ROOT'].'/mayorista_2017/asset/fotos/'.$this->user;
					if(!file_exists($carpeta)){
						mkdir($carpeta, 0777, true);
					}
					$indicesServer = array('REMOTE_ADDR',);
					$ip=$_SERVER['REMOTE_ADDR'];
					$evento="Agrego al usuario: ".$this->user." y con nombre: ".$this->nombre;
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'INSERT');");
					header("location: ?view=user&mode=add&success=true");
				}else{
					$this->db->liberar($sql);
					header("location: ?view=user&mode=add&error=3");
				}
			}else{
				header("location: ?view=user&mode=add&error=1");
			}
		}
		public function Edit($usuario){
			$this->id=intval($_GET['id']);
			$this->nombre=$this->db->real_escape_string($_POST['nombre']);
			$this->nombre=trim(ucwords($this->nombre));
			$this->perfil=$this->db->real_escape_string($_POST['perfil']);
			$this->status=$this->db->real_escape_string($_POST['status']);
			$this->usuario=$usuario;
			$this->db->query("UPDATE usuarios SET nombre='$this->nombre', id_status='$this->status', id_perfil='$this->perfil' WHERE id_usuario=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Actualizo el usuario con id: ".$this->id.", con nombre: ".$this->nombre.", el perfil: ".$this->perfil." y estatus: ".$this->status;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=user&mode=edit&id=".$this->id."&success=true");
		}
		public function adminPass($usuario){
			$this->id=intval($_GET['id']);
			$this->pass=Encrypt($_POST['pass']);
			$this->usuario=$usuario;
			$this->db->query("UPDATE usuarios SET password='$this->pass' WHERE id_usuario=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Actualizo el password del usuario: ".$this->usuario;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=user&mode=adminPass&id=".$this->id."&success=true");
		}
		public function changePass($usuario){
			$this->id=intval($_GET['id']);
			$this->pass=Encrypt($_POST['pass']);
			$this->usuario=$usuario;
			$this->db->query("UPDATE usuarios SET password='$this->pass' WHERE id_usuario=$this->id LIMIT 1;");
			$indicesServer = array('REMOTE_ADDR',);
			$ip=$_SERVER['REMOTE_ADDR'];
			$evento="Actualizo su password el usuario: ".$this->usuario;
			$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
			header("location: ?view=perfil&mode=miperfil&success=1");
		}
		public function subirFoto($usuario){
			$this->usuario=$usuario;
			$this->nombre=$_FILES['imagen']['name'];
			$this->tipo=$_FILES['imagen']['type'];
			$this->tamaño=$_FILES['imagen']['size'];
			if($this->tamaño<=1000000){
				if($this->tipo=="image/jpeg" || $this->tipo=="image/jpg" || $this->tipo=="image/png" || $this->tipo=="image/gif"){
					//Ruta de la carpeta destino en servidor
					$carpeta=$_SERVER['DOCUMENT_ROOT'].'/mayorista_2017/asset/fotos/'.$this->usuario.'/';
					$ruta="asset/fotos/".$this->usuario."/".$this->nombre;
					//Movemos la imagen del directorio temporal al directorio escogido
					move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$this->nombre);
					$this->db->query("UPDATE usuarios SET foto='$ruta' WHERE user='$this->usuario' LIMIT 1");
					$indicesServer = array('REMOTE_ADDR',);
					$ip=$_SERVER['REMOTE_ADDR'];
					$evento="Actualizo su foto el usuario: ".$this->usuario." foto: ".$ruta;
					$this->db->query("INSERT INTO registro_eventos(ip, usuario, evento, fecha, operacion) VALUES('$ip', '$this->usuario', '$evento', NOW(), 'UPDATE');");
					header("location: ?view=perfil&mode=miperfil&success=2");
				}else{
					header("location: ?view=perfil&mode=miperfil&error=3");
				}
			}else{
				header("location: ?view=perfil&mode=miperfil&error=4");
			}
		}
		public function __destruct(){
			$this->db->close();
		}
	}
?>