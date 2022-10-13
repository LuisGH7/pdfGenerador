<?php
require_once '../models/Ubigeo.php';

//$_REQUEST[]
if (isset($_GET['operacion'])){

    $ubigeo = new Ubigeo();

    if($_GET['operacion'] == 'getUbigeo'){

        $datos = $ubigeo->getUbigeo($_GET['valorBuscado']);
        echo json_encode($datos);
        
    }
}


?>