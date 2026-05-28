<?php
class Producto {
    private $nombre;
    private $categoria;
    private $precio;
    private $stock;

    public function __construct($nombre, $categoria, $precio, $stock) {
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function getInfo() {
        return "Producto: " . $this->nombre . " | Categoría: " . $this->categoria . " | Precio: $" . $this->precio . " | Stock: " . $this->stock;
    }
}

function leerProductosDesdeArchivo($ruta) {
    $productos = [];
    if (file_exists($ruta)) {
        $lineas = file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lineas as $linea) {
            $datos = explode("|", $linea);
            if (count($datos) === 4) {
                list($nombre, $categoria, $precio, $stock) = $datos;
                $productos[] = new Producto($nombre, $categoria, $precio, $stock);
            }
        }
    }
    return $productos;
}

$productosLeidos = leerProductosDesdeArchivo("productos.txt");

echo "<h2>Productos Reconstruidos desde el Archivo</h2>";
foreach ($productosLeidos as $producto) {
    echo $producto->getInfo() . "<br>";
}
?>