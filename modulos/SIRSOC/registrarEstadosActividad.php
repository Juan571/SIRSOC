<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <script src="http://rec.vtelca.gob.ve/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://rec.vtelca.gob.ve/jquery/2.1.1/jquery.js"></script>


        <link rel="stylesheet" href="http://rec.vtelca.gob.ve/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://rec.vtelca.gob.ve/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="./css/cmxform.css">
        <link rel="stylesheet" type="text/css" href="JS/dataTables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="../SIRSOC/css/EstilosGenerales.css">
        <script src="http://rec.vtelca.gob.ve/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script type="text/javascript" src=""></script>
        <script src="http://rec.vtelca.gob.ve/datatables/1.10.2/media/js/jquery.dataTables.min.js"></script>
        
        <script src="./JS/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="./JS/tablas.js"></script>
        <script type="text/javascript" src="./JS/FuncionesGenerales.js"></script>
        <script type="text/javascript" src="./JS/funcionesEstadosActividad.js"></script>
        <script>
            $(document).ready(function() {
               validarFormulario("formEstadosActividades");
               cargarTablas("obtenerEstados", "", "#tablaEstadosActividades", null, [0],"./Clases/modelEstadosActividad.php");
               $("#nombre_estado").focus();
                   
            });
        </script>
        <title>Registrar Estados de las Actividades</title>

    </head>
    <body>

         <div style="max-width:100%;" class="container" id="" align="center" >
            <form id="formEstadosActividades" name="formEstadosActividades" enctype="application/x-www-form-urlencoded">
                <fieldset>
                    <div class="panel panel-default" align="center">
                        <div style="text-align: left" class="panel-heading">
                            <h4>Registro Estados de Actividades</h4> Registrar los Estados que pueden tener las Actividades registradas...
                        </div>
                        <div class="panel-body">
                            <table  style="font-size: 15px;">
                                <tbody>
                                    <tr>
                                        <td style="padding-right: 10px" align="center" ><b>*Nombre</b></td>
                                        <td style="text-transform:uppercase;padding-right: 10px"align="left"><input style='text-transform:uppercase' name="nombre_estado" type="text" id="nombre_estado" class="form-control" size="20" maxlength="20" required >	  </td>
                                        <td style="padding-right: 10px" align="right" class="th_std"><b>Descripción</b></td>
                                        <td style="padding-right: 10px"align="left"><input style='text-transform:uppercase' name="descrip_estado" type="text" id="descrip_estado" class="form-control" value="" size="30" maxlength="50"  >	  </td>
                                    </tr>
                                    <tr>
                                        <td style="display:none" id="id_estado"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="padding-top: 2%;" >    
                                <input style="display:none;width: 9%;" class="btn btn-warning submit" type="submit" id="btneditarTipoMaterial" value="EDITAR">
                                <input class="btn  btn-info submit"  id="guardar" type="submit" value="GUARDAR">
                                <input type="reset" value="LIMPIAR " title="Limpiar Campos"  id="botonlimpiar" class="btn btn-danger botonlimpiar">
                            </div>
                        </div>
                  </div>
                </fieldset>
            </form>
            <div class="col-lg-12">
                <h3 style="margin-top: -2%;"class="page-header">Estados de Actividades Registrados</h3>
                <div id ="rowTabla" class="row tabla" style="margin-top: 2%;max-width: 60%;/* margin-top:20px; margin-left: -23%;margin-right: -14%;*/">
                   <div class="row">
                       <div id="tabla_wrapper" class="dataTables_wrapper" role="grid">
                           <div id="divSelectHeaders" style="margin-bottom: 2%; text-align: -webkit-center;"></div>
                           <table id="tablaEstadosActividades"  class="display dataTable " cellspacing="0" width="100%" style="font-size: inherit;"></table>
                       </div>
                   </div>
                </div>
            </div>  
        </div>
        <script type="text/javascript">

            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        </script>
        

    </body>
</html>
