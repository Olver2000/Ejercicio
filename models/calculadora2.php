<?php
require_once("../views/calculadoraindex.php");
class Calculator
{
    public $num1;
    public $num2;
    public $operacion;

    public function operation($num1, $num2, $operacion)
    {
        switch ($operacion) {
            case '+':
                return $num1 + $num2;
                break;
            case '-':
                return $num1 - $num2;
                break;
            case '*':
                return $num1 * $num2;
                break;
            case '/':
                if ($num2 === 0) {
                    return $num1 / $num2;
                    break;
                }else{
                    return "no se puede dividir por cero";

                }

            default:
        }

    }
}

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operacion = $_POST['operacion'];

$cal = new Calculator();
$result = $cal->operation($num1, $num2, $operacion);
echo"<br>";


echo " <h3>El resultado es: </h3>" . $result;