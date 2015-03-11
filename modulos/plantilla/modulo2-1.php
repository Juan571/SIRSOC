<?php
	require_once("../../login/Sesion.php");
	$sesion = new Sesion();
	if($sesion->sesion_iniciada()==false){
		header("Location: ../../index.php");
	}
	$permisos = $aaa->obtener_permisos_usuarios($_SESSION["codigo_sistema"],$_SESSION["id_usuario"],$_GET["id"]);
	$permiso_acceso = $permisos["acceso"];
	$permiso_registrar = $permisos["registrar"];
	$permiso_modificar = $permisos["modificar"];
	$permiso_eliminar = $permisos["eliminar"];
	$permiso_anular = $permisos["anular"];
	$permiso_imprimir = $permisos["imprimir"];
	$permiso_buscar = $permisos["buscar"];
	
	if ($permiso_acceso == 0) {
	    echo "<h1>No tiene permisos para acceder a esta ventana, contacte con el administrador.</h1>";
	    return;
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
        <h1>Módulo 2-1</h1>
        <ul>
            <li>Permiso de Acceso: <?=$permiso_acceso?></li>
            <li>Permiso para Registrar: <?=$permiso_registrar?></li>
            <li>Permiso para Modificar: <?=$permiso_modificar?></li>
            <li>Permiso para Eliminar: <?=$permiso_eliminar?></li>
            <li>Permiso para Anular: <?=$permiso_anular?></li>
            <li>Permiso para Imprimir: <?=$permiso_imprimir?></li>
            <li>Permiso para Buscar: <?=$permiso_buscar?></li>
        </ul>
    </body>
</html>
