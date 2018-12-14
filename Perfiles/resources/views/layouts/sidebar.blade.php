<aside class="main-sidebar"  style="position: fixed;" >
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar ">
    <!-- Sidebar user panel -->
              
    <!-- Menu -->
    <ul class="sidebar-menu">
      <!-- indice inicio -->
      <li class="treeview {{ request()->segment(1) == 'inicio'? 'active open':'' }}">
        <a href="#">
          <i class="fa fa-home" aria-hidden="true"></i>
          <span>Inicio</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href=" {{route('menu')}} "><i class="fa fa-caret-right" aria-hidden="true"></i> Menu Principal</a>
            </li>
            <li class="{{ request()->routeIs('guiaFormulario')? 'active':'' }}">
                <a href="{{route('guiaFormulario')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Guia par el llenado <br> de formulario </a>
            </li>
            <li class="{{ request()->routeIs('gestiones')? 'active':'' }}">
                <a href="{{route('gestiones')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Gestiones</a>
            </li>
            @if(auth()->user()->hasPermisos(['carreras']))
                <li class="{{ request()->routeIs('carreras')? 'active':'' }}">
                    <a href="{{route('carreras')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Carreras</a>
                </li>
                <li class="{{ request()->routeIs('importarCarreras')? 'active':'' }}">
                    <a href="{{route('importarCarreras')}}"><i class="fa fa-upload" aria-hidden="true"></i>Importar Carreras</a>
                </li>
             @endif
        </ul>
      </li>

        @if(auth()->user()->hasPermisos(['reportes']))
            <li class="treeview {{ request()->segment(1) == 'reportes'? 'active open':'' }}">
                <a href="#">
                    <i class="fa fa-map" aria-hidden="true"></i><span>Reportes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->routeIs('generar')? 'active':'' }}">
                        <a href="{{route('generar')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Generar Reportes</a>
                    </li>
                </ul>
            </li>
        @endif


    <!-- menu AREAS -->
      <li class="treeview {{ request()->segment(1) == 'areas'? 'active open':'' }}">
          <a href="#">
              <i class="fa fa-file-text-o" aria-hidden="true"></i>
              <span> Areas </span>
              <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
              @if(auth()->user()->hasPermisos(['areas']))
                  <li class="{{ request()->routeIs('subirAreas')? 'active':'' }}">
                      <a href="{{route('subirAreas')}}"><i class="fa fa-upload" aria-hidden="true"></i>Importar datos de Excel</a>
                  </li>
                  <li class="{{ request()->routeIs('registrarArea')? 'active':'' }}">
                      <a href="{{route('registrarArea')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Area</a>
                  </li>
              @endif
              <li class="{{ request()->routeIs('Areas')? 'active':'' }}">
                  <a href="{{route('Areas')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Area</a>
              </li>
          </ul>
      </li>

        @if(auth()->user()->hasPermisos(['roles']))
            <!-- menu Roles-->
            <li class="treeview  {{ request()->segment(1) == 'roles'? 'active open':'' }}">
                <a href="#">
                    <i class="fa fa-pencil" aria-hidden="true"></i> <span>Roles del Sistema</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->routeIs('crearRol')? 'active':'' }}">
                        <a href="{{route('crearRol')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar un nuevo Rol</a>
                    </li>
                    <li class="{{ request()->routeIs('roles')? 'active':'' }}">
                        <a href="{{route('roles')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Lista de Roles del Sistema</a>
                    </li>
                </ul>
            </li>
        @endif
            <!-- menu MODALIDADES -->
            <li class="treeview {{ request()->segment(1) == 'modalidad'? 'active open':'' }}">
                <a href="#">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span> Modalidades </span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(auth()->user()->hasPermisos(['modalidades']))
                        <li class="{{ request()->routeIs('importarModalidad')? 'active':'' }}">
                            <a href="{{route('importarModalidad')}}"><i class="fa fa-upload" aria-hidden="true"></i>Importar Modalidades</a>
                        </li>
                        <li class="{{ request()->routeIs('registrarmodalidad')? 'active':'' }}">
                            <a href="{{route('registrarmodalidad')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Modalidad</a>
                        </li>
                    @endif
                    <li class="{{ request()->routeIs('modalidad')? 'active':'' }}">
                        <a href="{{route('modalidad')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Modalidad</a>
                    </li>
                </ul>
            </li>
      <!-- Menu Usuarios-->
      @if(auth()->user()->hasPermisos(['users']))
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
                </ul>
            </li>
        @endif

            <!-- Menu DOCENTES-->
            <li  class="treeview {{ request()->segment(1) == 'docentes'? 'active open':'' }}">
                <a href="#">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Docentes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(auth()->user()->hasPermisos(['docentes']))
                        <li class="{{ request()->routeIs('registrarDocente')? 'active':'' }}">
                            <a href="{{route('registrarDocente')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Docente</a>
                        </li>
                    @endif
                    <li class="{{ request()->routeIs('Docentes')? 'active':'' }}">
                        <a href="{{route('Docentes',['carrera_id'=>1])}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar docentes</a>
                    </li>
                </ul>
            </li>


            <!-- Menu PROFESIONALES-->
            <li class="treeview {{ request()->segment(1) == 'profesionales'? 'active open':'' }}">
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Profesionales</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(auth()->user()->hasPermisos(['profesionales']))
                        <li class="{{ request()->routeIs('registroProfesional')? 'active':'' }}">
                            <a href="{{route('registroProfesional')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Registrar Profesional</a>
                        </li>
                    @endif
                    <li class="{{ request()->routeIs('listarProfesionales')? 'active':'' }}">
                        <a href="{{route('listarProfesionales')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Listar Profesional</a>
                    </li>
                </ul>
            </li>

        @if(auth()->user()->hasPermisos(['estudiantes']))
      <!-- Menu ESTUDIANTES-->
       <li class="treeview">
        <a href="#">
          <i class="fa fa-users" aria-hidden="true"></i> <span>Estudiantes</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('importarEstudiantes')}}"><i class="fa fa-upload" aria-hidden="true"></i>Importar Estudiantes</a></li>
          <li><a href="{{route('estudiantes')}}"><i class="fa fa-caret-right" aria-hidden="true"></i> Lista Estudiantes</a></li>
        </ul>
      </li>
      @endif
        <!-- Menu Perfiles-->
        <li class="treeview {{ request()->segment(1) == 'perfil'? 'active open':'' }}">
            <a href="#">
                <i class="fa fa-book" aria-hidden="true"></i> <span>Perfiles</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                @if(auth()->user()->hasPermisos(['registrar_perfil']))
                    <li class="">
                        <a href="{{route('nuevoPerfil')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Registrar Perfil</a>
                    </li>
                @endif
                <li class="">
                    <a href="{{route('perfiles')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Lista Perfiles</a>
                </li>
            </ul>
        </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>