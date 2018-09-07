<!doctype html>
<html lang="en">
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
    <link href={{asset('css/footer.css')}} rel="stylesheet">
    <link href={{asset('css/estilos.css')}} rel="stylesheet">
  </head>

  <body>
      <div class="container-fluid">
          <header class="row">
              <div class="col">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary nav-pills text-white">
                  <div class="col-4 align-content-center">
                    <h5>UNIVERSIDAD MAYOR DE SAN SIMON</h5>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto ">
                      <li class="nav-item ">
                        <a class="nav-link btn-primary h5" href="{{route('inicio')}}">Inicio</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link btn-primary h5" href="#">Perfiles</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn-primary h5" href="#">Tutores</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn-primary h5" href="#">Areas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn-primary h5" href="#">Profesionales</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link btn-primary h5" href="#">Iniciar sesion</a>
                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
          </header>
          <titulo class="row text-white p-3 mb-2">
            <div class="col-3 offset-2">
              <img  src="{{asset('img/fcyt.jpg')}}" width="70" height="70">
            </div>
            <div class="col">
              <h1>FACULTAD DE CIENCIAS Y TECNOLOGIA</h1>
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

         <footer class="footer">
              <div class="row justify-content-center">
                   <span class="text-muted">Facultad de Ciencias y Tecnología (UMSS). Cochabamba - Bolivia</span>
              </div>
         </footer>

      </div>
      <script src={{asset('js/jquery-3.3.1.min.js')}}></script>
      <script src={{asset('js/bootstrap.min.js')}}></script>
  </body>
</html>