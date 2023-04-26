<?php
include_once '../../Models/calculadoraModel.php';



$data = new Calculator();
$registros = $data->getAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Document</title>
</head>

<body class="mt-3">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Calculadora</h1>
        <form action="../../Controllers/calculadoraController.php" method="POST">
          <input type="hidden" name="c" value="1">
          <div class="mb-3">
            <label for="num1" class="form-label">Número Uno</label>
            <input type="number" class="form-control" id="num1" name="num1">
          </div>
          <div class="mb-3">
            <label for="num2" class="form-label">Número Dos</label>
            <input type="number" class="form-control" id="num2" name="num2">
          </div>
          <div class="mb-3">
            <label for="operacion" class="form-label">Operación</label>
            <select class="form-select" id="operacion" name="operacion">
              <option value="1">Sumar</option>
              <option value="2">Restar</option>
              <option value="3">Multiplicar</option>
              <option value="4">Dividir</option>
            </select>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Calculadora</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-3"></div>


  <h3>Resultados de las Operaciones</h3>

  <table class="table table-sm table-hover">
    <thead>
      <tr class="text-center">
        <th scope="col">Número Uno</th>
        <th scope="col">Número Dos</th>
        <th scope="col">Operación</th>
        <th scope="col">Resultado</th>
        <th scope="col" colspan="2">Opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($registros) {
        foreach ($registros as $row) {

      ?>
          <tr class="text-center">
            <td><?= $row->num1 ?></td>
            <td><?= $row->num2 ?></td>
            <td><?= $row->operacion ?></td>
            <td><?= $row->resultado ?></td>
            <td>
              <a class="btn btn-outline-warning btn-sm" href="<?= $row->getAll()?>">Actualizar</a>
            </td>
            <td>
              <a class="btn btn-outline-danger btn-sm" href="<?= $row->getAll()?>">Eliminar</a>
            </td>
          </tr>
        <?php
        }
      } else {
        ?>
        <tr class=" text-center">
          <td colspan="6">Sin datos</td>
        </tr>
      <?php
      }
      ?>
    </tbody>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>