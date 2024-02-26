<?php

class Calculadora {
    public function sumar($num1, $num2) {
        return $num1 + $num2;
    }

    public function restar($num1, $num2) {
        return $num1 - $num2;
    }

    public function multiplicar($num1, $num2) {
        return $num1 * $num2;
    }

    public function dividir($num1, $num2) {
        if ($num2 == 0) {
            return "Error: No se puede dividir por cero.";
        }
        return $num1 / $num2;
    }
}

// Instanciamos la calculadora
$calculadora = new Calculadora();

// Recibimos los datos del formulario
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operacion = $_POST['operacion'];

// Realizamos la operación correspondiente
switch ($operacion) {
    case 'sumar':
        $resultado = $calculadora->sumar($num1, $num2);
        break;
    case 'restar':
        $resultado = $calculadora->restar($num1, $num2);
        break;
    case 'multiplicar':
        $resultado = $calculadora->multiplicar($num1, $num2);
        break;
    case 'dividir':
        $resultado = $calculadora->dividir($num1, $num2);
        break;
    default:
        $resultado = "Operación no válida";
}

// Mostramos el resultado
echo "<h2>Resultado:</h2>";
echo "<p>$resultado</p>";

?>
