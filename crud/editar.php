<?php
require_once("../config/connection.php");
$pdo = Connection::conexao();

$nome = $_POST["nome"];
$email = $_POST["email"];
$celular = $_POST["celular"];
$id = $_POST["id"];

if(empty($nome) || empty($email) || empty($celular) || empty($id)){
	die("Todos os campos são obrigatórios");
}

$sql = "UPDATE dados SET nome = :nome, email = :email, celular = :celular WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":nome", $nome);
$sql->bindValue(":email", $email);
$sql->bindValue(":celular", $celular);
$sql->bindValue(":id", $id);

if($sql->execute()){
	header('Location: ../index.php');
}else{
	die("Algo deu errado!");
}
