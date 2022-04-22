<?php
include_once("config/connection.php");

$pdo = Connection::conexao();
$consulta = $pdo->query("SELECT * FROM dados");

?>

<!DOCTYPE html>
<html>
<head>
	<script language="Javascript">
		function confirmacao(id) {
			var resposta = confirm("Deseja remover esse registro?");
			if (resposta == true) {
				window.location.href = "crud/delete.php?id="+id;
			}
		}
	</script>
	<meta charset="utf-8">
	<title>AGENDA</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
</head>
<body>
	<div class="container">
		<a href="cadastro.html" class="btn btn-dark btn-lg float-end" tabindex="-1" role="button" aria-disabled="true"><span class="material-icons">
add
</span>Adicionar</a>
		<table border="1" class="table table-striped">
			<thead class="table-dark">
				<tr>
					<td>Nome</td>
					<td>Email</td>
					<td>Celular</td>
					<td>Editar</td>
					<td>Excluir</td>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($consulta as $key => $value) {
					print "<tr>";
					print "<td>".$value["nome"]."</td>";
					print "<td>".$value["email"]."</td>";
					print "<td>".$value["celular"]."</td>";
					print "<td><a href='edit.php?id=".$value["id"]."'><span class='material-icons'>mode</span></a></td></td>";
					print "<td> <a href='javascript:func()' onclick='confirmacao(".$value["id"].")'><span class='material-icons'>delete</span></a></td>";
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>

