<?php
ini_set('display_errors', 1);

class Connection
{

	public static $conn;

	public function __construct(){
		try {
			$user = 'root';
			$password = '';

			self::$conn = new PDO("mysql:host=localhost;port=3306;dbname=agenda", $user, $password);
			self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Erro ao conectar: ".$e->getMessage());
		}
	}

	public static function conexao()
	{
		if(!self::$conn){
			new Connection;
		}
		
		return self::$conn;
	}
}

