<?php


class ModeloEstudiante{

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
    static public function mdlNuvoCarnet($tabla, $item){

	

        $stmt =  Conexion::conectar()->prepare("SELECT MAX($item) as carnet FROM $tabla  LIMIT 1");

        $stmt -> execute();

        return $stmt -> fetchAll();

    $stmt -> closeCursor();

    $stmt = null;

}
static public function mdlCrearCarnet($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(carnet) VALUES (:carnet)");

		$stmt->bindParam(":carnet", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		}


		$stmt->closeCursor();

		$stmt = null;
	}


    static public function mdlMostrarEstudiantes ($tablaE,$item, $valor)
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




 static public function mdlCrearEstudiante($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_identificicacion,
    identificacion,nombre_completo,primer_apellido,segundo_apellido,carnet,telefono,celular,provincia,canton,distrito,otras_senas,sexo,estado_civil,foto,id_usuario) VALUES (:tipo_identificicacion,
    :identificacion,:nombre_completo,:primer_apellido,:segundo_apellido,:carnet,:telefono,:celular,:provincia,:canton,:distrito,:otras_senas,:sexo,:estado_civil,:foto,:id_usuario)");

    $stmt->bindParam(":tipo_identificicacion", $datos["tipo_identificicacion"], PDO::PARAM_INT);
    $stmt->bindParam(":identificacion", $datos["identificacion"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
    $stmt->bindParam(":primer_apellido", $datos["primer_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":segundo_apellido", $datos["segundo_apellido"], PDO::PARAM_STR);
    $stmt->bindParam(":carnet", $datos["carnet"], PDO::PARAM_STR);
    $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
    $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
    $stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
    $stmt->bindParam(":canton", $datos["canton"], PDO::PARAM_STR);
    $stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
    $stmt->bindParam(":otras_senas", $datos["otras_senas"], PDO::PARAM_STR);
    $stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
    $stmt->bindParam(":estado_civil", $datos["estado_civil"], PDO::PARAM_STR);
    $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
    $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);


    if ($stmt->execute()) {

        return "ok";
    }
    if (!$stmt->execute()) {

        return "error";
    }

    $stmt->closeCursor();

    $stmt = null;




 }

 static public function mdlASignarMateriasaEstudiante($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_estudiante,id_materia) VALUES (:id_estudiante,:id_materia)");

    $stmt->bindParam(":id_estudiante", $datos["id_estudiante"], PDO::PARAM_INT);
    $stmt->bindParam(":id_materia", $datos["id_materia"], PDO::PARAM_INT);
    
   

    if ($stmt->execute()) {

        return "ok";
    }
    if (!$stmt->execute()) {

        return "error";
    }

    $stmt->closeCursor();

    $stmt = null;




 }


 /*=============================================
	ASISGNAR CARRERA ESTUDIANTE
	=============================================*/

	static public function mdlAsiganarCarreraEstudiante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carrera = :carrera WHERE id = :id");

		$stmt -> bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		//$stmt->close();
		$stmt = null;

	}
}