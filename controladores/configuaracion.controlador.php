<?php

class ControladorConfiguracion{

    static public function ctrGuardarConfiguracion(){

        if(isset($_POST['btnGuardarU'])){

            $tabla="configuracion";


            $datos=array(
                "nombre_empresa"=>$_POST['nuevoNombre'],
                "cedula"=>$_POST['nuevoCedula'],
                "correo" =>$_POST['nuevoCorreo'],
                "telefono"=>$_POST['nuevoTelefono'],
                "celular" =>$_POST['nuevoCelular'],
                "provincia"=>$_POST['nuevaProvincia'],
                "canton" =>$_POST['nuevoCanton'],
                "distrito" =>$_POST['nuevoDistrito'],
                "otras_senas" =>$_POST['nuevaSenas'],
                "moneda" =>$_POST['moneda'],
                "simbolo" =>$_POST['simboloMoneda'],   
                "costo_creditos" =>floatval($_POST['costoCredito']) 
            );
            //return $datos;

            $respuesta=ModeloConfiguracion::mdlCrearConfiguracion($tabla,$datos);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                      type: "success",
                      title: "Los datos de la Univesidad han sido guardados correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "configuracion";

                                }
                            })

                </script>';

            }


            return  $datos;
            


        }



    }
    static public function ctrMostrarConfiguracion(){

        $tabla="configuracion";

        $respuesta=ModeloConfiguracion::mdlMostrarConfiguracion($tabla);

        return $respuesta;
    }


}