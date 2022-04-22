<?php
require_once("../config/connection.php");
$pdo = Connection::conexao();

$id = $_GET["id"];

if(empty($id)){
	die("O id é obrigatório");
}

$sql = "DELETE FROM dados WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);

if($sql->execute()){
	header('Location: ../index.php');
}else{
	die("Algo deu errado!");
}

