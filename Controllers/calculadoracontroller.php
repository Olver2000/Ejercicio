<?php

require_once '../Models/calculadoraModel.php';

$calculadora = new CalculadoraController;

class CalculadoraController
{

    public function __construct()
    {
        if (isset($_REQUEST['c'])) {
           

            switch ($_POST['c']) {
                case '1':
                    self::store();
                    break;

                default:

                    break;
            }
        }
    }

    public function index()
    {
        $resultados = new Calculator();
        $data = $resultados->getAll();

        return $data;
    }
    public function store()
    {
        $datos = [
            'num1' => $_REQUEST['num1'],
            'num2' => $_REQUEST['num2'],
            'operacion' => $_REQUEST['operacion']
        ];

        $calculadora = new Calculator();
        $result = $calculadora->store($datos);

        if ($result) {
            header("Location: ../views/Calculadora/index.php");
            exit();
        }

        return $result;
    }
}
