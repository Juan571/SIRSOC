<?php
    //require_once dirname(__FILE__).'/../clases_generales/Sql.php';
    //include_once dirname(__FILE__).'/../clases_generales/ClaseAuditoria.php';
    require_once (dirname(__FILE__)."(/../config.php");

	class Sesion {
		public $id_usuario = NULL;
		public $login = NULL;
		public $cedula_usuario = NULL;
		public $nombre_usuario = NULL;
		public $apellido_usuario = NULL;
		public $tipo_usuario = NULL;
		public $id_sistema = 0;
		public $codigo_sistema = NULL;
		public $estado_usuario = NULL;
		public $menu_usuario = NULL;
		private $aaa = NULL;
		
		function __construct() {
			if (!isset($_SESSION))
				session_start();
			
			if($this->sesion_iniciada()==true) {
				$this->setId_Sistema($_SESSION["id_sistema"]);
				$this->setCodigo_Sistema($_SESSION["codigo_sistema"]);
				$this->setId_usuario($_SESSION["id_usuario"]);
				$this->setLogin($_SESSION["login"]);
				$this->setCedula_usuario($_SESSION["cedula_usuario"]);
				$this->setNombre_usuario($_SESSION["nombre_usuario"]);
				$this->setApellido_usuario($_SESSION["apellido_usuario"]);
				$this->setTipo_usuario($_SESSION["tipo_usuario"]);
				$this->setEstado_usuario($_SESSION["estado_usuario"]);
				$this->setMenu_usuario($_SESSION["menu_usuario"]);
			}
			return true;
		}
		
		function sesion_iniciada() {
			if(!empty($_SESSION["id_usuario"]))
				return true;
			else
				return false;
		}
		
		function crear_sesion($sistema,$login_usuario,$clave) {
			
			try{
				$login_usuario = preg_replace('/[^A-Za-z0-9\-]/', '', $login_usuario);
				$clave = preg_replace('/[^A-Za-z0-9\-]/', '', $clave);

                $aaa = new ServicioAAA();
                $info = $aaa->iniciar_sesion($sistema, $login_usuario, $clave);

				$this->setCodigo_Sistema($sistema);
				$this->setId_Sistema($info["idSistema"]);
				$this->setId_usuario($info["idUsuario"]);
				$this->setLogin($info["login"]);
				$this->setCedula_usuario($info["cedula"]);
				$this->setNombre_usuario($info["nombre"]);
				$this->setApellido_usuario($info["apellido"]);
				$this->setTipo_usuario($info["tipoUsuario"]);
				$this->setEstado_usuario($info["estadoUsuario"]);
				$this->setMenu_usuario($aaa->obtener_menu_usuario($sistema, $info["idUsuario"]));
			}
			catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		
		function destruir_sesion() {
			$this->setId_usuario(NULL);
			$this->setLogin(NULL);
			$this->setCedula_usuario(NULL);
			$this->setNombre_usuario(NULL);
			$this->setApellido_usuario(NULL);
			$this->setTipo_usuario(NULL);
			return session_destroy();
		}
		
		function __toString() {
			return $this->getId_usuario()." ".$this->getLogin()." ".$this->getCedula_usuario()." ".$this->getNombre_usuario()." ".$this->getApellido_usuario()." ".$this->getTipo_usuario();
		}
	
		public function getId_usuario() {
		    return $this->id_usuario;
		}

		public function setId_usuario($id_usuario) {
			$_SESSION["id_usuario"] = $id_usuario;
		    $this->id_usuario = $id_usuario;
		}

		public function getCedula_usuario() {
		    return $this->cedula_usuario;
		}

		public function setCedula_usuario($cedula_usuario) {
			$_SESSION["cedula_usuario"] = $cedula_usuario;
			return $this->cedula_usuario = $cedula_usuario;
		}

		public function getNombre_usuario() {
		    return $this->nombre_usuario;
		}

		public function setNombre_usuario($nombre_usuario) {
			$_SESSION["nombre_usuario"] = $nombre_usuario;
		    $this->nombre_usuario = $nombre_usuario;
		}

		public function getApellido_usuario() {
		    return $this->apellido_usuario;
		}

		public function setApellido_usuario($apellido_usuario) {
			$_SESSION["apellido_usuario"] = $apellido_usuario;
		    $this->apellido_usuario = $apellido_usuario;
		}

		public function getLogin() {
			return $this->login;
		}
		
		public function setLogin($tipo_usuario) {
			$_SESSION["login"] = $tipo_usuario;
			$this->login = $tipo_usuario;
		}
		
		public function getTipo_usuario() {
		    return $this->tipo_usuario;
		}

		public function setTipo_usuario($tipo_usuario) {
			$_SESSION["tipo_usuario"] = $tipo_usuario;
		    $this->tipo_usuario = $tipo_usuario;
		}
		
		public function getId_sistema() {
			return $this->id_sistema;
		}
		
		public function setId_Sistema($id_sistema) {
			$_SESSION["id_sistema"] = $id_sistema;
			$this->id_sistema = $id_sistema;
		}
		
		public function getCodigo_sistema() {
			return $this->codigo_sistema;
		}
		
		public function setCodigo_Sistema($codigo_sistema) {
			$_SESSION["codigo_sistema"] = $codigo_sistema;
			$this->codigo_sistema = $codigo_sistema;
		}
		
		public function getEstado_usuario() {
			return $this->estado_usuario;
		}
		
		public function setEstado_usuario($estado_usuario) {
			$_SESSION["estado_usuario"] = $estado_usuario;
			$this->estado_usuario = $estado_usuario;
		}

		public function getMenu_usuario() {
			return $this->menu_usuario;
		}
		
		public function setMenu_usuario($menu_usuario) {
			$_SESSION["menu_usuario"] = $menu_usuario;
			$this->menu_usuario = $menu_usuario;
		}
		
		
}
