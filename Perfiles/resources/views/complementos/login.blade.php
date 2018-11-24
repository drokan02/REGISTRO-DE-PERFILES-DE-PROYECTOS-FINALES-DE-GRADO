<div id="modal-wrapper" class="modall"0>
        <div class="modal-contenido animate" >
                <div class="card bg-primary">
                        <img class="img-fluid" src="{{asset('img/user.png')}}" width="200" height="200">
                        <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Cerrar Login">&times;</span>
                        <div class="card-body">
                        <h1>login</h1>
                        <form method="POST" action="{{route('loginPost')}}">
                                {!! csrf_field() !!}<!--siempre añadir el token--->
                                <div class="form-group ">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                                @if ($errors->has('email'))
                                        <span class="alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                                </div>
                                <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                @if ($errors->has('password'))
                                        <span class="alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                                </div>
                                <div class="form-group row">
                                <button type="submit" class="btn btn-primary btn-block">Iniciar sesion</button>
                                <p>Eres estudiante y no tienes cuenta? <a style="color: #fefefe" href="{{route('register')}}">Registrate</a></p>  
                                </div>
                        </form>
                        </div>
                </div>
                
        </div>
</div>