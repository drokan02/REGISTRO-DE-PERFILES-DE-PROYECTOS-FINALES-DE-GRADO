<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administracion de Perfiles</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
    <link rel="stylesheet" href={{asset('css/font-awesome.css')}}>
    <link rel="stylesheet" href={{asset('css/AdminLTE.min.css')}}>
    <link rel="stylesheet" href={{asset('css/_all-skins.min.css')}}>
    <link href={{asset('css/estilos.css')}} rel="stylesheet">
    <link rel="apple-touch-icon" href={{asset('img/apple-touch-icon.png')}}>
    <link rel="shortcut icon" href={{asset('img/favicon.ico')}}>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <!--BARRA DEL ENCABEZADO-->
      @include('layouts.header')
      <!-- BARRA DE MENU -->
      @include('layouts.sidebar')
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>RPPG</b></span>
          <!--------------------- LOGO DEL SISTEMA --------------------------------->
          <span class="logo-lg"><b>ADMINISTRACION</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- CUENTA DEL USUARIO -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">USUARIO</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                      <a href="#" > Editar cuenta<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </li>
                    <li>
                      <a href="#"> Cerrar sesion <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </li>
                </ul>
              </li>
            </ul>
          </div>

        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- Menu -->
          <ul class="sidebar-menu">
            <!-- revisar   -->
            <li class="header"></li>

            <!-- indice inicio -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Inicio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href=" {{route('menu')}} "><i class="fa fa-caret-right" aria-hidden="true"></i> Menu Principal</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Guia par el llenado <br> de formulario </a>
                </li>
                <li>
                  <a href="{{route('carreras')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Carreras</a>
                </li>
              </ul>
            </li>

            <!-- menu AREAS -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <span> Areas </span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('registrarArea')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Area</a></li>
                <li><a href="{{route('Areas')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Area</a></li>
                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Subareas</a></li>
                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Subareas</a></li>
              </ul>
            </li>

            <!-- menu MODALIDADES -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <span> Modalidades </span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li><a href="{{route('registrarmodalidad')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Modalidad</a></li>
               <li><a href="{{route('modalidad')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Modalidad</a></li>
              </ul>
            </li>

            <!-- Menu Usuarios-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('crearUsuario')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Nuevo Usuario</a></li>
                <li><a href="{{route('usuarios')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Usuarios</a></li>
                <li><a href="{{route('roles')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Roles de Usuarios</a></li>
              </ul>
            </li>

            <!-- Menu DOCENTES-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                <span>Docentes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Docente</a></li>
                <li><a href="{{route('docentes')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar docetes</a></li>
              </ul>
            </li>

            <!-- Menu PROFESIONALES-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span>Profesionales</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Profesional</a></li>
                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Profesionales</a></li>
                <li><a href="{{route('registrotutor')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Tutor</a></li>
                <li><a href="{{route('listarTutor')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Tutor</a></li>
              </ul>
            </li>



            <!-- Menu ESTUDIANTES-->
             <li class="treeview">
              <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> <span>Estudiantes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar</a></li>
                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

       <!--Contenido-->
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> @yield('titulo')</h3>
                      <!--  Revisar --->
                      <div class="box-tools pull-right"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                        <!--Contenido-->
                        @yield("contenido")
                        <!--Fin Contenido-->
                    </div>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->



        </section><!-- /.content -->
      </div>
    </div>
      <!--Fin-Contenido-->

      <!--PIE DE PAGINA-->
      <footer class="main-footer">
        
      </footer>

    <script src={{asset('js/popper.min.js')}}></script>

    <script src={{asset('js/jQuery-3.3.1.min.js')}}></script>

    <script src={{asset('js/bootstrap.min.js')}}></script>

    <script src={{asset('js/app.min.js')}}></script>
    
    <script src={{asset('js/parsley.min.js')}}></script>

    <script src={{asset('js/jQuery.dataTable.js')}}></script>
  </body>
</html>
