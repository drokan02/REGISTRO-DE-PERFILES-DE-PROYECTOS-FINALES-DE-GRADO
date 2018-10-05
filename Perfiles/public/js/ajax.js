//si el formulario tiene class=importarDatos
/*$(document).on("submit",".importarDatos",function(e){
    e.preventDefault();
    var form = $(this);
    var nombreForm=$(this).attr("id");
    var token = $("#token").val();
    var dato = $("#archivo").val();

    $.ajax({
        route: nombreForm,
        headers : {"X-CSRF-TOKEN": token},
        type: 'POST',
        data: {archivo:dato},
        function(result){
            alert(result.mensaje);
            //se cambia el valor de un input
            $("#nombre").val(result.mensaje);
        }
    })
})*/

/*$(document).ready(function(){
    //ocultar un elemento con ajax
   // $("#nombre").hide();
    //el boton tiene como class=importarDatos
    $(".importarDatos").click(function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        var ruta = form.attr('action');
        $.post(ruta,form.serialize(),function(result){
            alert(result.mensaje);
            //se cambia el valor de un input
            $("#nombre").val(result.mensaje);
        });

    });
    //
});*/

//$(document).ready(function(){
    //ocultar un elemento con ajax
   // $("#nombre").hide();
    //el boton tiene como class=importarDatos
    $(".importarDatos").click(function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        var ruta = form.attr('action');
        var nombreForm = form.attr('name');
        alert(nombreForm)
        var data = new FormData($("#"+nombreForm+"")[0]);
        var token = $("#token").val();
    
        $.ajax({
            url: ruta,
            headers : {"X-CSRF-TOKEN": token},
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
        })

    });
    //
//});