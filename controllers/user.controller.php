<?php
require_once '../models/User.php';
if(isset($_GET['op'])){
    $user = new User();

    if($_GET['op']== 'listaUsuarios'){
        $datosObtenidos = $user->listaUsuarios();

        foreach($datosObtenidos as $fila){
            echo"
                <tr>
                    <td>{$fila['user_id']}</td>
                    <td>{$fila['username']}</td>
                    <td>{$fila['first_name']}</td>
                    <td>{$fila['last_name']}</td>
                    <td>{$fila['gender']}</td>
                </tr>
            ";
        }
    }
}
?>