
<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>AD</b>P</span>
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
        <li class="dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="hidden-xs">{{auth()->user()->user_name}}</span>
              </a>
              <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                  @if(auth()->user()->hasRoles(['estudiante']))
                      <a class="dropdown-item" href="{{route('detalleEstudiante',auth()->user()->estudiante()->first())}}">
                          <i class="fa fa-user icon"></i> Perfil </a>
                      <a class="dropdown-item" href="{{route('editarEstudiante',auth()->user()->estudiante()->first())}}">
                          <i class="fa fa-gear icon"></i> Editar cuenta </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{route('logout')}}">
                          <i class="fa fa-power-off icon"></i> Cerrar sesion </a>
                  @else
                      <a class="dropdown-item" href="{{route('detalleUsuario',auth()->user())}}">
                          <i class="fa fa-user icon"></i> Perfil </a>
                      <a class="dropdown-item" href="{{route('editarUsuario',auth()->user())}}">
                          <i class="fa fa-gear icon"></i> Editar cuenta </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{route('logout')}}">
                          <i class="fa fa-power-off icon"></i> Cerrar sesion </a>
                  @endif

              </div>
        </li>
      </ul>
    </div>

  </nav>
</header>