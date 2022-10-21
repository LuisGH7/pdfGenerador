<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alertas</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <button type="button" class="btn btn-primary" id="boton-toast">Show live toast</button>

        <div aria-live="polite" aria-atomic="true" style="position: relative;">
            <div class="toast" style="position: absolute; top: 0; right: 0;">
                <div class="toast-header">
                    <img src="..." class="rounded mr-2" alt="...">
                    <strong class="mr-auto">Riot Games</strong>
                    <small>Blitzcrank</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
            </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function(){

            //configuraciones de TOAST
            $(".toast").toast({
                delay: 2000
            });

            //funcion que pide un texto para mostrar en el TOAST
            function mostrarToast(texto){
                $(".toast-body").html(texto);
                $(".toast").toast('show');
            }

            //Enviamos un mensaje en la funcion mostrarToast
            $("#boton-toast").click(function(){
                mostrarToast("LOL Player Detected");
            });

            //evento al finalizar el toast
            $(".toast").on('hide.bs.toast', function(){
                console.log("El Toast se murio");
            });

        });
    </script>
</body>
</html>