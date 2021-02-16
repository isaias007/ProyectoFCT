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
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Desarrollo de aplicaciones web</td>
                        <td>markotto@email.com</td>
                        <td>692054063</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>


@stop