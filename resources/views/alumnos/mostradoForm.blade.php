@extends('layouts.master')

@section('content')


@if(Session::has('correcto'))

<div class="alert alert-success"> {{ Session::get('correcto') }}</div>

@endif



<form action="/check" method="POST" id="principal">
    @csrf
    @method('PUT')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-bordered table-primary  table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Ciclo</th>
                                    <th>Curso</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Autorizacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" name="rangoAlumnos" value="{{ $arrayAlumnos[0]->id ?? '' }}, {{$arrayAlumnos[count($arrayAlumnos)-1]->id ?? '' }}">
                                @foreach( $arrayAlumnos as $key => $Alumnos )
                                <tr>
                                    <th>{{$Alumnos->id}} </th>
                                    <td>{{$Alumnos->nombre}}</td>
                                    <td>{{$Alumnos->apellidos}}</td>
                                    <td>{{$Alumnos->ciclo}}</td>
                                    <td>{{$Alumnos->curso}}</td>
                                    <td>{{$Alumnos->email}}</td>
                                    <td>{{$Alumnos->telefono}}</td>
                                    <td class="text-center">
                                        @if($Alumnos->autorizacion==true)
                                        <input class="form-check-input position-static" type="checkbox" checked id="autorizacion" name="autorizacion[{{$Alumnos->id}}]">
                                        @else($Alumnos->autorizacion==false)
                                        <input class="form-check-input position-static" type="checkbox" id="autorizacion" name="autorizacion[{{$Alumnos->id}}]">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>




                        <button type="submit" id="actualizar" disabled class="mt-3 mb-3 col col-3 form-inline btn btn-dark">Confirmado</button>

                    </div>
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
</form>



@stop