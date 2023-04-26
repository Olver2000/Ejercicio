<?php
require_once("conexion.php");
include_once dirname(__FILE__) . '../../Config/config.php';
class Calculator
{
    private $id;
    public $num1;
    public $num2;
    public $operacion;
    public $resultado;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }


    public function getId()
    {
        return $this->id;
    }

    public function getAll()
    {
        $items = [];

        try {

            $sql = 'SELECT calculadora.id, calculadora.num1, calculadora.num2,  calculadora.operacion, calculadora.resultado FROM calculadora';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {

                $item            = new Calculator();
                $item->id        = $row['id'];
                $item->num1      = $row['num1'];
                $item->num2      = $row['num2'];
                $item->operacion = $row['operacion'];
                $item->resultado = $row['resultado'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function store($datos)
    {
        try {
            $resultado = self::resultado($datos);
            $sql = 'INSERT INTO calculadora(num1, num2, operacion, resultado) VALUES(:num1, :num2, :operacion, :resultado)';

            $db = new DataBase();
            $prepare = $db->conect()->prepare($sql);
            $query = $prepare->execute([
                'num1'   => $datos['num1'],
                'num2'   => $datos['num2'],
                'operacion' => $datos['operacion'],
                'resultado' => $resultado,
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function resultado($datos)
    {
        switch ($datos['operacion']) {
            case '1':
                return $datos['num1'] + $datos['num2'];

            case '2':
                return $datos['num1'] -  $datos['num2'];

            case '3':
                return $datos['num1'] * $datos['num2'];

            case '4':
                return $datos['num1'] / $datos['num2'];

            default:
                return false;
        }
    }
}
        
        
        
        
        //   $num1 = $_POST['num1'];
        //   $num2 = $_POST['num2'];
        //   $operacion = $_POST['operacion'];
        
        //  $cal = new Calculator();
        //  $result = $cal->resultado($num1, $num2, $operacion);
        //  echo "<br>";
        
        
        //  echo " <h3>El resultado es: </h3>" . $result;
