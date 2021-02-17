@extends('layouts.master')

@section('content')
<main>
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="table table-bordered table-primary  table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Curso</th>
                            <th>Email</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $arrayAlumnos as $key => $Alumnos )
                        <tr>
                            <th>{{$Alumnos->id}} </th>
                            <td>{{$Alumnos->nombre}}</td>
                            <td>{{$Alumnos->apellidos}}</td>
                            <td>{{$Alumnos->curso}}</td>
                            <td>{{$Alumnos->email}}</td>
                            <td>{{$Alumnos->telefono}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-5">

        </div>
        <div class="col-2">
            {{$arrayAlumnos->links()}}
        </div>

        <div class="col-5">

        </div>

    </div>

</main>


@stop