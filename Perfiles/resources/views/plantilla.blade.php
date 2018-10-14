<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href={{asset('favicon.ico')}}>

    <title>Registro de Perfiles</title>

    <!-- Bootstrap core CSS -->
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href={{asset('css/footer2.css')}} rel="stylesheet">
    <link href={{asset('css/estilos.css')}} rel="stylesheet">
  </head>

  <body>
      <div class="container-fluid">
          <header class="row">
              <div class="col">
                  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary nav-pills text-white">
                      <div class="col-auto align-content-center">
                          <h5>Registro de Perfiles de Proyectos Finales de Grado</h5>
                      </div>
                      <div class="collapse navbar-collapse" id="navbarCollapse">
                          <ul class="navbar-nav mr-auto ">
                              <li class="nav-item ">
                                  <a class="nav-link btn-primary h5" href="{{route('inicio')}}">Inicio</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link btn-primary h5" href="{{route('login')}}">Iniciar sesion</a>
                              </li>
                          </ul>
                      </div>
                  </nav>
              </div>
          </header>

          <titulo class="row text-white text-center p-3 mb-2">
              <div class="col-2 mt-1">
                  <img src="{{asset('img/umss.png')}}" width="100" height="100">
              </div>
              <div class="col-8">
                  <h1>UNIVERSIDAD MAYOR DE SAN SIMON</h1>
                  <h2>FACULTAD DE CIENCIAS Y TECNOLOGIA</h2>
              </div>
              <div class="col mt-1">
                  <img  src="{{asset('img/fcyt.jpg')}}" width="100" height="100">
              </div>
          </titulo>

         <div class="row">
            <div class="col-9 mt-1 ">
                <main role="main" class="container">
                    @yield("contenido")
                </main>
            </div>

           <div class="col-3 mb-3 mt-2 ">

               <div class="row">
                   <div class="card border-primary col mr-4 mb-3">
                       <div class="card-header border-primary text-primary font-weight-bold">
                           hora del sistema
                       </div>
                       <div class="card-body">
                           <h5 class="card-title">Fecha: {{date('d/m/Y')}}</h5>
                           <h5 class="card-title">Hora: {{date('H:i:s')}}</h5>
                       </div>
                   </div>
               </div>

              <div class="row">
                <div class="card border-primary col mr-4 mb-3">
                  <div class="card-header border-primary text-primary font-weight-bold">
                    Enlaces UMSS
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">UMSS:</h5>
                    <a href="http://www.umss.edu.bo/" class="btn btn-link">http://www.umss.edu.bo/</a>
                    <h5 class="card-title">Websis:</h5>
                    <a href="http://websis.umss.edu.bo" class="btn btn-link">http://websis.umss.edu.bo</a>
                    <h5 class="card-title">FCYT:</h5>
                    <a href="http://fcyt.umss.edu.bo" class="btn btn-link">http://fcyt.umss.edu.bo</a>
                    <h5 class="card-title">CS:</h5>
                    <a href="http://www.cs.umss.edu.bo" class="btn btn-link">http://www.cs.umss.edu.bo</a>
                  </div>
                </div>
              </div>
               <div class="row">
                   <div class="card border-primary col mr-4">
                     <div class="card-header border-primary text-primary font-weight-bold">
                       Proximos Perfiles
                     </div>
                     <div class="card-body">
                     </div>
                   </div>
               </div>
           </div>
         </div>

         <footer class="footer text-white">
             <div class="row">
                 <div class="col-auto ml-2 mt-1">
                     <img  src="{{asset('img/vensoft.jpg')}}" width="50" height="50">
                 </div>
                 <div class="col-4 mt-2">
                         <span class="font-italic">El sistema es Diseño y Desarrollo de la Empresa de software
                             "VENSOFT" Copyright © 2018 . Todos los derechos reservados.
                         </span>
                 </div>
                 <div class="col-3 offset-4 text-center mt-2">
                     <span>Facultad de Ciencias y Tecnología (UMSS).<br></span>
                     <span> Cochabamba - Bolivia</span>
                 </div>
             </div>
         </footer>

      </div>
      <script src={{asset('js/jquery-3.3.1.min.js')}}></script>
      <script src={{asset('js/bootstrap.min.js')}}></script>
  </body>
</html>