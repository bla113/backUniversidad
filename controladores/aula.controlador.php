<?php

class ControladorAula
{


    static public function ctrMostrarAulas($item, $valor)
    {


        $tabla = "aula";

        $respuesta = ModeloAula::mdlMostrotrarAulas($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCtrcrearAula()
    {

        if (isset($_POST['nuevoAula'])) {

            $tabla = 'aula';

            $datos = [
                'aula' => $_POST['nuevoAula'],
                'estado' => $_POST['estadoAula']
            ];


            $respuesta = ModeloAula::mdlCrearAula($tabla, $datos);





            if ($respuesta == "ok") {

                echo '<script>

            swal({
                  type: "success",
                  title: "El Aula ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "aulas";
                            }
                        })

            </script>';
            } else {

                echo '<script>

            swal({
                  type: "error",
                  title: "El Aula no se guardó correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "aulas";
                            }
                        })

            </script>';
            }
        }
    }

    static public function ctrEditarAula()
    {

        if (isset($_POST['btneditaAula'])) {
      
            $tabla = 'aula';

            $datos = [
                'aula' => $_POST['editarAula'],
                'estado' => $_POST['estadoAula'],
                'id' => $_POST['IdAula']

            ];

           // return $datos;

            $respuesta = ModeloAula::mdlEditarAula($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>

            swal({
                  type: "success",
                  title: "El Aula ha sido editado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "aulas";
                            }
                        })

            </script>';
            } else {

                echo '<script>

            swal({
                  type: "error",
                  title: "El Aula se guardó correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "aulas";
                            }
                        })

            </script>';
            }//Fin de evaluar respuesta del Modelo

        } //Fin de Comprobar POST

    } //Fin de Editar aulas


    static public function ctrEliminarAula()
	{

		if (isset($_POST["btnDeleteAula"])) {

			$tabla = "aula";
			$datos = $_POST["btnDeleteAula"];



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

								window.location = "aulas";
								}
							})

				</script>';
			}//fin validar respuesta modelo

		}//Fin VErificar si hay post

	}//Fin Borrar Carrera

}//Fin Calse Controlador Carrera
