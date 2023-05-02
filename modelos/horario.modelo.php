<?php

require_once "conexion.php";

class ModeloHorario
{

	static public function mdlMostrotrarHorarios($tabla, $item, $valor)
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


	static public function mdlCrearHorario($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(horario,estado) VALUES (:horario,:estado)");

		$stmt->bindParam(":horario", $datos["horario"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		}


		$stmt->closeCursor();

		$stmt = null;
	}

	static public function mdlEditarHorario($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET horario = :horario, estado = :estado WHERE id = :id");

		$stmt->bindParam(":horario", $datos["horario"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		if ($stmt->execute()) {

			return "ok";
		}


		$stmt->closeCursor();

		$stmt = null;

	}


	
	static public function mdlEliminarHorario($tabla, $datos)
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
