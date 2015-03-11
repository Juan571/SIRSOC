<?php
    ini_set("soap.wsdl_cache_enabled",0);
    require_once 'configuracion_servidor_servicio.php';
    class ServicioAAA{
        var $client_informacion_usuarios = NULL, $cliente_informacion_menu = NULL;
        var $url_servicio_usuario = NULL,$url_servicio_menu = NULL;
        const ACTUALIZACION = "ACTUALIZACION";
        const ELIMINACIÓN = "ELIMINACIÓN";
        const REGISTRO = "REGISTRO";
        const CONSULTA = "CONSULTA";
        function __construct(){
            global $url_informacion_servicio_usuario,$url_informacion_servicio_menu;
            
            $this->set_url_servicio_usuario($url_informacion_servicio_usuario);
            $url_cliente_info=$this->get_url_servicio_usuario();
            if(!empty($url_cliente_info))
                $this->client_informacion_usuarios = new SoapClient($this->get_url_servicio_usuario());
            else
            {
                echo "NO EXISTE UNA RUTA DEFINIDA AL SERVICIO DE USUARIO!";
            }
            
            $this->set_url_servicio_menu($url_informacion_servicio_menu);
            $url_menu_info = $this->get_url_servicio_menu();
            if(!empty($url_menu_info))
                $this->cliente_informacion_menu = new SoapClient($url_informacion_servicio_menu);
            else 
            {
                echo "NO EXISTE UNA RUTA DEFINIDA AL SERVICIO DE MENÃš";
            }
        }
        
        //METODOS DEFINIDOS PARA LA CONSULTA DE INFORMACIÓN
        
        //LOGIN
        
        /*
         * Función utilizada para autenticar a un usuario
         * */
        function iniciar_sesion($codigo_sistema,$usuario,$clave){
            return $this->client_informacion_usuarios->__soapCall("obtenerDatosUsuario",array($codigo_sistema,$usuario,$clave));
        }
        
        /*
         * Función para obtener los enlaces a los que el usuario tiene acceso dependiendo del id del sistema
         * que se obtiene al autenticar
         * */
        function obtener_menu_usuario($codigo_sistema,$id_usuario){
            
            return $this->cliente_informacion_menu->__soapCall("obtenerMenuUsuario",array($codigo_sistema,$id_usuario));
        }
        
        //PERMISOS
        /*
         * Obtiene los permisos de un usuario a un modulo especifico (Acceso,registro,modificación,eliminación,buscar,imprimir 
         * */
        function obtener_permisos_usuarios($codigo_sistema,$id_usuario,$nombre_menu){
            return $this->client_informacion_usuarios->__soapCall("obtenerPermisosUsuario",array($codigo_sistema,$id_usuario,$nombre_menu));
        }
        
        //CAMBIO DE CLAVE
        /*
         * Es utilizado para realizar el cambio de contraseÃ±a de un usuario de un sistema especifico
         * */
        function cambiar_clave_usuario($codigo_sistema,$id_usuario,$clave_anterior,$nueva_clave){
            return $this->client_informacion_usuarios->__soapCall("cambiarClaveUsuario",array($codigo_sistema,$id_usuario,$clave_anterior,$nueva_clave));
        }
        
        //REGISTRO SESION
        /*
         * Registra la sesión del usuario : 1 para entrada 2 para salida
         * */
        function registro_sesion ($codigo_sistema,$id_usuario,$entrada_salida) {
            return $this->client_informacion_usuarios->__soapCall("registroSesion",array($codigo_sistema,$id_usuario,$entrada_salida));
        }
        
        //REGISTRO DE AUDITORIA
        /*
         * Se utiliza para registrar las acciones de los usuarios en el sistema
         * tipo_operacion indica si es ACTUALIZACION;REGISTRO;ELIMINACIÓN;CONSULTA
         * */
        function registro_operacion_sesion($codigo_sistema,$id_usuario,$tipo_operacion,$descripcion) {
      
            return $this->client_informacion_usuarios->__soapCall("operacionSesion",array($codigo_sistema,$id_usuario,$tipo_operacion,$descripcion));
        }

        
        //ES NECESARIO PARA SABER DONDE SE ENCUENTRA EL SERVICIO
        function set_url_servicio_usuario($url){
            return $this->url_servicio_usuario = $url;
        }
        
        function get_url_servicio_usuario(){
            return $this->url_servicio_usuario;
        }
        
        function set_url_servicio_menu($url){
            return $this->url_servicio_menu = $url;
        }
        
        function get_url_servicio_menu(){
            return $this->url_servicio_menu;
        }
        
    }

?>
