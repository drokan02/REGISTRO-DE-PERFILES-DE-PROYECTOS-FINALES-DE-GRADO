<div class="container col-sm-4">
    @if(count($errors))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss='alert' style="color: white">
                &times;
            </button>
            <h5 class="text-center"><u><b> TIENE LOS SIGUIENTES ERRORES</b></u></h5>
            <ul >
                   
                @foreach ($errors-> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
    @endif
</div>