<?php


class ModeloProfesor{

/*=============================================
BUSCAR IDENTIFICICACION
=============================================*/

	static public function mdlBuscarIdentificacion($tabla, $item, $valor){

	

			$stmt =  ApiPadronElectoral::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		

		$stmt -> closeCursor();

		$stmt = null;

	}

    static public function mdlMostrarProfesores ($tablaE,$item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaE WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} else {
           
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaE");

			$stmt->execute();

			return $stmt->fetchAll();
		}


		//$stmt -> closeCursor();

		$stmt = null;
	}




 static public function mdlCrearProfesor($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_identificicacion,
    identificacion,nombre_completo,primer_apellido,segundo_apellido,telefono,celular,provincia,canton,distrito,otras_senas,sexo,estado_civil,foto) VALUES (:tipo_identificicacion,
    :identificacion,:nombre_completo,:primer_apellido,:segundo_apellido,:telefono,:celular,:provincia,:canton,:distrito,:otras_senas,:sexo,:estado_civil,:foto)");

    $stmt->bindParam(":tipo_identificicacion", $datos["tipo_identificicacion"], PDO::PARAM_INT);
    $stmt->bindParam(":identificacion", $datos["identificacion"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
    $stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
    $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
    $stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
    $stmt->bindParam(":canton", $datos["canton"], PDO::PARAM_STR);
    $stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
    $stmt->bindParam(":otras_senas", $datos["otras_senas"], PDO::PARAM_STR);
    $stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
    $stmt->bindParam(":estado_civil", $datos["estado_civil"], PDO::PARAM_STR);
    $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
   

    if ($stmt->execute()) {

        return "ok";
    }
    if (!$stmt->execute()) {

        return "error";
    }

    $stmt->closeCursor();

    $stmt = null;




 }
}