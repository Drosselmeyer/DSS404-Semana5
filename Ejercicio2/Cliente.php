<?php

class Cliente {
    private $nombre;
    private $email;
    private $telefono;

    public function __construct($nombre, $email, $telefono) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    public function validarTelefono() {
        $telefono_valido = preg_match('/^\d{4}-\d{4}$/', $this->telefono);

        if (!$telefono_valido) {
            return "Error: El teléfono no es válido. Debe contener 10 dígitos numéricos.";
        } else {
            return "Telefono válidos $this->telefono";
        }
    }

    public function validarNombre() {
        $nombre_valido = preg_match('/^[a-zA-Z\s]+$/', $this->nombre);
        
        if (!$nombre_valido) {
            return "Error: El nombre no es válido. Debe contener solo letras y espacios.";
        } else {
            return "Nombre válido $this->nombre";
        }
    }

    public function validarEmail() {
        $email_valido = preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $this->email);
        
        if (!$email_valido) {
            return "Error: El email no es válido. Por favor, ingrese un email válido.";
        }
        else {
            return "Email válido $this->email";
        }
    }
}

?>
