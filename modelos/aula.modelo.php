<?php

require_once "conexion.php";

class ModeloAula
{

	static public function mdlMostrotrarAulas($tabla, $item, $valor)
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

	static public function prueba()
	{

		$pdo = new PDO("mysql:host=localhost;dbname=prueba", "root", "");

		$pdo->exec("set names utf8");


		$query = "INSERT INTO prueba(nombre, email) VALUES ('anonymous', 'anonymous@example.com')";
		$query_success = $pdo->query($query);

		// 3. Retrieving the last inserted id
		$id = $pdo->lastInsertId(); // return value is an integer
		echo $id;
	}

	static public function mdlCrearAula($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(aula,estado) VALUES (:aula,:estado)");

		$stmt->bindParam(":aula", $datos["aula"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		}


		$stmt->closeCursor();

		$stmt = null;
	}

	static public function mdlEditarAula($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET aula = :aula, estado = :estado WHERE id = :id");

		$stmt->bindParam(":aula", $datos["aula"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if ($stmt->execute()) {

			return "ok";
		}


		$stmt->closeCursor();

		$stmt = null;
	}



	static public function mdlEliminarAula($tabla, $datos)
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
