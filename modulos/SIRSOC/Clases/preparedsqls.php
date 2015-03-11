<?php

require_once("conexion.php"); 


class preparedsqls{
   
    
    private $tipoDato;
    public $con;
    public $conSigesp;
    private $aaa;
    private $sesion;
	public function __construct(){
		$this->conSigesp = new conexion(true);
		$this->con = new conexion();
		//$this->aaa = new ServicioAAA();
		//$this->sesion =new Sesion();
	//	$this->con->query("select dblink_exists('conSigesp');");
	}
	/**
	 * Desconecta el enlace conSigesp realizado con la extension db_link 
	 * @return  
	 */
	public function desconectarSigesp(){
		$this->con->query("SELECT dblink_disconnect('conSigesp')");
	}
        
        /**
	 *  Funcion para obtener los nombres de los departamentos de la base de datos de SIGESP
	 *  @return  JSON  
	 */
	public function ObtenerDptoSigesp(){
		$sql = "SELECT codger,coddep,dendep FROM srh_departamento ";
		$result = $this->conSigesp->query($sql);
		$array = array();
		foreach ($result as $row => $value) {
			$array[] = $value;
		}
		echo json_encode($array);

	}
        
        public function obtenermaterial($evento){
           $result=false;
     		try{
     			$SQL=("select id,nombre from tipos_articulos");
     			$result= $this->con->query($SQL,2);
                        $arr =  array();
                        if($result){
                                foreach ($result as $row => $value) {
                                        $arr[$value['id']]=$value['nombre'];
                                }
                        $out = array("Materiales" => $arr);
                        $out = json_encode($out);

                        echo $out;
                        }
     		}
     		catch(PDOException $e){
     			echo($e->getMessage()."\n<br>SQL: $sql");
     		}
        }
        
        public function ejecutar($sql,$evento){
     			
                        $res= $this->con->query($sql);
                        $respuesta = json_decode($res);
                        
                        if($respuesta->{'error'}){
                            
                                $result = array("respuesta"=>$respuesta,"evento"=>$evento);
                            
                        }   
                        else{
                            $result = array("respuesta"=>"Registrado","evento"=>$evento);
                        }
                        echo json_encode($result);
                        
     		
     		
        }
        public function numerodefilasAfectadas($sql,$evento){
           //$result=false;
     		try{
     			$result = $this->con->prepare($sql);
                        $result->execute();
     			return $result->rowCount();
                }
     		catch(PDOException $e){
     			return($e->getMessage()."\n<br>SQL:".$sql);
     		}
        }
}

?>