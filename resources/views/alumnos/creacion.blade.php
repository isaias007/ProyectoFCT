@extends('layouts.master')

@section('content')
<!-- <main>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="/crear" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group mb-2">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
                    </div>
                    <div class="form-group mb-2">
                        <label for="curso">Curso</label>
                        <input type="text" class="form-control" name="curso" id="curso" placeholder="Curso">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email@gmail.com">
                    </div>
                    <div class="form-group mb-2">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="xxxxxxxxx">
                    </div>
                    <div class="form-check mb-2">
                        <label for="check">Autorizacion</label>
                        <input class="form-check-input position-static" type="checkbox" id="autorizacion" name="autorizacion" value="1">
                    </div> 
                    <button type="submit" class="btn btn-dark">Crear</button>
                </form>
            </div>
        </div>
    </div>
</main> -->
@if ($errors->any())

<div class="row justify-content-center">

    <div class="col-sm-7">

        <div class="fadeIn second alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)

                <li>{{$error}}</li>

                @endforeach

            </ul>

        </div>

    </div>

</div>

@endif
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h4>Crear Alumno</h4>
        </div>

        <!-- Login Form -->
        <form action="/crear" method="POST">
            @csrf
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" placeholder="Nombre">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{old('apellidos')}}" placeholder="Apellidos">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="curso" id="curso" value="{{old('curso')}}" placeholder="Curso">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="ciclo" id="ciclo" value="{{old('ciclo')}}" placeholder="Ciclo">
            </div>
            <div class="form-group mb-2">
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Corre Electronico">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}" placeholder="Telefono">
            </div>

            <input type="submit" class="fadeIn fourth" value="Crearlo">
        </form>

    </div>
</div>


@stop