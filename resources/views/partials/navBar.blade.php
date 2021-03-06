<nav class="navbar navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="/gestion" alt=""><img src="{{asset('images/logoMajada.png')}}" style="margin-left: 20px; width: 70px; height: 50px;" alt="Logo de majada"></a>
    @if(Request::is('check'))
    <form class='form  col col-5' action="{{ url('/check') }}" method="GET">

        <div class="row">
            <div class="col col-5">
                <input type="search" class="form-control" name="ciclo" id="ciclo" placeholder="Buscar por ciclo" value="{{$ciclo}}">
            </div>
            <div class="col col-2"></div>
            <div class="col col-5">
                <input type="search" class="form-control" name="curso" id="curso" placeholder="Buscar por curso" value="{{$curso ?? '' }}">
            </div>
        </div>




        <button style="display: none;" class="btn btn-secondary" type="submit">Buscar</button>
    </form>

    @endif

    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            @can('alumnos-list')
            <li class="nav-item active ml-auto mr-3">
                <a class="nav-link" href="/gestion">Tabla de alumnos</a>
            </li>
            @endcan
            @can('alumnos-edit')
            <li class="nav-item ml-auto mr-3">
                <a class="nav-link" href="/check">Tabla de alumnos para profesor</a>
            </li>
            @endcan
            @can('alumnos-create')
            <li class="nav-item ml-auto mr-3">
                <a class="nav-link" href="/crear">Agregacion de alumno en la base de datos</a>
            </li>
            @endcan
            <li class="mt-3 nav-item ml-auto mr-3">
                @can('role-create')
                <a href="{{ url('/users') }}" class="btn btn-1 ml-2">Usuarios</a>
                @endcan
                @can('role-create')
                <a href="{{ url('/roles') }}" class="btn btn-1 ml-2">Roles</a>
                @endcan
                <a href="" data-target="#modal-logOut" data-toggle="modal" class="btn btn-2 ml-2">LogOut ({{Auth::user()->name}})</a>

            </li>

        </ul>
    </div>
</nav>
@include('modal.logOut')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>