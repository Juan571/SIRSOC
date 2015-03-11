<?php
include ("./preparedsqls.php");
   require_once("conexion.php");  
   
    $date = date('Y-m-d ');
    $ejecuta = new preparedsqls();
    //$prepareCon = new conexion();
    
    if(isset($_POST['action'])){
//	$action = $_POST['action'];
    } else {
	die("Ninguna accion ha sido a definida");
    }
foreach($_POST as $nombre_campo => $valor){ 
    
   $asignacion = "\$" . $nombre_campo . "='" . trim($valor) . "';"; 
   eval($asignacion); 
}  
  switch ($action){
      
        case $action === 'obtenerEstados': 
               
            $sql= ("select * from estados_actividades");
           
            $result = $ejecuta->con->query($sql,2);
            $arr = array();
            foreach ($result as $row => $valor) {
                $arr[]  = $valor;							
            }
            $out = json_encode($arr);
            //$this->desconectarSigesp();
            echo $out;
        
            break;
        
	case $action === 'guardar': 
                //$ejecuta->con->query("select dblink_exists('conSigesp');");
                $sql1 = ("insert into estados_actividades (nombre,descripcion) "
                . "values ('".strtoupper($nombre_estado)."','".strtoupper($descrip_estado)."')");
                $sql= str_replace("''","null", $sql1);
                $respuesta= $ejecuta->ejecutar($sql,$action);
                
       /*         $sql1 = ("insert into articulos(cod_articulo,nombre,editorial,autor,num_pag,fecha_edicion,tipos_articulos_id) "
                . "values ('$cod_material','$nombre','$editorial','$autor','$npaginas','$aedicion','$tipomaterial')");
                //return($sql."asdasdsad");
                $sql= str_replace("''","null", $sql1);
                echo $ejecuta->ejecutar($sql,"guardarMaterial");
                break;
            
        case $action === 'IncorporarArticulo': 
                $sql = ("update desincorporacion set fecha_incorporacion='".$date."', estado = false::BOOLEAN, motivo='".$_POST['motivo']."' where desincorporacion.articulos_id='".$_POST['id_articulo']."' and estado= true::BOOLEAN");
                $respuesta= $ejecuta->ejecutar($sql,$action);
                $var=  json_decode($respuesta, true);
                if($var[estado]==='Registrado'){
                   $sql=("update articulos set disponible = true where id='".$_POST['id_articulo']."'"); 
                   echo $ejecuta->ejecutar($sql,$action);
                }
                else{
                    $result = array("estado"=>"noRegistrado","evento"=>$evento);
                    return json_encode($result);
                }
                break;
        
        case $action === 'llenarTableMatAsigPorUsr':
             $ejecuta->ObtenerMaterialidPrestadoUsuarioMoroso($_POST['data']);
                break;
        case $action === 'devolverMaterialporId':
            $id=$_POST["id_op"];
            if(!empty($id) && !empty($_POST["cod_material"])){
                $sql =("update articulos set disponible ='t'::BOOLEAN where cod_articulo ='".$_POST["cod_material"]."'");
                $ejecuta->ejecutar($sql,$action);
                $sql =("update operaciones set fecha_dev = '".$date."' where id = '".$_POST['id_op']."'");
                $ejecuta->ejecutar($sql,$action);

                   $result = array("estado"=>"Actualizado","evento"=>$action);
                   echo json_encode($result);//
            }
            else{
                   $result = array("estado"=>"NoSedefineID_OP","evento"=>$action);
                   echo json_encode($result);//
            }
            */
                break;
	default :
                break;
        
    }
    ?>