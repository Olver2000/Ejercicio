<?php
 require_once("../models/conexion.php");
 require_once("../models/calculadora2.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Calculadora</title>
</head>
<body class="mt-3">
<br>
<br>	
<form method="POST" action="../models/calculadora2.php">
		<input type="text" name="num1">
		<select name="operacion">
			<option value="+">+
			</option>
			<option value="-">-
			</option>
			<option value="*">*
			</option>
			<option value="/">/
			</option>
		</select>
		<input type="text" name="num2">
		<input type="submit" value="enviar">
	</form>
<br>
<br>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Numero 1</th>
      <th scope="col">Numero 2</th>
      <th scope="col">Resultado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2"></td>
      <td></td>
    </tr>
  </tbody>
</table>
</body>
</html>