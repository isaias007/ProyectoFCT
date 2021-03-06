@extends('layouts.master')

@section('content')

<!-- Flash message para cuando se realiza el CSV -->

@if(Session::has('realizado'))

<div class="alert alert-success"> {{ Session::get('realizado') }}</div>

@endif

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
                            <th>Ciclo</th>
                            <th>Email</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tabla de todos los alumnos de el arrayAlumnos -->
                        @foreach( $arrayAlumnos as $key => $Alumnos )


                        @if($Alumnos->autorizacion==false)
                        <tr>
                            <th class="bg bg-danger">{{$Alumnos->id}} </th>
                            <td>{{$Alumnos->nombre}}</td>
                            <td>{{$Alumnos->apellidos}}</td>
                            <td>{{$Alumnos->curso}}</td>
                            <td>{{$Alumnos->ciclo}}</td>
                            <td>{{$Alumnos->email}}</td>
                            <td>{{$Alumnos->telefono}}</td>
                        </tr>
                        @else($Alumnos->autorizacion==true)
                        <tr>
                            <th class="bg bg-success">{{$Alumnos->id}} </th>
                            <td>{{$Alumnos->nombre}}</td>
                            <td>{{$Alumnos->apellidos}}</td>
                            <td>{{$Alumnos->curso}}</td>
                            <td>{{$Alumnos->ciclo}}</td>
                            <td>{{$Alumnos->email}}</td>
                            <td>{{$Alumnos->telefono}}</td>
                        </tr>
                        @endif




                    </tbody>
                    @endforeach
                </table>
                <a class="btn btn-warning" href="/generate-pdf">Generar el pdf</a>
                <a class="btn btn-success" href="/importExportView">CSV</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-5">

        </div>
        <div class="col-2">
            {{$arrayAlumnos ?? ''->links()}}
        </div>

        <div class="col-5">

        </div>

    </div>

</main>


@stop