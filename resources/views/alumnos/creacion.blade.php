@extends('layouts.master')

@section('content')
<main>
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
</main>


@stop