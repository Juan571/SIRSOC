function masterajax(datos){  
       $.ajax({
        url     : "../SIRSOC/Clases/modelEstadosActividad.php",
        async   : false,
        data    : datos,
        dataType:"JSON",
        type    :"post",
        error   : function(err,textStatus, jqXHR){///////Ya no debeira funcionar.......
          error= err;
           
          console.log(textStatus);
          console.log(jqXHR);
          console.log(err);
          //alert("Error");
        },
        success:function(resp, textStatus, jqXHR){
          
                switch (resp.evento) {
                 
                 case "guardar":
                    //console.log(resp.respuesta) ;
                   
                     if (resp.respuesta.error){
                            console.log(resp.respuesta);
                        if (resp.respuesta.codeerror==23505){
                            alert("Ya este registro Existe");
                            break;
                        }
                        alert("Error..");
                        break;
                     }
                     else{
                        console.log(resp) ;
                        if ($("#tablaEstadosActividades").children().length > 0) {              
                            $("#tablaEstadosActividades").dataTable().fnClearTable();
                            $("#tablaEstadosActividades").dataTable().fnDestroy();
                            $("#tablaEstadosActividades thead > tr >  th").hide();
                        }   
                        cargarTablas("obtenerEstados", "", "#tablaEstadosActividades", null, [0],"./Clases/modelEstadosActividad.php");
                        alert("Registrado Exitosamente..");
                     }
                    
                        break;
                default:
                        break;
                }
                
                if (resp.hasOwnProperty("Materiales")){
                   $.each(resp.Materiales,function(key,val){
                       // console.log(key+"->"+val);
                        $("#tipo_mat").append("<option data-text="+val+" value="+key+">"+val+"</option>");
                   });   
                   $("#tipo_mat").append("<option value=-1 >AGREGAR TIPO</option>");
                }
        }
    });
}  

function validarFormulario(formulario) {
    switch (formulario) {
        case "formEstadosActividades":
            $("#formEstadosActividades").validate({
                
                rules: {
                    nombre_estado: {
                        required: true,
                        minlength: 4
                    }                    
                },
                messages: {
                    nombre_estado: {
                        required: "Ingresa el Nombre del Material",
                        minlength: "El Nombre debe de tener un minimo de 4 caracteres"
                    }                    
                },
                debug: true,
                
                submitHandler: function () {
                    datos = {};
                    datos["action"] = "guardar";
                    datosformulario1 = $("#formEstadosActividades").serializeArray();
                      $.each(datosformulario1, function (i, a) {
                        if (a.value === "") {
                            a.value = null;
                        }
                        datos[a.name] = a.value;
                    });
                    //console.log(datos);
                    masterajax(datos);                   
                }
            });

            break;

        default:

            break;
    }
}

