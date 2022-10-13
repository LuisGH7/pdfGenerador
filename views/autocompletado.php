<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"><body>
    <div class="container mt-2">
        <h3>Buscador asíncrono</h3>
        <a href="../">Regresar</a>
        <hr>
        <form action="" id="formulario-busqueda" autocomplete="off">
            <div class="form-group">
                <label for="">Escriba el Ubigeo <span id="totaldatos"></span></label>
                <input class ="form-control mt-1" id="ubigeo"type="search">
            </div>
            <small>Ubigeo: <span id="elubigeo"></span></small>
        </form>
    </div>
</body>
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<!-- Autocomplete -->
<script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>

<script>
    $(document).ready(function(){

        $("#formulario-busqueda").submit(function(event){
            event.preventDefault();
        });
        //Busqueda usando archivo platno JSON
        /*
            $("#ubigeo").autoComplete({
                resolverSettings:{
                    url:'js/datatest.json'
                }
            });
        */
        //Busqueda usando Ajax
        $("#ubigeo").autoComplete({
            resolver: 'custom',
            minLength: 1,
            noResultsText:'No encontrado',
            events: {
                search: function(query, callback){
                    $.ajax({
                        url: '../controllers/ubigeo.controller.php',
                        type:'GET',
                        dataType:'JSON',
                        data:{'operacion' : 'getUbigeo', 'valorBuscado' : query}
                    }).done(function(res){
                        //ress = response(respuesta obtenida, BLOQUE);
                        callback(res);
                        $("#totaldatos").html(res.length);
                        //console.log(res);
                    });
                }
            }
        });

        //Identificando elemento seleccionado
        $("#ubigeo").on("autocomplete.select", function(event, item){
            //console.log(item['ubigeo']);
            $("#elubigeo").html(item['ubigeo']);
            $("#totaldatos").html("");

        });

        $("#ubigeo").keyup(function(e){
            if($(this).val() == ""){
                $("#elubigeo").html("");
                $("#totaldatos").html("");
            }
        });
        
    });
</script>
</html>