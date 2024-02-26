<?php

class Producto {
    private $id;
    private $nombre;
    private $precio;
    private $cantidad;

    public function __construct($id, $nombre, $precio, $cantidad) {
        $this->id = $id;
        $this->setNombre($nombre);
        $this->setPrecio($precio);
        $this->cantidad = $cantidad;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        // Validar el nombre utilizando una expresión regular
        if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
            throw new Exception("Error: El nombre no es válido. Debe contener solo letras y espacios.");
        }
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        // Validar el precio como un número decimal positivo
        if (!is_numeric($precio) || $precio <= 0) {
            throw new Exception("Error: El precio no es válido. Debe ser un número decimal positivo.");
        }
        $this->precio = $precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
}

class Inventario {
    private $productos = [];

    public function agregarProducto(Producto $producto) {
        $this->productos[$producto->getId()] = $producto;
    }

    public function quitarProducto($id) {
        if (isset($this->productos[$id])) {
            unset($this->productos[$id]);
        }
    }

    public function actualizarCantidad($id, $nuevaCantidad) {
        if (isset($this->productos[$id])) {
            $this->productos[$id]->setCantidad($nuevaCantidad);
        }
    }

    public function obtenerProducto($id) {
        return $this->productos[$id] ?? null;
    }

    public function listarProductos() {
        return $this->productos;
    }
}

// Ejemplo de uso

// Creamos algunos productos
try {
    $producto1 = new Producto(1, "Camiseta", 20.99, 50);
    $producto2 = new Producto(2, "Pantalón", 35.50, 30);
    $producto3 = new Producto(3, "Zapatos", 49.99, 20);
} catch (Exception $e) {
    echo "Error al crear productos: " . $e->getMessage();
    exit;
}

// Creamos un inventario
$inventario = new Inventario();

// Agregamos los productos al inventario
$inventario->agregarProducto($producto1);
$inventario->agregarProducto($producto2);
$inventario->agregarProducto($producto3);

// Listamos los productos en el inventario
$productosEnInventario = $inventario->listarProductos();
echo "Productos en el inventario:<br>";
foreach ($productosEnInventario as $producto) {
    echo "ID: " . $producto->getId() . ", Nombre: " . $producto->getNombre() . ", Precio: $" . $producto->getPrecio() . ", Cantidad: " . $producto->getCantidad() . "<br>";
}

// Actualizamos la cantidad de un producto
$inventario->actualizarCantidad(1, 40);

// Mostramos la cantidad actualizada del producto
echo "<br>Después de la actualización:<br>";
$productoActualizado = $inventario->obtenerProducto(1);
echo "ID: " . $productoActualizado->getId() . ", Nombre: " . $productoActualizado->getNombre() . ", Precio: $" . $productoActualizado->getPrecio() . ", Cantidad: " . $productoActualizado->getCantidad();

?>
