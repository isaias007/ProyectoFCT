<!DOCTYPE html>
<html>

<head>
    <title>Alumnos</title>
</head>

<body>

    <h1>Alumnos que han autorizado el envio de sus datos </h1>
    <p>{{$Datos["date"]}}</p>

    <table border="1px solid black">
        <thead>


            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Ciclo</th>
                <th>Curso</th>
                <th>Email</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Alumnos as $Alu)
            <tr>

                <th>{{$Alu->id}} </th>
                <td>{{$Alu->nombre}}</td>
                <td>{{$Alu->apellidos}}</td>
                <td>{{$Alu->ciclo}}</td>
                <td>{{$Alu->curso}}</td>
                <td>{{$Alu->email}}</td>
                <td>{{$Alu->telefono}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>