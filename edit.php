<?php
require_once("config/connection.php");
$pdo = Connection::conexao();

$id = $_GET["id"];

if(empty($id)){
	die("O id é obrigatório");
}

$sql = "SELECT * FROM dados WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();


if($sql->rowCount() > 0){
	$contato = $sql->fetch();

} else {
	die("Contato não encontrado");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Editar</title>
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!--<link rel="stylesheet" type="text/css" href="assets/css/style.css">-->
	<script type="text/javascript">

		function mascara(o,f){
			v_obj=o
			v_fun=f
			setTimeout("execmascara()",1)
		}
		function execmascara(){
			v_obj.value=v_fun(v_obj.value)
		}
		function mtel(v){
			v=v.replace(/\D/g,"");
			v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
			v=v.replace(/(\d)(\d{4})$/,"$1-$2");
			return v;
		}
		function id( el ){
			return document.getElementById( el );
		}
		window.onload = function(){
			id('telefone').onkeyup = function(){
				mascara( this, mtel );
			}
		}	
	</script>
</head>
<body>
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<center><h2 class="title">Editar contato</h2></center>
			<form action="crud/editar.php" method="POST" class="form">
				<input type="hidden" name="id" value="<?=$contato['id']?>">
				
				<div class="mb-3">
					<label for="nome">Nome</label>
					<input class="form-control" required type="text" name="nome" id="nome" placeholder="Nome" value="<?=$contato['nome']?>">
				</div>

				<div class="mb-3">
					<label for="email">Email</label>
					<input class="form-control" required type="email" name="email" id="email" placeholder="Email" value="<?=$contato['email']?>">
				</div>

				<div class="mb-3">
					<label for="celular">Telefone</label>
					<input class="form-control" type="text" id="telefone" name="celular" placeholder="Ex: (85) 90000-0000" maxlength="15" required value="<?=$contato['celular']?>">
				</div>

				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<a href="index.php" class="btn btn-outline-dark" tabindex="-1" role="button" aria-disabled="true">Voltar</a>
					<button class="btn btn-dark" type="submit">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>