<?php
	include_once '../login/Sesion.php';
	$sesion = new Sesion();
	if($sesion->sesion_iniciada()==false){
		header("Location: ../index.php");
	}
        (!isset($_SESSION["contador"]))?$_SESSION["contador"]=1:$_SESSION["contador"]=2;
        $sesioniniciada=$_SESSION["contador"];
        $nombre =$sesion->getNombre_usuario()." ".$sesion->getApellido_usuario() ;
        echo "<label  style='display:none' id='nombreusuario' >$nombre</label>";  
        echo "<label  style='display:none' id='sesioniniciada' >$sesioniniciada</label>";  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title> .:Sistema de Control de Actividades:.:.</title>
       <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/animacion.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/elementos.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/vtelca/personalizar.css">
        <link href="../css/estilos_personales.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/css/bootstrap-responsive.min.css">
        <link href="http://192.168.200.91/vtelcacdn/img/vtelca.ico" rel="shortcut icon" />

        <script src="http://192.168.200.91/vtelcacdn/jquery/2.0.3/jquery.min.js"></script>
        <script src="http://192.168.200.91/vtelcacdn/bootstrap/2.3.2/js/bootstrap.min.js"></script>
        
        
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
            .completo[class^="contenedor"] > .cuerpo > div:last-child > div { /* Hijos del contenedor de elementos debajo del menú */
		bottom: -35px;
	    }
        </style>

        <script type="text/javascript" src="http://rec.vtelca.gob.ve/vtelca/prepare.js"></script>
        <script type="text/javascript">
            function notificacionsesion() {
                    if (Notification) {
                        if (Notification.permission !== "granted") {
                            Notification.requestPermission()
                        }
                        var title = "Sistema de Control de Actividades dice:"
                        var extra = {
                            icon: "http://rec.vtelca.gob.ve/img/loader-64.gif",
                            body: "Has iniciado Secion como : "+$("#nombreusuario").text()
                        }
                        var noti = new Notification( title, extra)
                        noti.onclick = {
                        // Al hacer click
                        }
                        noti.onclose = {
                        // Al cerrar
                        }
                        setTimeout( function() { noti.close() }, 5000)
                    }
                }
            $(document).ready(function(){
                    if ($("#sesioniniciada").text()==='1'){
                        notificacionsesion();
                    }
	            fecha("contenedor_fecha");
	            hora_actual("contenedor_hora",true);
            });
        </script>
    </head>
    <body class="cuerpo-fondo">
        <input type="hidden" id="TIPO_AMBIENTE" name="TIPO_AMBIENTE" value="<?= getenv("TIPO_AMBIENTE");?>" />
        <noscript>
            <p class="texto-rojo alert">ATENCI&Oacute;N: Esta p&aacute;gina requiere JavaScript para su funcionamiento Habil&iacute;talo por favor!</p>
			<META HTTP-EQUIV="REFRESH" CONTENT="10;URL=../login/cerrar_sesion.php">
        </noscript>
        <div class="contenedor completo">
            <div id="cabecera"></div>
        	<div class="cuerpo">
                <div class="menu">&emsp;
	    	 	<div align="left"><?php echo "FECHA:&emsp;<span id='contenedor_fecha'></span>&emsp;HORA:&emsp; <span id='contenedor_hora'></span>&emsp;&emsp;BIENVENID@:&emsp;&emsp;".$sesion->getApellido_usuario().", ".$sesion->getNombre_usuario()." &emsp;&emsp;";?></div>		
	    	</div><!-- Menú de navegación -->
		    <div class="panel">
		    	<div></div>
		    	<div>
		        	<?php include_once 'header.php';?>	
		    		<!-- ## EVALUE SI EL NAVEGADOR TIENE EL JAVASCRIPT HABILITADO -->
		    		<noscript><center><b style="font-size: 14pt; color: red;">Su navegador tiene Inhabilitado el uso de JavaScript... Active el uso de JavaScript para continuar!</b></center>
		    			<META HTTP-EQUIV="REFRESH" CONTENT="10;URL=../login/cerrar_sesion.php">
		    		</noscript>
		    		<!-- --------------------------------------------------------- -->
		    		<iframe name="contenido_central" scrolling="auto" title="contenido_central" id="contenido_central" style="width: 100%; height: 88%; margin-top: 0px !important;" frameborder="0" src="biblioVtelca/pagina_blanco.php"></iframe>
		    	</div>
		    </div><!-- Elemento que se encuentra debajo del menu -->
    	</div><!-- cuerpo -->
	    <div class="pie_pagina">
	    	<div style="text-align: left; position: absolute; margin-left: 4px;">.:Sistema de Control de Actividades:.</div>
	    	© Copyleft - Venezolana de Telecomunicaciones <?php echo date("Y")?>, C.A &emsp;&emsp; 
	    </div>
    </body>
</html>
