<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="modelo.css">
	<title>Pessoas</title>
	<style type="text/css">
		td, th {
  padding: .7em;
  margin: 0;
  border: 1px solid #ccc;
  text-align: center;
}

th{
  background-color: #EEE;
  text-align: center;
}
td{
  font-weight:bold;
  background-color: #fff;
}

table{
  width: 100%;
  margin-bottom : .5em;
  table-layout: fixed;
  text-align: center;
}
	</style>
</head>
<body>
	<div style="text-align: center;" >
	<table style="border: solid 1px;">
		<tr>
			<th style="text-align:center;">Pessoas</th>
		</tr>
		<tr>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Idade</th>
			<th>Editar</th>
		</tr>





<?php
 
	$localhost = 'localhost';
	$user_name = 'root';
	$senha = "";
	$db = "dbPessoa";
 
 
	$con = mysqli_connect($localhost,$user_name,$senha,$db);
		if (mysqli_connect_errno()){
			echo "Erro ao conectar com o banco de dados: " . mysqli_connect_error();
		}
		else{
			$sql = "INSERT INTO pessoa(nome,sobrenome,idade)VALUES('$_POST[nome]','$_POST[sobrenome]','$_POST[idade]')";
		

		if(mysqli_query($con,$sql)){
			$mostrar = "select nome, sobrenome, idade from pessoa";
 
			$resultado = mysqli_query($con,$mostrar);
 
			while ($pessoa = mysqli_fetch_array($resultado)) {
				echo "<tr><td>".$pessoa['nome'] . "</td>";
				 echo "<td>". $pessoa['sobrenome'] ."</td>";
				 echo "<td>" . $pessoa['idade'] . "</td></tr>";
			}
		}else{
			echo "Erro ao inserir: ".mysqli_error($con);
		}
 
 
	
		mysqli_close($con);
	}
?>
	</table>
	</div>
	</body>
</html>