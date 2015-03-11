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
        <script type="text/javascript" src="./JS/funcionesRegistrarActividades.js"></script><link rel="stylesheet" type="text/css" href="./JS/jqueryUI/css/blitzer/jquery-ui-1.10.4.custom.css">             
        <script src="http://rec.vtelca.gob.ve/jquery-ui/1.10.3/ui/jquery-ui.js"></script>
        
        <style rel="stylesheet" type="text/css">
        .form-group {
           text-align: left;
        }
        </style>
        <script>
            $(document).ready(function() {
               eventosgloblaes();
               cargarDatePicker();
               validarFormulario("formEstadosActividades");
               cargarTablas("obtenerEstados", "", "#tablaEstadosActividades", null, [0],"./Clases/modelEstadosActividad.php");
               $("#actividad").focus();
                   
            });
        </script>
        <title>Registro de Actividades</title>
    </head>
    <body>

         <div style="max-width:100%;" class="container" id="" align="center" >
                    <div class="panel panel-default" align="center">
                        <div style="text-align: left" class="panel-heading">
                            <h4>Registro de Actividades</h4> Registrar las Actividades Diarias...
                        </div>
                        <div class="panel-body">
                            <form id="formEstadosActividades" name="formActividades" enctype="application/x-www-form-urlencoded">
                                <fieldset>
                                    <div style="text-align: -webkit-left;" class="col-lg-12">
                                        <div style="display: inline-block;" class="form-group">
                                            <label>Fecha de la Activdad</label>
                                            <input  name="fecha" id="fechaActividad" class="form-control" placeholder="Indique Fecha">
                                        </div>
                                        <div style="display: inline; margin-left: 3%;"class="alert alert-info">
                                            Indique el dia en el que será ejecutada la <a class="alert-link">Actividad</a>.
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Activdad</label>
                                            <input name="actividad" id="actividad" class="form-control" placeholder="Actividad">
                                        </div>
                                        <div class="form-group">
                                            <label>Descripcion</label>
                                            <input name="descripcion" class="form-control" placeholder="Descripcion de la Actividad">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Personal de Apoyo</label>
                                            <input name="personal_apoyo" class="form-control" placeholder="Personal de Apoyo en la Actividad">
                                        </div>
                                        <div class="form-group">
                                            <label>Recursos</label>
                                            <input name="recursos" class="form-control" placeholder="Recursos utilizados en la activdad">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Observaciones</label>
                                            <input name="personal_apoyo" class="form-control" placeholder="Observaciones">
                                        </div>
                                        <div class="form-group">
                                            <label>Responsable</label>
                                            <input name="recursos" class="form-control" placeholder="Responsable o Responsables">
                                        </div>
                                        
                                    </div>
                                        <div style="padding-top: 2%;" >    
                                            <input style="display:none;width: 9%;" class="btn btn-warning submit" type="submit" id="btneditarTipoMaterial" value="EDITAR">
                                            <input class="btn  btn-info submit"  id="guardar" type="submit" value="GUARDAR">
                                            <input type="reset" value="LIMPIAR " title="Limpiar Campos"  id="botonlimpiar" class="btn btn-danger botonlimpiar">
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
            <div class="col-lg-12">
                <h3 style="margin-top: -2%;"class="page-header">Actividades Registradas </h3>
                <div id ="rowTabla" class="row tabla" style="margin-top: 2%;max-width: 60%;/* margin-top:20px; margin-left: -23%;margin-right: -14%;*/">
                   <div class="row">
                       <div id="tabla_wrapper" class="dataTables_wrapper" role="grid">
                           <div id="divSelectHeaders" style="margin-bottom: 2%; text-align: -webkit-center;"></div>
                           <table id="tablaActividadesRegistradas"  class="display dataTable " cellspacing="0" width="100%" style="font-size: inherit;"></table>
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
