<?php

//Incorporar toda la librería
require_once '../dist/phpqrcode/qrlib.php';
if (isset($_GET['operacion'])){


    if($_GET['operacion'] == 'generarQR'){

        //Forma 1:
        //QRCode::png("Luis Anderson Boada Ramos", "../views/images/miQR.png", "H", 14, 2);

        //Forma 2:
        $textoQR = $_GET['textoQR'];
        $ruta = '../images/';
        $nombreArchivo = 'QRForma2.png';
        $calidad = $_GET['calidad'];
        $tamQR = $_GET['tamQR'];
        $marco = $_GET['marco'];

        $rutaCompleta = $ruta . $nombreArchivo;

        //Creamos un numero aleatorio
        $aleatorio = rand(1,1000);

        QRCode::png($textoQR, $rutaCompleta, $calidad, $tamQR, $marco);
        echo "<img src='{$rutaCompleta}?tmp={$aleatorio}'>";
        
    }
}
?>