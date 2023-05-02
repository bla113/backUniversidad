<?php

class ControladorHorario
{


    static public function ctrMostrarHorarios($item, $valor)
    {


        $tabla = "horario";

        $respuesta = ModeloHorario::mdlMostrotrarHorarios($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCtrcrearHorario()
    {

        if (isset($_POST['nuevoHorario'])) {

            $tabla = 'horario';

            $datos = [
                'horario' => $_POST['nuevoHorario'],
                'estado' => $_POST['estadoHorario']
            ];


            $respuesta = ModeloHorario::mdlCrearHorario($tabla, $datos);





            if ($respuesta == "ok") {

                echo '<script>

            swal({
                  type: "success",
                  title: "El Horario ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "horarios";
                            }
                        })

            </script>';
            } else {

                echo '<script>

            swal({
                  type: "error",
                  title: "El Horario no se guardó correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "horarios";
                            }
                        })

            </script>';
            }
        }
    }

    static public function ctrEditarHorario()
    {

        if (isset($_POST['btnEditarHorario'])) {
      
            $tabla = 'horario';

            $datos = [
                'horario' => $_POST['editarHorario'],
                'estado' => $_POST['estadoHorario'],
                'id' => $_POST['IdHorario']

            ];

            //return $datos;

            $respuesta = ModeloHorario::mdlEditarHorario($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>

            swal({
                  type: "success",
                  title: "El Horario ha sido editado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "horarios";
                            }
                        })

            </script>';
            } else {

                echo '<script>

            swal({
                  type: "error",
                  title: "El Horariono se guardó correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "horarios";
                            }
                        })

            </script>';
            }//Fin de evaluar respuesta del Modelo

        } //Fin de Comprobar POST

    } //Fin de Editar Carrera



    static public function ctrEliminarHorario()
	{

		if (isset($_POST["btnDeleteHorario"])) {

			$tabla = "horario";
			$datos = $_POST["btnDeleteHorario"];



			$respuesta = ModeloHorario::mdlEliminarHorario($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El Horario ha sido eliminada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "horarios";
								}
							})

				</script>';
			}//fin validar respuesta modelo

		}//Fin VErificar si hay post

	}//Fin Borrar Carrera

}//Fin Calse Controlador Carrera
