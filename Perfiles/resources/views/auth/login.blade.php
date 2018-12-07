@extends('plantilla')
@section('contenido')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <div class="card bg-primary">
                    <img class="img-fluid centrar mt-4" src="{{asset('img/user.png')}}" width="200" height="200">
                    <div class="card-body font-italic" >
                        <h1 class="text-center">Login</h1>
                        <form method="POST" action="{{route('loginPost')}}">
                             {!! csrf_field() !!}<!--siempre añadir el token--->
                            <div class="form-group">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required placeholder="example@email.com">
                                @if ($errors->has('email'))
                                    <span class="alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fa fa-key"></i> Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="*********">
                                @if ($errors->has('password'))
                                    <span class="alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary btn-block">Iniciar sesion</button>
                            </div>
                        </form>
                    </div>
                </div>
<<<<<<< HEAD
                <p class="text-primary"> Eres estudiante y no tienes cuenta? <a class="btn btn-link" href="{{route('register')}}">Registrate</a></p>
=======
                <p class="font-weight-bold mt-2">Eres estudiante y no tienes cuenta? <a class="btn btn-link" href="{{route('register')}}">Registrate</a></p>
>>>>>>> d7cb1791a7afca80985417b6ea6382cf8217a14d
            </div>
        </div>
    </div>
@endsection