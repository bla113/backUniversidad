<?php 
class ControladorFactura{

    public static function ctrMostrarFactura($item,$valor){

        $tabla="vista_facturas";
       

        $respuesta=ModleoFactura::mdlMostrarFacturas($tabla,$item,$valor);


        return $respuesta;

    }
}


?>