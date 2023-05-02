<?php


class ControladorProfesor
{


      /*=============================================
  MOSTRAR PROFESOR
=============================================*/

static public function ctrMostrarProfesor($item,$valor){

    $tabla="profesor";

    $respuesta=ModeloProfesor::mdlMostrarProfesores($tabla,$item,$valor);

    $conteo=count($respuesta);

   
    return $respuesta;

}
  
  /*=============================================
  BUSCAR PROFESOR
=============================================*/
    static public function ctrBuscarProfesor()
    {

        if (isset($_POST["BTNBUSCARCEDULA"])) {

            if (preg_match('/^[0-9]+$/', $_POST["buscarIdentificacion"])) {

                $tabla = "padron_electoral";

                $item = "IDENTIFICACION";

                $valor =  $_POST["buscarIdentificacion"];


                



                /*=============================================
                VALIDAR SI EXISTE EL PROFESOR
                =============================================*/

                $Identificacion = $_POST['buscarIdentificacion'];

                $tablaE = "profesor";

                $itemE = null;

                $valorE = null;

                $profesores = ModeloProfesor::mdlMostrarProfesores($tablaE, $itemE, $valorE);

                


                foreach ($profesores as $profesores) {

                    if ($profesores['identificacion'] == $Identificacion) {

                        echo '<script>

                    swal({

                        type: "error",
                        title: "¡ El profesor ya tiene una cuenta activa",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "profesores";

                        }

                    });
                

                </script>';
                    } // fin condicion si existe estudiante

                } //fin foreach

                $respuesta = ModeloProfesor::mdlBuscarIdentificacion($tabla, $item, $valor);
                
                return $respuesta;

            } else {

                echo '<script>

                swal({
                      type: "error",
                      
                      title: "¡La cedula no puede ir vacía o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "profesores";

                        }
                    })

              </script>';
            }
        }
    }

  /*=============================================
CREAR PROFESOR
=============================================*/
    static public function ctrCrearProfesor()
    {

        if (isset($_POST['btnGuardarProfesor'])) {

            /*=============================================
                        VALIDAR LOS DATOS DEL FORMULARIO STUDIANTE
                =============================================*/

            if (
                isset($_POST['nuevaCedula']) && trim($_POST['nuevaCedula']) == '' ||
                isset($_POST['nuevoNombre']) && trim($_POST['nuevoNombre']) == '' ||
                isset($_POST['nuevoPrimerApellido']) && trim($_POST['nuevoPrimerApellido']) == '' ||
                isset($_POST['nuevoSegApellido']) && trim($_POST['nuevoSegApellido']) == '' ||
                isset($_POST['nuevoTelefono']) && trim($_POST['nuevoTelefono']) == '' ||
                isset($_POST['nuevoCelular']) && trim($_POST['nuevoCelular']) == '' ||
                isset($_POST['nuevaProvincia']) && trim($_POST['nuevaProvincia']) == '' ||
                isset($_POST['nuevoCanton']) && trim($_POST['nuevoCanton']) == '' ||
                isset($_POST['nuevoDistrito']) && trim($_POST['nuevoDistrito']) == '' ||
                isset($_POST['nuevaSenas']) && trim($_POST['nuevaSenas']) == '' ||
                isset($_POST['nuevoSexo']) && trim($_POST['nuevoSexo']) == '' ||
                isset($_POST['nuevoSexo']) && trim($_POST['nuevoSexo']) == ''
            ) {

                echo '<script>

					swal({

						type: "error",
						title: "¡ Todos los campos son obligatorios!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "profesores";

						}

					});
				

				</script>';
            } //fin validacion campos


 


            /*=============================================
				VALIDAR IMAGEN
				=============================================*/


            //Recogemos el archivo enviado por el formulario
            $archivo = $_FILES['nuevaFoto']['name'];

            //Si el archivo contiene algo y es diferente de vacio
            if (isset($archivo) && $archivo != "") {

                //Obtenemos algunos datos necesarios sobre el archivo
                $tipo = $_FILES['nuevaFoto']['type'];

                $tamano = $_FILES['nuevaFoto']['size'];

                $temp = $_FILES['nuevaFoto']['tmp_name'];
                //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {

                    echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
         - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                } else {
                    //Si la imagen es correcta en tamaño y tipo
                    //Se intenta subir al servidor
                    //$aleatorio = mt_rand(100,999);

                    if (move_uploaded_file($temp, 'vistas/img/profesores/' . $_POST['nuevaCedula'] . ".png")) {


                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod('vistas/img/profesores/' . $_POST['nuevaCedula'] . ".png", 0777);
                        $ruta='vistas/img/estudiantes/'.  $_POST['nuevaCedula']. ".png";
                        //Mostramos el mensaje de que se ha subido co éxito
                        echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                        //Mostramos la imagen subida
                        echo '<p><img src="vistas/img/profesores/' . $_POST['nuevaCedula'] . '.png"></p>';
                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                    }
                }
            }/* TERMINA VALIDAR IMAGEN*/






            $tabla = "profesor";

            $datos = array(

                'tipo_identificicacion' => '1',
                'identificacion' => $_POST['nuevaCedula'],
                'nombre_completo' => $_POST['nuevoNombre'],
                'primer_apellido' => $_POST['nuevoPrimerApellido'],
                'segundo_apellido' => $_POST['nuevoSegApellido'],
                'telefono' => $_POST['nuevoTelefono'],
                'celular' =>     $_POST['nuevoCelular'],
                'provincia' => $_POST['nuevaProvincia'],
                'canton' =>    $_POST['nuevoCanton'],
                'distrito' => $_POST['nuevoDistrito'],
                'otras_senas' =>    $_POST['nuevaSenas'],
                'sexo' => $_POST['nuevoSexo'],
                'estado_civil' => $_POST['estadoCivil'],
                'foto' =>  $ruta,
            );

            //return $datos;
            $respuesta = ModeloProfesor::mdlCrearProfesor($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        swal({
    
                            type: "success",
                            title: "¡El profesor ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                        }).then(function(result){
    
                            if(result.value){
                            
                                window.location = "profesores";
    
                            }
    
                        });
                    
    
                        </script>';


                //return   $datos;

            }
        }/*=============================================
        FIN VALIDAR EVIARON LOS DATOS POST
        =============================================*/
    } // FIN CONTROLADOR DE CREAR PROFESOR
}
