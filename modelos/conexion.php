<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=ucem_v1",
			            "root",
			            "Amh8e8mr001");

		$link->exec("set names utf8");

		return $link;

	}

}


class ApiPadronElectoral{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=padron_electoral",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}
