<?php

require_once "conexion.modelo.php";
session_start();

class ModeloUsuarios
{
	// Select
	static public function mdlSelectUsuarios($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function mdlSelectGetUsuario($tabla, $idUsuario)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idUsuario =  $idUsuario ");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function mdlBuscarUsuario($tabla, $nombre)
	{
		$stmt = Conexion::conectar()->prepare('SELECT * FROM tbl_users WHERE username_user = :username_user');
		$stmt->bindParam(":username_user", $nombre, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
	}

	static public function mdlUpdateUsuario($tabla, $data)
	{

		$password = md5($data["password_user"]);
		$stmt = Conexion::conectar()->prepare('UPDATE tbl_users SET username_user = :username_user , password_user = :password_user WHERE id_user = :id_user ');
		$stmt->bindParam(":username_user", $data["username_user"], PDO::PARAM_STR);
		$stmt->bindParam(":password_user", $password, PDO::PARAM_STR);
		$stmt->bindParam(":id_user", $data["id_user"], PDO::PARAM_STR);

		$response = ($stmt->execute()) ? true : false;
		return $response;
	}
}
