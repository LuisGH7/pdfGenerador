<?php
require_once 'Conexion.php';

class Comentario extends Conexion{

    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    public function registrarComentario($data = ''){
        try{
            $comando = $this->acceso->prepare("CALL spu_comentario_registrar(?)");
            $comando->execute(array($data));

        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function listarComentario(){
        try{
            $comando = $this->acceso->prepare("CALL spu_comentario_listar()");
            $comando->execute();
            return $comando->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $error){
            die($error->getMessage());
        }
    }

}
?>