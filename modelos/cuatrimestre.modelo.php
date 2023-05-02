<?php

require_once "conexion.php";

class ModeloCuatrimestre
{

	static public function mdlMostrotrarCuatrimestres($tabla, $item, $valor)
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

}
