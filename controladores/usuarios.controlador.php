<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';




class ControladorUsuarios
{

	static public function MostrarPerfil()
	{

		$tabla = "tipo_usuario";

		$respuesta = ModeloUsuarios::mdlMostrarTipoUsuario($tabla);

		return $respuesta;
	}


	static public function ctrIngresoUsuario()
	{

		$key = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';



		if (isset($_POST["ingUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])

			) {

				$encriptar = crypt($_POST["ingPassword"], $key);

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				//return $respuesta;

				foreach ($respuesta as $key => $value) {



					if ($value['usuario'] == $_POST["ingUsuario"] && $value["password"] == $encriptar) {

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $value["id"];
						$_SESSION["nombre_usuario"] = $value["usuario"];
						$_SESSION["correo"] = $value["correo"];
						$_SESSION["tipo_usuario"] = $value["tipo_usuario"];
						// $_SESSION['password']= crypt($respuesta['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');



						echo '<script>

                            window.location = "inicio";

                        </script>';
					} else {

						echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
					}
					//print_r($respuesta);
				}
			}
		}
	}


	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor)
	{

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}



	/*=============================================
	CREAR   USUARIO
	=============================================*/

	static public function ctrCrearUsuario()
	{

		if (isset($_POST["btnGuardarUsuario"])) {

			if ((preg_match('/^[0-9]+$/', $_POST["nuevoUsuario"]))) {

				$tabla = "usuarios";

				$item = null;

				$valor = null;

				$usuarios = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

				foreach ($usuarios as $key => $value) {
					if ($value['usuario'] == $_POST["nuevoUsuario"] || $value['correo'] == $_POST["nuevoCorreo"]  ) {
						echo '<script>
	
						swal({
	
							type: "error",
							title: "¡Ya existe un ususario con esas Credenciales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
	
						}).then(function(result){
	
							if(result.value){
							
								window.location = "usuarios";
	
							}
	
						});
					
	
						</script>';

						exit;
					}
				}

				

				$key = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';


				$encriptar = crypt($_POST["nuevoPassword"], $key);
				$usuario=$_POST["nuevoUsuario"];
				$correo=$_POST["nuevoCorreo"];
				$contrasena= $_POST["nuevoPassword"];

				$datos = array(
					"usuario" => $_POST["nuevoUsuario"],
					"correo" => $_POST["nuevoCorreo"],
					"tipo_usuario" => $_POST["perfilUsuario"],
					"password" => $encriptar,
					"estado" => 1
				);

				$crearCorreo=ContoladorCorreo::credencialesUsuarioNuevo($usuario,$correo,$contrasena);
				
				$respuesta = ModeloUsuarios::mdlCrearUsuario($tabla, $datos);

				if ($respuesta == "ok" && $crearCorreo == "ok") {

					echo '<script>
	
						swal({
	
							type: "success",
							title: "¡El usuario ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
	
						}).then(function(result){
	
							if(result.value){
							
								window.location = "usuarios";
	
							}
	
						});
					
	
						</script>';
				}
			} else {
				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacio ser numéricos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';
			}
		}
	}
	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario()
	{

		if (isset($_POST["idUsuario"])) {

			$tabla = "usuarios";
			$datos = $_POST["idUsuario"];



			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";
								}
							})

				</script>';
			}
		}
	}


	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario()
	{

		if (isset($_POST["btnEditarUsuario"])) {

			$tabla = "usuarios";
			
			$Item = "id";

			$valor = $_POST['IdUsuario'];

			if (empty($_POST["editarPassword"]) || $_POST["editarPassword"] == "") {

				$Editar = ControladorUsuarios::ctrMostrarUsuarios($Item, $valor);

				foreach ($Editar as $key => $value) {

					$Password = $value['password'];	

					$datos = array(

						"correo" => $_POST["editarCorreo"],

						"password" => $Password,

						"estado" => $_POST["editarestado"],

						"tipo_usuario" => $_POST["editarPerfil"],

						"id" => $valor

					);

					//return $datos;


					$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

					if ($respuesta == "ok") {

						echo '<script>

				swal({

					  type: "success",

					  title: "El usuario ha sido actualizado correctamente",

					  showConfirmButton: true,

					  confirmButtonText: "Cerrar"

					  }).then(function(result){

								if (result.value) {

								window.location = "usuarios";
								}
							})

				</script>';
					}
				}
			} else {


				$key = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';


				$encriptar = crypt($_POST["editarPassword"], $key);


				$datos = array(
					"correo" => $_POST["editarCorreo"],
					"password" => $encriptar,
					"estado" => $_POST["editarestado"],
					"tipo_usuario" => $_POST["editarPerfil"],
					"id" => $valor


				);


				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido actualizado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";
								}
							})

				</script>';
				}
			}
		}
	}
}


