
$('.registrarForm').click(function(e){
    e.preventDefault();
    form = $(this).parents('form');
    url  = form.attr('action');
    datos = form.serialize();
    $.post(url,datos,function(res){
        alertify.alert(res.mensaje).set('basic', true); 
    }).fail(function(ress,status,error){
        var errores="";
        var cont = 18;
       // $('#mensajeError').show();//muestra los mensajes
        $.each($.parseJSON(ress.responseText), function (ind, elem) {     
                errores += "<li>"+elem+"</li>"
                alertify.set('notifier','position', 'top-right');
                alertify.error(""+elem,cont--);
               
        }); 
       /* $('#errores').html(
            errores    
        );*/
        
    });
})


$('.registrar').click(function(e){
    e.preventDefault();
    form = $(this).parents('form');
    url  = form.attr('action');
    datos = form.serialize();
    $.post(url,datos,function(res){
        alertify.alert(res.mensaje).set('basic', true); 
          form.submit();
    }).fail(function(ress,status,error){
        //alertify.alert(ress.responseText).set('basic', true); 
        var errores="";
        var cont = 18;
       // $('#mensajeError').show();//muestra los mensajes
        $.each($.parseJSON(ress.responseText), function (ind, elem) {     
                errores += "<li>"+elem+"</li>"
                alertify.set('notifier','position', 'top-right');
                alertify.error(""+elem,cont--);
               
        }); 
       /* $('#errores').html(
            errores    
        );*/
        
    });
})


$('.eliminar').click(function(e){
    e.preventDefault();
    var divLista = $('.listaDatos');
    var fila = $(this).parents('tr');
    var url  = $(this).attr('href');
    var form = $(this).parents('form');
    var urlForm = form.attr('action');
    alertify.confirm("Esta seguro de eliminar",
        function(){
            $.get(url,[],function(res){
                if(res.eliminado){
                    fila.fadeOut();
                    alertify.alert(res.mensaje).set('basic', true);
                    $.get(urlForm,form.serialize(),function(res){ 
                        divLista.empty();
                        divLista.html(res);
                    });
                }else{
                    alertify.set('notifier','position', 'top-right');
                    alertify.error(""+res.mensaje);
                }  
            }).fail(function(ress,status,error){
                alertify.alert(ress.responseText).set('basic', true);
            })
        },
        function(){ 
    });
})

$('.btnBuscar').click(function(e){
    e.preventDefault(); 
    buscar(this);
});


$('.buscar').keyup(function(e){
    e.preventDefault();
    buscar(this);
});

function buscar(componente){
    var divLista = $('.listaDatos');
    form = $(componente).parents('form');
    url = form.attr('action');
    $.get(url,form.serialize(),function(res){ 
        divLista.empty();
        divLista.html(res);
    });
}
$(document).on('click','.pagination a',function(e){
    e.preventDefault();
    var divLista = $('.listaDatos');
    var aux = $(this).attr('href').split('?page=');
    var pag = aux[1];
    var url = aux[0];
    $.ajax({
        url: url,
        data:{page: pag},
        type: 'GET',
        dataType: 'json',
        success: function(res){
            divLista.html(res);
        }
    })
})


//funciones para el registro de perfiles
$('#modalidad').change(function(e){
    e.preventDefault();
    id = $(this).val();
    form = $(this).parents('form');
    url = form.attr('action');
    //indice 1 es el codigo
    //indice 5 nombre modalidad
    $.get(url,form.serialize(),function(res){
        if(res.valido){
            $('#contenidoForm').html(res.datos);
        }else{
            var cont = 10;
            $.each(res.errores, function (ind, elem) {     
                alertify.set('notifier','position', 'top-right');
                alertify.error(""+elem,cont--);
               
        }); 
        }
         

    }).fail(function(ress,status,error){  
        alertify.alert(ress.responseText).set('basic', true);
    });
})


$('#carrera_id').change(function(e){
    e.preventDefault();
     carrera_id = $(this).val();
     $('#directorCarrera').prop('value',carrera_id);
     id = $('#directorCarrera').val();
     //alert(id);
})

//$('#fecha_ini').datepicker({
   // uiLibrary: 'bootstrap4',
//});

$('.prueba').click(function(e){
    e.preventDefault();
    alert($('#fecha_ini').val())
})

//agregar areas a las carreras
$('#areaCarrera').click(function(e){
    e.preventDefault();
    var form     = $(this).parents('form');
    var divLista = $('.listaDatos');
    var url      = form.attr('action');
    var datos    = form.serialize();
    $.post(url,datos,function(res){
        if(res.registrado){
            alertify.alert(res.mensaje).set('basic', true);
            divLista.html(res.datos);
        }else{
            alertify.set('notifier','position', 'top-right');
            alertify.error(""+res.mensaje,5);
        }
    }).fail(function(ress,status,error){  
        alertify.alert(ress.responseText).set('basic', true);
    });
})

$('#eliminarAreaCarrera').click(function(e){
    e.preventDefault();
    var form     = $(this).parents('form');
    var divLista = $('.listaDatos');
    var url      = form.attr('action');
    var datos    = form.serialize();
    alertify.confirm("Esta seguro de eliminar",
        function(){
            $.post(url,datos,function(res){
                if(res.eliminado){
                    alertify.alert(res.mensaje).set('basic', true);
                     divLista.html(res.datos);
                }else{
                    alertify.set('notifier','position', 'top-right');
                    alertify.error("sfsdf"+res.mensaje);
                }  
            }).fail(function(ress,status,error){
                    alertify.set('notifier','position', 'top-center');
                    alertify.error(ress.responseText+"");  
            })
        },
        function(){ 
    });
})
