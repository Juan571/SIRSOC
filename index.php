<?php 
	if (!isset($_SESSION)) session_start();
       	require_once("config.php");
        
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>.:Sistema de Control de Actividades:.</title>
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/animacion.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/elementos.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/personalizar.css">
        <link href="css/estilos_personales.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/css/bootstrap-responsive.min.css">
        <link rel="shortcut icon" href="http://192.168.200.91/vtelcacdn/img/vtelca.ico" />
        <style>
            #cabecera {
                width: calc(100% - 10px);
                height: 60px;
                background: url(http://rec.vtelca.gob.ve/img/cintillo-i.png) left no-repeat, 
                            url(http://rec.vtelca.gob.ve/img/cintillo-c.png) center no-repeat, 
                            url(http://rec.vtelca.gob.ve/img/cintillo-d.png) right no-repeat;
                background-color: #fff;
                background-size: auto 40px;
                margin: 5px;
            }
        </style>    
        <script src="http://192.168.200.91/vtelcacdn/jquery/2.0.3/jquery.min.js"></script>
        <script src="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://rec.vtelca.gob.ve/vtelca/prepare.js"></script>
        <script language="javascript" type="text/javascript">
	        function validar_soporte_ajax(){
	            if (typeof XMLHttpRequest == "undefined" && typeof ActiveXObject == "undefined" && window.createRequest == "undefined") {
			        return false;
	            }
	            return true;
	        }
	        $(document).ready(function(){
		        fecha("contenedor_fecha");
		        hora_actual("contenedor_hora",true);
		        if(!validar_soporte_ajax())
			        alert("ADVERTENCIA: Su Navegador no soporta Ajax actualice o Intente usar otro navegador!");
		        $("#usuario").focus();
                        document.oncontextmenu = function(){return false;};
	        });
        </script>
    </head>
    <body class="cuerpo-fondo">
        <noscript>
            <p style="color:darkred; padding:0px; width:100%; font-weight:bold; font-size: 9pt; text-decoration: underline;">
                ATENCI&Oacute;N: Esta p&aacute;gina requiere JavaScript para su funcionamiento Habil&iacute;talo por favor!
            </p>
        </noscript>
        <div class="contenedor completo margen-10sup">
            <div id="cabecera"></div>
	        <div class="cuerpo">
		        <div class="menu" style="top: 0; bottom: auto; text-align: right;">	
	 	            <?php echo "FECHA:&emsp;<span id='contenedor_fecha'></span>&emsp;HORA:&emsp; <span id='contenedor_hora'></span>&emsp;&emsp;";?>
		        </div><!-- Menú de navegación -->
                <div style="background-color: #eee;">
                    <form class="form-signin" action="login/iniciar_sesion.php" method="post">
                        <h2 class="form-signin-heading">Iniciar sesión</h2>
                        <input id="usuario" name="usuario" type="text" class="input-block-level" placeholder="Usuario">
                        <input id="clave" name="clave" type="password" class="input-block-level" placeholder="Contraseña">
                        <button class="btn btn-large btn-primary" type="submit">Entrar</button>
                    </form>
                    <?php if(isset($_GET["error"]) && $_GET["error"]=="true" && empty($_GET["usr"])) {?>
                    <p class="alert alert-error offset4 span6">
                        El Usuario Fu&eacute; Bloqueado, contacte al administrador del Sistema.
                    </p>
					<?php } else if(isset($_GET["usr"]) && !empty($_GET["usr"])) {?>
                    <p class="alert offset4 span6">
                        La Informaci&oacute;n Ingresada es Incorrecta. Vuelva a Intentarlo.
                    </p>
					<?php }?>
                    
                </div> <!-- /container -->
            </div><!-- cuerpo -->
	        <div class="pie_pagina">
		        <div style="text-align: left; position: absolute; margin-left: 4px;">.:Sistema de Control de Actividades:.</div>
		        © Copyleft - Venezolana de Telecomunicaciones <?php echo date("Y")?>, C.A &emsp;&emsp; 
	        </div>
        </div>
    </body>
</html>
