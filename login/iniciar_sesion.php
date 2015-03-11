<?php
    require_once("../config.php");
    require_once("Sesion.php");
    $login_usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $sesion = new Sesion();
    try{
        $info_sesion = $sesion->crear_sesion($sistema, $login_usuario, $clave);
	
	    if($sesion->sesion_iniciada()==true)
		    header("Location: ../modulos/index.php");
	    else{
		    if($info_sesion[0] == false && $info_sesion[2] == false)
			    header("Location: ../index.php?error=true");
		    else
			    if($info_sesion[0] == false && $info_sesion[2] == true)
				    header("Location: ../index.php?error=true&usr=$info_sesion[1]");
	    }

    }catch (Exception $e){
	    echo $e->getMessage();
    }
?>
