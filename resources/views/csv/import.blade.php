<!DOCTYPE html>

<html>

<head>

    <title>Alumnos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

</head>

<body>



    <div class="container">

        <div class="card bg-light mt-3">

            <div class="card-header">

                Alumnos CSV

            </div>

            <div class="card-body">

                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input id="fichero" type="file" name="file" class="form-control">

                    <br>

                    <button id="importar" disabled class="btn btn-success">Importar Alumnos</button>

                    <a class="btn btn-warning" href="{{ route('export') }}">Exportar Alumnos</a>

                </form>

            </div>

        </div>

    </div>



</body>

<script>
    let examinar = document.getElementById("fichero");

    examinar.addEventListener("change", function() {

        document.getElementById("importar").removeAttribute("disabled");


    })
</script>

</html>