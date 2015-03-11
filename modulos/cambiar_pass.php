<?php
	require_once("../login/Sesion.php");

	$sesion = new Sesion();
	if($sesion->sesion_iniciada()==false){
		header("Location: ../index.php");
	}
    
    $estado = 0;
    if (isset($_POST["clave_anterior"])) {
        $clave_anterior = $_POST["clave_anterior"];
        $clave_nueva = $_POST["clave_nueva"];
        $clave = $_POST["clave"];
        $sistema = $_SESSION["codigo_sistema"];
        if ($clave_nueva != $clave) {
            $estado = 1;
            $msg = "Las contraseñas no coinciden";
        } else if (trim($clave_anterior) == "" || trim($clave) == "") {
            $estado = 1;
            $msg = "Las contraseñas no pueden quedar en blanco";            
        } else {
            $salida = $aaa->cambiar_clave_usuario($_SESSION["codigo_sistema"],$_SESSION["id_usuario"],$clave_anterior,$clave);
            if ($salida == "INVALIDO") {
                $estado = 1;
                $msg = "Contraseña incorrecta";
            } else if ($salida == "INVALIDO") {
                $estado = 1;
                $msg = "Error Desconocido";
            } else if ($salida == "IGUALES") {
                $estado = 1;
                $msg = "La nueva clave es igual a la anterior";
            } else {
                $estado = 2;
                $msg = "La contraseña se actualizó con éxito";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/animacion.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/elementos.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/personalizar.css">
        <link href="../css/estilos_personales.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/css/bootstrap-responsive.min.css">
        <link href="http://192.168.200.91/vtelcacdn/img/vtelca.ico" rel="shortcut icon" />

        <script src="http://192.168.200.91/vtelcacdn/jquery/2.0.3/jquery.min.js"></script>
        <script src="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color: #eee;">
        <form class="form-signin" action="cambiar_pass.php" method="post">
            <h2 class="form-signin-heading">Cambiar Contraseña</h2>
            <input name="clave_anterior" type="password" class="input-block-level" placeholder="Contraseña Anterior">
            <input name="clave_nueva" type="password" class="input-block-level" placeholder="Nueva Contraseña">
            <input name="clave" type="password" class="input-block-level" placeholder="Repita Contraseña">
            <button class="btn btn-large btn-primary" type="submit">Efectuar cambio</button>
        </form>
        <?php if ($estado == 1) echo "<p class=\"alert alert-error offset4 span6\">$msg</p>"; ?>
        <?php if ($estado == 2) echo "<p class=\"alert alert-success offset4 span6\">$msg</p>"; ?>
    </body>
</html>
