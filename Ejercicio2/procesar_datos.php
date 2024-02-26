<?php

require_once 'Cliente.php';

// Recogemos los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Creamos un objeto Cliente
$cliente = new Cliente($nombre, $email, $telefono);

// Validamos los datos del cliente
$resultado_val_nombre = $cliente->validarNombre();
$resultado_val_email = $cliente->validarEmail();
$resultado_val_telefono = $cliente->validarTelefono();

// Mostramos el resultado de la validación
echo "<h2>Resultado de la Validación:</h2>";
echo "<p>$resultado_val_nombre</p>";
echo "<p>$resultado_val_email</p>";
echo "<p>$resultado_val_telefono</p>";

?>
