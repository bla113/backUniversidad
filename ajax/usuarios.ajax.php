<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);


	}


	
}

class AjaxCorreo{ 

	public $validarCorreo;

	public function ajaxValidarCorreo(){

		$item = "correo";

		$valor = $this->validarCorreo;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

}







/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario(); 

}

/*=============================================
VALIDAR NO REPETIR C0RREO
=============================================*/
if(isset( $_POST["validarCorreo"])){

	$validarCrreo = new AjaxCorreo();
	$validarCrreo -> validarCorreo = $_POST["validarCorreo"]; 
	$validarCrreo -> ajaxValidarCorreo(); 

}

