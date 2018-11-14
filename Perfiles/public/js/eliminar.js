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
                    alertify.error(""+res.mensaje).dismissOthers();
                }  
            }).fail(function(ress,status,error){
                    alertify.set('notifier','position', 'top-center');
                    alertify.error('UPS no se pudo eliminar').dismissOthers();  
            })
        },
        function(){ 
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
    });
})

$('.registrar').click(function(e){
    e.preventDefault();
    bloquearCampos(false);
    form = $(this).parents('form');
    url  = form.attr('action');
    datos = form.serialize();
    $.post(url,datos,function(res){
        if(res.registrado){
            alertify.alert(res.mensaje).set('basic', true); 
            form.submit();
        }else{
            if(perfilSeleccionado()){
                 bloquearCampos(true);
            }
            alertify.set('notifier','position', 'top-right');
            alertify.error(res.mensaje,6).dismissOthers();
            
        }
     //error   
    }).fail(function(ress,status,error){
        if(perfilSeleccionado()){
            bloquearCampos(true);
       }
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
        
    });
})

$('.modificarP').click(function(e){
    e.preventDefault();
    bloquearCampos(false);
    form = $(this).parents('form');
    url  = form.attr('action');
    datos = form.serialize();
    $.post(url,datos,function(res){
        if(res.registrado){
            alertify.alert(res.mensaje).set('basic', true); 
            form.submit();
        }else{
            bloquearCampos(true);
            alertify.set('notifier','position', 'top-right');
            alertify.error(res.mensaje);
            
        }
        
    }).fail(function(ress,status,error){
        bloquearCampos(true);
        var errores="";
        var cont = 18;
       // $('#mensajeError').show();//muestra los mensajes
        $.each($.parseJSON(ress.responseText), function (ind, elem) {     
                errores += "<li>"+elem+"</li>"
                alertify.set('notifier','position', 'top-right');
                if(cont == 18){
                    alertify.error(""+elem,cont--).dismissOthers();
                }else{
                    alertify.error(""+elem,cont--);
                }
        }); 
        
    });
})
$('.cambioTema').click(function(){
    if(this.checked) $(this).prop('value','si');
    else $(this).prop('value','no');
})

$('.trabajoCon').click(function(){
    if(this.checked){
        $(this).prop('value','si');
        mostrarPerfiles(true);
        
    } 
    else {
        $(this).prop('value','no');
        mostrarPerfiles(false);
        bloquearCampos(false);
        limpiarCampos();
        $("#inputs").hide();
        $("#selects").show();
    }
})

function mostrarPerfiles(visible){
    if (visible) {
        $("#contentPerfiles").show();
    }else{
        $("#contentPerfiles").hide();
    }
   /* var div = document.getElementById('contentPerfiles');
    if(visible){
        div.style.display = "block";
    }else{
        div.style.display = "none";
    }*/
}
//seleccionar titulo de perfil
$('#titulo_perfil').change(function(){
    var perfil = $(this).val();
    if(perfil == ""){
        limpiarCampos();
        bloquearCampos(false);
        $("#inputs").hide();
        $("#selects").show();
    }else{
        perfil = JSON.parse(perfil);
        $("#inputs").show();
        //console.log(perfil);
        bloquearCampos(true);
        llenarCampos(perfil);
        $("#selects").hide();
    }
    
})

function llenarCampos(perfil){
    $('#titulo').val(perfil.titulo);
    $("#sec_prabajo").val(perfil.sec_trabajo);
    $("#institucion").val(perfil.institucion);
    $("#objetivo_esp").val(perfil.objetivo_esp);
    $("#objetivo_gen").val(perfil.objetivo_gen);
    $("#descripcion").val(perfil.descripcion);
    $("#docente_id").val(nombreDocente(perfil));
    $("#tutor_id").val(nombreTutor(perfil));
    $("#area_id").val(perfil.area.nombre);
    $("#subarea_id").val(perfil.subarea.nombre);
}

function nombreDocente(perfil){
    var profesional = perfil.docente.profesional;
    var nombre = profesional.ap_pa_prof+" ";
    nombre += profesional.ap_ma_prof+" ";
    nombre += profesional.nombre_prof;
    return nombre;
}

function nombreTutor(perfil){
    var profesional = perfil.tutor;
    var nombre = profesional.ap_pa_prof+" ";
    nombre += profesional.ap_ma_prof+" ";
    nombre += profesional.nombre_prof;
    return nombre;
}
function limpiarCampos(){
    $('#titulo_perfil').val(null);
    $('#titulo_perfil').trigger("chose:updated");
    $('#titulo').prop('value',null);
    $('#sec_trabajo').prop('value',null);
    $('#institucion').prop('value',null);
    $('#objetivo_esp').prop('value',null);
    $('#objetivo_gen').prop('value',null);
    $('#descripcion').prop('value',null);
    $('#docente_id').prop('value',null);
    $('#docente_id').prop('value',null);
    $('#tutor_id').prop('value',null);
    $('#area_id').prop('value',null);
    $('#subarea_id').prop('value',null);    
}

function bloquearCampos(validar){
    $('#titulo').prop('disabled',validar);
    $('#sec_trabajo').prop('disabled',validar);
    $('#institucion').prop('disabled',validar);
    $('#objetivo_esp').prop('disabled',validar);
    $('#objetivo_gen').prop('disabled',validar);
    $('#descripcion').prop('disabled',validar);
    $('#descripcion').prop('disabled',validar);
    $('#docente_id').prop('disabled',validar);
    $('#docente_id').prop('disabled',validar);
    $('#tutor_id').prop('disabled',validar);
    $('#area_id').prop('disabled',validar);
    $('#subarea_id').prop('disabled',validar);
}

function perfilSeleccionado(){
    var perfil = $('#titulo_perfil').val();
    if(perfil == ""){
        return false;
    }else if(perfil == null){
        return false;
    }else{
        return true;
    }
}


//cambiar estado de un perfil
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
        console.log(celda.text(estado));
    })
   
})
