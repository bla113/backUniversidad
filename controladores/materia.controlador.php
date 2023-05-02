<?php


class ControladorMateria
{


    static public function ctrMostrarMateria($item,$valor)
    {
        $tabla = "materia";

        $respueta = ModeloMateria::mdlMostrarMateria($tabla,$item,$valor);

        return $respueta;
    } //fin metodo mostrar materia

    static public function ctrCrearMateria()
    {

        if (isset($_POST['btnCrearMateria'])) {


            $tabla = "materia";

            $requisitos = $_POST['nuevoRequisito'];

           $requisitosE=json_encode($requisitos);


          
            
            $datos=[
                    'materia'=>$_POST['nuevaMateria'],
                    'creditos'=>$_POST['nuevoCredito'],
                    'id_cutrimestre'=>$_POST['nuevoCuatrimestre'],
                    'requisitos'=>$requisitosE,
                    'codigo'=>$_POST['nuevoCodigo']
                ];
            
            //return $datos;

            $respuesta=ModeloMateria::mdlCrearMateria($tabla,$datos);

            if ($respuesta == "ok") {

                echo '<script>

                    swal({

                        type: "success",
                        title: "¡La Materia ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "materias";

                        }

                    });
                

                    </script>';
            }


            


        }
    } //fin metodo crear Materia


    static public function ctrEditarMateria()
    {
    } //Fin metodo editar materia

    static public function ctrEliminarMateria()
    {
    } //Fin metodo Eliminar materia

    
}//Fin Clase Materia