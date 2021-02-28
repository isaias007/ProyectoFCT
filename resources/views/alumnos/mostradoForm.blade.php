@extends('layouts.master')

@section('content')

<form action="/check" method="POST">
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
                                        @if($Alumnos->autorizacion==false)
                                        <input class="form-check-input position-static" type="checkbox" id="autorizacion" name="autorizacion[{{$Alumnos->id}}]">
                                        @else($Alumnos->autorizacion==true)
                                        <input class="form-check-input position-static" type="checkbox" checked id="autorizacion" name="autorizacion[{{$Alumnos->id}}]">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <!-- <form method="GET" action="{{ url('/check') }}">
                            <select class="form-select" name="filtrado" id="filtrado">
                                <option value="Desarrollo de aplicaciones web">Desarrollo de aplicaciones web</option>
                                <option value="Auxiliar de enfermeria">Auxiliar de enfermeria</option>
                                <option value="Comercio y Marketing">Comercio y Marketing</option>
                            </select>

                            <button type="submit" class="mt-3 mb-3 col col-3 form-inline btn btn-secondary">Filtrar</button>
                        </form> -->


                        <form class='form-inline' action="{{ url('/check') }}" method="GET">

                            <input type="search" class="form-control " name="ciclo" id="ciclo" placeholder="Buscar por ciclo" value="{{$ciclo}}">

                            <button class="btn btn-secondary" type="submit">Buscar</button>

                        </form>



                        <button type="submit" class="mt-3 mb-3 col col-3 form-inline btn btn-dark">Actualizar</button>

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