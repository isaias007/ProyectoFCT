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
                        
                        
                        @if($Alumnos->autorizacion==false)
                        <tr>
                            <th class="bg bg-danger">{{$Alumnos->id}} </th>
                            <td>{{$Alumnos->nombre}}</td>
                            <td>{{$Alumnos->apellidos}}</td>
                            <td>{{$Alumnos->curso}}</td>
                            <td>{{$Alumnos->email}}</td>
                            <td>{{$Alumnos->telefono}}</td>
                        </tr>
                        @else($Alumnos->autorizacion==true)
                        <tr>
                            <th class="bg bg-success">{{$Alumnos->id}} </th>
                            <td>{{$Alumnos->nombre}}</td>
                            <td>{{$Alumnos->apellidos}}</td>
                            <td>{{$Alumnos->curso}}</td>
                            <td>{{$Alumnos->email}}</td>
                            <td>{{$Alumnos->telefono}}</td>
                        </tr>
                        @endif



                        
                    </tbody>
                    @endforeach
                </table>
                <a class="btn btn-warning" href="/generate-pdf">Generar el pdf</a>
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