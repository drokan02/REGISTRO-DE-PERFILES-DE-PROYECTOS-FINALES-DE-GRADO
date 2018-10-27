//funciona tanto para registrar como eliminar 
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
                    alertify.set('notifier','position', 'top-center');
                    alertify.error('UPS no se pudo eliminar');  
            })
        },
        function(){ 
    });
})

$('#btnMensaje').click(function(){
    //oculta los mensajes
    $("#mensajeError").hide();
});


$('.buscar').keyup(function(e){
    e.preventDefault();
    var divLista = $('.listaDatos');
    form = $(this).parents('form');
    url = form.attr('action');
    $.get(url,form.serialize(),function(res){ 
        divLista.empty();
        divLista.html(res);
    });
});


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
         $('#contenidoForm').html(res);

    })
})

$('#carrera_id').change(function(e){
    e.preventDefault();
     carrera_id = $(this).val();
     $('#directorCarrera').prop('value',carrera_id);
     id = $('#directorCarrera').val();
     //alert(id);
})

$('#fecha_ini').datepicker({
    uiLibrary: 'bootstrap4',
});

$('.prueba').click(function(e){
    e.preventDefault();
    alert($('#fecha_ini').val())
})