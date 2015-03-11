<?php
include_once '../conexion_bd/conexion.php';
include_once '../conexion_bd/funciones_generales.php';
include_once '../conexion_bd/auditoria.php';
negar_acceso_url_ini();

if ($_POST["Enviar"]!="Enviar"){
   
   header("location: ../index.php");
   
}else { 
   
   $sql="SELECT * FROM usuarios where baneado=0 and intentosFallidos<=10 and login='".strtolower($_POST["login"])."' AND password='".md5(strtolower($_POST["clave"]))."'";
 
   $result = mysql_query($sql,$conexion);
   
         if (mysql_num_rows($result) == 1){
         	$info=mysql_fetch_array($result);
         	$_SESSION["id_usr"]=$info["idUsr"];
         	$_SESSION["login"]=$info["login"];
         	$_SESSION["ced_usr"]=$info["cedUsr"];
            $_SESSION["nomb_usr"]=$info["nombUsr"];
            $_SESSION["ape_usr"]=$info["apeUsr"];
            $_SESSION["tipo_usr"]=$info["tipoUsr"];
            $auditoria= new ClaseAuditoria();
			$sql="UPDATE usuarios set intentosFallidos=0 where idUsr=".$info["idUsr"];
			$result = mysql_query($sql,$conexion);  
			$auditoria->registro_sesion(1);	 
   			header('Location: ../modulos/index.php');
         }
      else{

			$ban_user="";
	      	abrirConex();
	      	$sql="UPDATE usuarios set intentosFallidos=(intentosFallidos+1) where login='".$_POST["login"]."'";
	   		$result = mysql_query($sql,$conexion);
	
	   		$sql_ban="SELECT intentosFallidos From usuarios where login='".$_POST["login"]."'";
	   		$result = mysql_query($sql_ban);
	   		$numero_intentos=mysql_fetch_row($result);
	   		if($numero_intentos[0]>=10)
	   			$ban_user="&id=".$_POST["login"];
	   		
	      	header("Location: ../index.php?usr=error$ban_user");
      }
   }
	cerrarConex();  
?>
