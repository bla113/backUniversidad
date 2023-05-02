<?php

require_once "conexion.php";

class ModeloCarrera
{

	static public function mdlMostrotrarCarrera($tabla, $item, $valor)
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


		//$stmt -> closeCursor();

		$stmt = null;
	}


	static public function mdlCrearCarrera($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(carrera,estado) VALUES (:carrera,:estado)");

		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		}


		$stmt->closeCursor();

		$stmt = null;
	}

	static public function mdlEditarCarrera($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carrera = :carrera, estado = :estado WHERE id = :id");

		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		if ($stmt->execute()) {

			return "ok";
		}


		$stmt->closeCursor();

		$stmt = null;

	}


	
	static public function mdlEliminarCarrera($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();

		$stmt = null;
	}
}
