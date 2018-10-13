//funciona tanto para registrar como eliminar 
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
        var cont = 6;
       // $('#mensajeError').show();//muestra los mensajes
        $.each($.parseJSON(ress.responseText), function (ind, elem) {     
                errores += "<li>"+elem+"</li>"
                alertify.error(""+elem,cont++);
        });
       /* $('#errores').html(
            errores    
        );*/
        
    });
})

$('.eliminar').click(function(e){
    e.preventDefault();
    var fila = $(this).parents('tr');
    var url  = $(this).attr('href');
    alertify.confirm("Esta seguro de eliminar el Profesional",
        function(){
            $.get(url,[],function(res){
                fila.fadeOut();
                alertify.alert(res.mensaje).set('basic', true); 
            }).fail(function(){
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
