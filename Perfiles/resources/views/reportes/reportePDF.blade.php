<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro de Perfiles</title>
    <!-- Bootstrap core CSS -->
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">
</head>
<body>
<h1>Lista de Perfiles</h1>
<table class="table table-bordered text-center">
    <thead class="thead thead-primary">
    <tr class="tr">
        <th scope="col" width="7%">#</th>
        <th scope="col" width="21%">Estudiantes</th>
        <th scope="col" width="23%">Titulo</th>
        <th scope="col" width="12%">Estado</th>
        <th scope="col" width="12%">Fecha inicio</th>
        <th scope="col" width="12%">Fecha fin</th>
        <th scope="col" width="12%">Modalidad</th>
    </tr>
    </thead>
    <tbody>
    @foreach($perfilesPdf as $perfil)
        <tr class="tr">
            <th scope="row">{{$perfil->id}}</th>
            <td>{{$perfil->estudiantes()->pluck('nombres')->implode('-')}}</td>
            <td>{{$perfil->titulo}}</td>
            <td>{{$perfil->estado}}</td>
            <td>{{$perfil->fecha_ini}}</td>
            <td>{{$perfil->fecha_fin}}</td>
            <td>{{$perfil->modalidad()->pluck('nombre_mod')->implode('-')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>