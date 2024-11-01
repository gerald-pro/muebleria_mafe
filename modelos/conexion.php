<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=2024mafe",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}