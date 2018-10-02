<aside class="main-sidebar" >
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
        <li class="treeview {{ request()->segment(1) == 'areas'? 'active open':'' }}">
          <a href="#">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
            <span> Areas </span>
             <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="{{ request()->routeIs('registrarArea')? 'active':'' }}">
              <a href="{{route('registrarArea')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Area</a>
            </li>
            <li class="{{ request()->routeIs('Areas')? 'active':'' }}">
              <a href="{{route('Areas')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Area</a>
            </li>
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
           <li><a href="{{route('listaModalidad')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Modalidad</a></li>
          </ul>
        </li>

        <!-- Menu Usuarios-->
        <li class="treeview {{ request()->segment(1) == 'usuarios'? 'active open':'' }}">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i> <span>Usuarios</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
              <li class="{{ request()->routeIs('crearUsuario')? 'active':'' }}">
                  <a href="{{route('crearUsuario')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Nuevo Usuario</a>
              </li>
              <li class="{{ request()->routeIs('usuarios')? 'active':'' }}">
                  <a href="{{route('usuarios')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Usuarios</a>
              </li>
              <li class="{{ request()->routeIs('roles')? 'active':'' }}">
                  <a href="{{route('roles')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Roles de Usuarios</a>
              </li>
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
            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar docetes</a></li>
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