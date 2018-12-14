$( "#fecha_ini" ).ready(function() {
  });

$("#prueba").click(function(){
    
    res = $('#area_id').val(1).trigger('area_id:updated');
    console.log(res)
});

$(window).resize(function() {
    var ventana_ancho = $(window).width();
	var ventana_alto = $(window).height();
	if (ventana_ancho < 700) {
        $(".contenidoP").css("padding-top", "130px");  
    }else if (ventana_ancho > 700) {
        $(".contenidoP").css("padding-top", "80px");  
    }
  });

$('.registrarForm').click(function(e){
    e.preventDefault();
    form = $(this).parents('form');
    url  = form.attr('action');
    datos = form.serialize();
    $.post(url,datos,function(res){
        alertify.alert(res.mensaje).set('basic', true); 
    }).fail(function(ress,status,error){
        var errores="";
        var cont = 15;
       // $('#mensajeError').show();//muestra los mensajes
        $.each($.parseJSON(ress.responseText), function (ind, elem) {     
            alertify.set('notifier','position', 'top-right');
            if(cont == 15){
                alertify.error(""+elem,cont--).dismissOthers();
            }else{
                alertify.error(""+elem,cont--);
            }
               
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
                alertify.set('notifier','position', 'top-right');
                if(cont == 18){
                    alertify.error(""+elem,cont--).dismissOthers();
                }else{
                    alertify.error(""+elem,cont--);
                }
               
               
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
                    alertify.alert(res.mensaje).set('basic', true);
                    
                }  
            }).fail(function(ress,status,error){
                alertify.alert(ress.responseText).set('basic', true);
            })
        },
        function(){ 
    }).set('labels', {ok:'Eliminar', cancel:'Cancelar'});
    /*
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
    }).set('labels', {ok:'Eliminar', cancel:'Cancelar'});
    */
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
                if(cont == 10){
                    alertify.error(""+elem,cont--).dismissOthers();
                }else{
                    alertify.error(""+elem,cont--);
                }
               
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


$('.prueba').click(function(e){
    e.preventDefault();
    var hoy             = new Date();
    var fecha_ini = new Date($('#fecha_ini').val());
    var fecha_fin = new Date($('#fecha_fin').val());
    form = $(this).parents('form');
    url = form.attr('action');
    
    if (fecha_ini > fecha_fin) {
        alertify.set('notifier','position', 'top-right');
        alertify.error('La fecha de inicio no puede ser mayor a la fecha de fin de periodo',5).dismissOthers(); 
    }else if (fecha_ini.getFullYear() > hoy.getFullYear()) {
        alertify.set('notifier','position', 'top-right');
        alertify.error('El año de la fecha de inicio no puede ser mayor al año actual',5).dismissOthers(); 
    }else if (fecha_fin.getFullYear() > hoy.getFullYear()) {
        alertify.set('notifier','position', 'top-right');
        alertify.error('El año de la fecha de fin no puede ser mayor al año actual',5).dismissOthers();
    }else{
        $.post(url,form.serialize(),function(res) {
            if(res.registrado){
                alertify.alert(res.mensaje).set('basic', true);
                form.submit();
            }else{
                alertify.set('notifier','position', 'top-right');
                 alertify.error(""+res.mensaje,5).dismissOthers();
            }
        })
    }

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
            alertify.error(""+res.mensaje,5).dismissOthers();
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
                    alertify.error("sfsdf"+res.mensaje).dismissOthers();
                }  
            }).fail(function(ress,status,error){
                    alertify.set('notifier','position', 'top-center');
                    alertify.error(ress.responseText+"");  
            })
        },
        function(){ 
    }).set('labels', {ok:'Eliminar', cancel:'Cancelar'});
})

$('.estado').click(function(){
    url = $(this).data('ruta'); 
    celda =  $(this).parents("tr").find("td").eq(5);
    cambiarEstado = $('.cambiarEstado');
    cambiarEstado.data('ruta',url);
    cambiarEstado.data('celda',celda);
    
})

$('.cambiarEstado').click(function(){
    estado = $('#nuevoEstado').val();
    url = $(this).data('ruta');
    celda = $(this).data('celda');
    $.get(url,{'estado':estado},function(res){
        alertify.alert(res.mensaje).set('basic', true);
        celda.text(estado);
    })
   
})

$('.renunciarTutoria').click(function(e){
    e.preventDefault();
    ops = "";
    
    url  = $(this).attr('href');
    ruta = $(this).data('url');
    fila = $(this).parents("tr");
    tabla = $(this).parents("tbody");
    select = $('#nuevosTutores');
    var divLista = $('.listaDatos');
    $.get(url,{},function(res){
       $("#nuevoTutor").prop('action',ruta);
        $.each(res.profesionales, function(i, item) {
             ops +=  "<option value='"+item.id+"'>"+item.ap_pa_prof+" "+item.ap_ma_prof+" "+item.nombre_prof+"</option>"
        });
        $.each(res.docentes, function(i, item) {
             ops +=   "<option value='"+item.id+"'>"+item.ap_pa_prof+" "+item.ap_ma_prof+" "+item.nombre_prof+"</option>"
        });
        select.html(ops);
    })
})

$('#cambiarTutor').click(function(){
    url = $('#nuevoTutor').attr('action');
    tutor = $('#nuevosTutores').val();
    var divLista = $('.listaDatos');
    var token = $("input[name=_token]").val();
    $.get(url,{'tutor_id':tutor},function(res){
        alertify.alert(res.mensaje).set('basic', true);
        divLista.html(res.datos);
    }).fail(function(ress,status,error){
        alertify.set('notifier','position', 'top-center');
        alertify.error(ress.responseText+"");  
    })
   
}) 