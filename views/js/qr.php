<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generando QR</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"><body>

</head>
<body>
    
    
    <div class="container mt-3">
        <h3>Generador de QR</h3>
        <a href="../../" class ="btn btn-primary">Regresar</a>
        <hr>

        <form action="">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="">Ingrese texto</label>
                    <input class ="form-control mt-1" id="textoQR">
                </div>
                <div class="col-md-2 form-group">
                    <label for="">Calidad:</label>
                    <select class ="form-control"name="" id="calidad">
                        <option value="L">Baja</option>
                        <option value="M" selected>Media</option>
                        <option value="H">Alta</option>
                        <option value="B">Superior</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label for="">Tamaño QR:</label>
                    <select class ="form-control"name="" id="tamQR">
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7" selected>7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label for="">Tamaño marco:</label>
                    <select class ="form-control"name="" id="marco">
                        <option value="1">1</option>
                        <option value="2" selected>2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label for="">Generar QR:</label>
                    <button type="button" class="btn btn-primary " id="generador">Generar</button>
                </div>
            </div>
            <hr>
            <div id="contenedor"class="capa-qr">

            </div>
        </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</body>

<script>
    $(document).ready(function(){
        function generarQR(){
            $.ajax({
                url: '../../controllers/qr.controller.php',
                type: 'GET',
                data: {
                    'operacion' :'generarQR',
                    textoQR     : $("#textoQR").val(),
                    calidad     : $("#calidad").val(),
                    tamQR       : $("#tamQR").val(),
                    marco       : $("#marco").val(),
                },
                success: function(result){
                    $("#contenedor").html(result);
                    console.log(result);
                }
            });

        }

        $("#generador").click(generarQR);
    });
</script>

<style>
    .capa-qr{
        background-color: red;
        padding:22px;
        text-align:center
    }
</style>
</html>