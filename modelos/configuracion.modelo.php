<?php

require_once "conexion.php";

class ModeloConfiguracion{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlCrearConfiguracion($tabla, $datos){
        

		$stmt = Conexion::conectar()->prepare(
        "INSERT INTO $tabla(nombre_empresa,cedula,correo,telefono,celular,provincia,canton,distrito,otras_senas,moneda,simbolo,costo_creditos)
         VALUES (:nombre_empresa,:cedula,:correo,:telefono,:celular,:provincia,:canton,:distrito,:otras_senas,:moneda,:simbolo,:costo_creditos)");

		$stmt -> bindParam(":nombre_empresa", $datos["nombre_empresa"], PDO::PARAM_STR);
        $stmt -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt -> bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
        $stmt -> bindParam(":canton", $datos["canton"], PDO::PARAM_STR);
        $stmt -> bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
        $stmt -> bindParam(":otras_senas", $datos["otras_senas"], PDO::PARAM_STR);
        $stmt -> bindParam(":moneda", $datos["moneda"], PDO::PARAM_STR);
        $stmt -> bindParam(":simbolo", $datos["simbolo"], PDO::PARAM_STR);
        $stmt -> bindParam(":costo_creditos", $datos["costo_creditos"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

    /*=============================================
	MOSTRAR CONFIGURACION
	=============================================*/

	static public function mdlMostrarConfiguracion($tabla){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();


		$stmt->closeCursor();

		$stmt = null;

	
    }

}
