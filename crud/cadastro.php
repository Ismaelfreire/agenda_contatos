<?php
require_once("../config/connection.php");
$pdo = Connection::conexao();

$nome = $_POST["nome"];
$email = $_POST["email"];
$celular = $_POST["celular"];

if(empty($nome) || empty($email) || empty($celular)){
	die("Todos os campos são obrigatórios");
}

$sql = "INSERT INTO dados(nome, email, celular) VALUES(:nome, :email, :celular)";
$sql = $pdo->prepare($sql);
$sql->bindValue(":nome", $nome);
$sql->bindValue(":email", $email);
$sql->bindValue(":celular", $celular);

if($sql->execute()){
	header('Location: ../index.php');
}else{
	die("Algo deu errado!");
}
