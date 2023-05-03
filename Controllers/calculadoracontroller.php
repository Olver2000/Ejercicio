<?php

require_once '../Models/calculadoraModel.php';

$calculadora = new CalculadoraController;

class CalculadoraController
{
    private $calculadora;

    public function __construct()
    {
        $this->calculadora = new Calculator();

        if (isset($_REQUEST['c'])) {


            switch ($_REQUEST['c']) {
                case '1':
                    self::store();
                    break;
                case '2': //Ver usuario
                    self::show();
                    break;
                case '3': // Actualizar el registro
                    self::update();
                    break;
                case '4':
                    self::delete();
                    break;
                default:
                    self::index();
                    break;
            }
        }
    }

    public function index()
    {
        // $resultados = new Calculator();
        // $data = $resultados->getAll();
        $data = $this->calculadora->getAll();

        return $data;
    }

    public function show()
    {
        $id = $_REQUEST['id'];
        header("Location: ../views/Calculadora/editar.php?id=" . $id);
    }
    public function store()
    {
        $datos = [
            'num_uno' => $_REQUEST['num_uno'],
            'num_dos' => $_REQUEST['num_dos'],
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

    public function update()
    {
        $datos = [
            'id'        => $_REQUEST['id'],
            'num_uno'   => $_REQUEST['num_uno'],
            'num_dos'   => $_REQUEST['num_dos'],
            'operacion' => $_REQUEST['operacion']
        ];

        $result = $this->calculadora->update($datos);

        if ($result) {
            header("Location:  ../views/Calculadora/index.php");

            exit();
        }

        return $result;
    }

    public function delete()
    {
        $this->calculadora->delete($_REQUEST['id']);
        header("Location: ../views/Calculadora/index.php");
    }
}
