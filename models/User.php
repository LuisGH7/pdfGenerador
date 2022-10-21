<?php

//Formato tradicional
require_once 'Serverside.php';

class User extends Conexion{
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    public function listaUsuarios(){
        try{
            $consulta = $this->acceso->prepare("SELECT user_id, username, first_name, last_name, gender FROM user_details LIMIT 65000");
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }
}
?>