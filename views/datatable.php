<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container mt-4 mb-4">
        <table class="table table-sm" id="table-users">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Género</th>
                    <th>Operación</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){


        //DATA TABLE NORMAL
        /*
        var tabla = $("#table-users").DataTable();
        tabla.destroy();

        $.ajax({
            url :'../controllers/user.controller.php',
            type:'GET',
            data:{'op':'listaUsuarios'},
            success:function(result){
                $("#table-users tbody").html(result);
                $("#table-users").DataTable({
                    pageLength:25
                });
            }
        });*/


        //DATA TABLE NORMAL CON SERVERSIDE(PAGINACIÓN ASINCRONICA)

        function listarUsuario(){
            var tabla = $("#table-users").DataTable();
            tabla.destroy();

            //Reconstruyendo la tabla
            //En render, data contiene la estructura de la tabla array
            tabla = $("#table-users").DataTable({
                "processing"        :true,
                "order"             :[[0,"desc"]],
                "serverSide"        :true,
                "sAjaxSource"       :'../controllers/user.ss.controller.php',
                "pageLength"        :50,
                "columnDefs"        :[
                    {
                        "data"      : null,
                        "render"    : function(data, type, row){
                            return `<a class='btn btn-sm btn-danger'data-id='${data[0]}' href='#'>Eliminar</a>`;
                        },
                        "targets"   :5
                    }
                ]
            });
        }

        listarUsuario();
    });

</script>
</body>
</html>