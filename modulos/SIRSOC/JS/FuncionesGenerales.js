function eventosgloblaes(){
     $(document).mousedown(function(){ 
                       window.top.$('.dropdown.open').removeClass('open');
                    });
    $(document).ready(function(){  
                $(document).bind("contextmenu", function(e){  
                    return false;  
                });  
            }); 
    $('#fechaActividad').change(function(){
        datos = {};
        datos["fecha"] = $(this).val();
        semanadelano(datos);
        //alert($(this).val());
    });
}
  
function semanadelano(fecha){
     $.ajax({
        url     : "../SIRSOC/Clases/manejofecha.php",
        async   : false,
        data    : fecha,
        dataType:"text",
        type    :"post",
        error   : function(err,textStatus, jqXHR){
          console.log(textStatus);
          console.log(jqXHR);
          console.log(err);
          //alert("Error");
        },
        success:function(resp, textStatus, jqXHR){
        
          console.log(resp);
          console.log(textStatus);
          console.log(jqXHR);
        
        }
    });
    
  
};
function cargarDatePicker() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
            
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    //$("#fechaActividad").val(today);
    $(function () {
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: 'Previo',
            nextText: 'Próximo',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
            ],
            monthStatus: 'Ver otro mes',
            yearStatus: 'Ver  año',
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            dateFormat: 'yy-mm-dd',
            firstDay: 0,
            initStatus: 'Selecciona la fecha',
            isRTL: false
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
        $("#fechaActividad").datepicker({
           showWeek: true,
           firstDay: 1

        });
    });
}

