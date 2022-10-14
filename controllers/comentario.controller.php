<?php
require_once '../models/Comentario.php';

if(isset($_GET['op'])){
$comentario = new Comentario;

    if ($_GET['op'] ==  'registrarComentario'){
        $comentario->registrarComentario($_GET['comentario']);
    }

    if ($_GET['op'] ==  'listarComentario'){
        $datos = $comentario->listarComentario();

        echo json_encode($datos);
    }
}
?>