@extends('layouts.master')

@section('content')

<form method="POST">
@csrf
@method('PUT')
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
                                <th>Autorizacion</th>
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
                                <td class="text-center"><input type="checkbox" name="autorizacion" id="autorizacion"></td>
                            </tr>
                        </tbody>
                        
                    </table>
                    <button type="submit" class="btn btn-dark">Actualizar</button>
                </div>
            </div>
        </div>
    </main>
</form>

@stop