<?php

require_once "conexion.php";

class ModeloMateria{


    static public function mdlMostrarMateria($tabla,$item,$valor)
    {
        if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
			
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}


		//$stmt -> close();

		$stmt = null;
    }//fin metodo mostrar materia

    static public function mdlCrearMateria($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(materia,creditos,requisitos,codigo,id_cutrimestre) VALUES (:materia,:creditos,:requisitos,:codigo,:id_cutrimestre)");

		$stmt->bindParam(":materia", $datos["materia"], PDO::PARAM_STR);
		$stmt->bindParam(":creditos", $datos["creditos"], PDO::PARAM_INT);
		$stmt->bindParam(":requisitos", $datos["requisitos"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cutrimestre", $datos["id_cutrimestre"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		
		if ($stmt->execute()) {

			return "ok";
		}
	

		$stmt->closeCursor();

		$stmt = null;

    }//fin metodo crear Materia


    static public function mdlEditarMateria()
    {

    }//Fin metodo editar materia

    static public function mdlEliminarMateria()
    {

    }//Fin metodo Eliminar materia


	static public function mdlTraerMateriaPorCarrera($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
	}

}//Fin Clase Materia