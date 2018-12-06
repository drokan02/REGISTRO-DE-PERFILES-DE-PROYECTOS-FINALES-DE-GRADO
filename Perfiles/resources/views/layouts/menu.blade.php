<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administracion de Perfiles</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href={{asset('css/estilos.css')}}>
    <link rel="stylesheet" href={{asset('css/alertify.min.css')}}>
    <link rel="stylesheet" href={{asset('css/default.min.css')}}>
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}} >
    <link rel="stylesheet" href={{asset('css/font-awesome.min.css')}}>
    <link rel="stylesheet" href={{asset('css/AdminLTE.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/gijgo.min.css')}} >
    <link rel="stylesheet" href={{asset('css/_all-skins.min.css')}}>
    <link rel="apple-touch-icon" href={{asset('img/apple-touch-icon.png')}}>
    <link rel="shortcut icon" href={{asset('img/favicon.ico')}}>
    <link href={{asset("sel/component-chosen.css")}} rel="stylesheet">
    <script src={{asset("sel/jquery-3.3.1.slim.min.js")}} ></script>
    <script src={{asset('sel/popper.min.js')}}></script>
    <!--<script src={{asset("sel/chosen.jquery.min.js")}}></script>-->
    
    
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
      @include('layouts.header')
    <div class="wrapper">
      
      <!--BARRA DEL ENCABEZADO-->
      
      <!-- BARRA DE MENU -->
      @include('layouts.sidebar')
       <!--Contenido-->
   
      <div class="content-wrapper">
        <section class="content contenidoP" style="padding-top: 80px">
          <div class="row">
            <div class="col-md-12">
              
              <div class="box">
                <div class="contenido">
                  <div class="box-header with-border text-center ">
                    <h4> <b>@yield('titulo')</b></h4>
                        <!--  Revisar --->
                  </div>
                  <!-- /.box-header -->
                  
                  <div class="box-body ">
                    
                    <div class="row">
                      <div class="col-sm-12">
                          <!--Contenido-->
                          @yield("contenido")
                          <!--Fin Contenido-->
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->



        </section><!-- /.content -->
      </div>
    </div>
     
      <script src={{asset('js/ajax.js')}}></script>
    <script src={{asset('js/jquery-3.3.1.min.js')}}></script>
    <script src={{asset('js/gijgo.min.js')}} ></script>
    <script src={{asset('js/bootstrap.min.js')}}></script>
    <script src={{asset('js/alertify.min.js')}}></script>
    <script src={{asset('js/parsley.min.js')}}></script>
    <script src={{asset('js/app.min.js')}}></script>
    
  </body>
</html>
