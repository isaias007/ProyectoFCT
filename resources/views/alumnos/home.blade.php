@extends('layouts.master')

@section('content')

<!-- Cartas para elegir ir a una tabla o ir a otra -->

<body>
    @can('alumnos-list')
    <div class="row text-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" src="{{asset('images/gestion.png')}}" alt="Card image cap">
                    <h5 class="card-title">Gestionar los alumnos</h5>
                    <a href="/gestion" class="btn btn-primary">Gestion</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" style="height: 398px;" src="{{asset('images/alumnos.jpg')}}" alt="Card image cap">
                    <h5 class="card-title">Editar autorizacion de alumnos</h5>
                    <a href="/check" class="btn btn-primary">Alumnos</a>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('alumnos-delete')
    <div class="row text-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" style="height: 398px;" src="{{asset('images/alumnos.jpg')}}" alt="Card image cap">
                    <h5 class="card-title">Editar autorizacion de alumnos</h5>
                    <a href="/check" class="btn btn-primary">Alumnos</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    @endcan


</body>

@stop