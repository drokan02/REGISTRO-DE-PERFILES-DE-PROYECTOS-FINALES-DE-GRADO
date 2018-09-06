<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href={{asset('favicon.ico')}}>

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href={{asset('css/footer.css')}} rel="stylesheet">
    <link href={{asset('css/estilos.css')}} rel="stylesheet">
  </head>

  <body>

        <header class="row">
            <div class="col">
              <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary nav-pills text-white">
                <div class="col-4 align-content-center">
                  <h5>UNIVERSIDAD MAYOR DE SAN SIMON</h5>
                </div>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav mr-auto ">
                    <li class="nav-item ">
                      <a class="nav-link  btn-primary h5" href="{{route('inicio')}}">Inicio</a>
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
                  </ul>
                </div>
              </nav>
            </div>
        </header>
        <titulo class="row text-white p-3 mb-2">
          <div class="col offset-1">
            <img class="fondo" src="{{asset('img/fcyt.jpg')}}" width="70" height="70">
          </div>
          <div class="col">
            <h2>FACULTAD DE CIENCIAS Y TECNOLOGIA</h2>
          </div>
        </titulo>

       <div class="row">
         <div class="col">
           <main role="main" class="container">
             @yield("contenido")
           </main>
         </div>
       </div>

        <footer class="footer">
          <div class="container">
            <div class="row justify-content-center">
                 <span class="text-muted">Facultad de Ciencias y Tecnología (UMSS). Cochabamba - Bolivia</span>
            </div>
          </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>