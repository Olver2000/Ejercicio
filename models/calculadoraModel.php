<?php
require_once("conexion.php");
include_once dirname(__FILE__) . '../../Config/config.php';
class Calculator
{
    private $id;
    public $num_uno;
    public $num_dos;
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

    public function getbyId($id)
    {
        $operacion = [];

        try {
            $sql = "SELECT * FROM operaciones WHERE id = $id";
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item            = new Calculator();
                $item->id        = $row['id'];
                $item->num_uno   = $row['num_uno'];
                $item->num_dos   = $row['num_dos'];
                $item->operacion = $row['operacion'];
                $item->resultado = $row['resultado'];

                array_push($operacion, $item);
            }


            return $operacion;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $items = [];

        try {

            $sql = 'SELECT operaciones.id, operaciones.num_uno, operaciones.num_dos, OPERADORES.nombre AS operacion, operaciones.resultado FROM operaciones JOIN OPERADORES ON operaciones.operacion = OPERADORES.id';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {

                $item            = new Calculator();
                $item->id        = $row['id'];
                $item->num_uno   = $row['num_uno'];
                $item->num_dos   = $row['num_dos'];
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
            $sql = 'INSERT INTO operaciones(num_uno, num_dos, operacion, resultado) VALUES(:num_uno, :num_dos, :operacion, :resultado)';

            $db = new DataBase();

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'num_uno'   => $datos['num_uno'],
                'num_dos'   => $datos['num_dos'],
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

    public function update($datos)
    {
        try {

            $resultado = self::resultado($datos);

            $sql = 'UPDATE operaciones SET num_uno = :num_uno, num_dos = :num_dos, operacion = :operacion, resultado = :resultado WHERE id = :id';
                        
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id'        => $datos['id'],
                'num_uno'   => $datos['num_uno'],
                'num_dos'   => $datos['num_dos'],
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

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM operaciones WHERE id=:id";

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id' => $id,
            ]);

            if ($query) {
                return true;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function resultado($datos)
    {
        switch ($datos['operacion']) {
            case '1': 
                return $datos['num_uno'] + $datos['num_dos'];
                break;
            case '2': 
                
                return $datos['num_uno'] - $datos['num_dos'];
                break;
            case '3': 
                return $datos['num_uno'] * $datos['num_dos'];
                # code...
                break;
            case '4': //División
                return $datos['num_uno'] / $datos['num_dos'];
                # code...
                break;

            default:
                return false;
                break;
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
