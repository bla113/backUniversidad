<?php

class ControladorCarrera
{


    static public function ctrMostrarCarreras($item, $valor)
    {


        $tabla = "carrera";

        $respuesta = ModeloCarrera::mdlMostrotrarCarrera($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCtrcrearCarrera()
    {

        if (isset($_POST['nuevaCarrera'])) {

            $tabla = 'carrera';

            $datos = [
                'carrera' => $_POST['nuevaCarrera'],
                'estado' => $_POST['estadoCarrera']
            ];


            $respuesta = ModeloCarrera::mdlCrearCarrera($tabla, $datos);





            if ($respuesta == "ok") {

                echo '<script>

            swal({
                  type: "success",
                  title: "La carrera ha sido guardada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "carrera";
                            }
                        })

            </script>';
            } else {

                echo '<script>

            swal({
                  type: "error",
                  title: "La carrera no se guardó correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "carrera";
                            }
                        })

            </script>';
            }
        }
    }

    static public function ctrEditarCarrera()
    {

        if (isset($_POST['editarCarrera'])) {
      
            $tabla = 'carrera';

            $datos = [
                'carrera' => $_POST['editarCarrera'],
                'estado' => $_POST['estadoCarrera'],
                'id' => $_POST['IdCarrera']

            ];

            //return $datos;

            $respuesta = ModeloCarrera::mdlEditarCarrera($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>

            swal({
                  type: "success",
                  title: "La carrera ha sido editada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "carrera";
                            }
                        })

            </script>';
            } else {

                echo '<script>

            swal({
                  type: "error",
                  title: "La carrera no se guardó correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "carrera";
                            }
                        })

            </script>';
            }//Fin de evaluar respuesta del Modelo

        } //Fin de Comprobar POST

    } //Fin de Editar Carrera



    static public function ctrEliminarCarrera()
	{

		if (isset($_POST["btnDeleteCarrera"])) {

			$tabla = "carrera";
			$datos = $_POST["btnDeleteCarrera"];



			$respuesta = ModeloCarrera::mdlEliminarCarrera($tabla, $datos);

			if ($respuesta == "ok") {

                

              echo ' <script> Swal.fire({
                    title: "Are you sure?",
                    text: "You won"t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                      )
                    }
                  });	</script>';

				echo '<script>

				swal({
					  type: "success",
					  title: "La Carrera ha sido eliminada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "carrera";
								}
							})

				</script>';
			}//fin validar respuesta modelo

		}//Fin VErificar si hay post

	}//Fin Borrar Carrera

}//Fin Calse Controlador Carrera
