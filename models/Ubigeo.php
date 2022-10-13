<?php

require_once 'Conexion.php';

class Ubigeo extends Conexion{

    //Objeto que almacene la conexión
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    //Método que aprovechará el SPU
    public function getUbigeo($valorBuscado = ''){
        try{
            $comando = $this->acceso->prepare("CALL spu_ubigeos_buscar(?)");
            $comando->execute(array($valorBuscado));

            //Retorno un arreglo asociativo
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

}

?>