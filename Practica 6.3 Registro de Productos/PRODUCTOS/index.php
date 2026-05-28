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

    public function getNombre() { return $this->nombre; }
    public function getCategoria() { return $this->categoria; }
    public function getPrecio() { return $this->precio; }
    public function getStock() { return $this->stock; }

    public function getInfo() {
        return "Producto: " . $this->nombre . " | Categoría: " . $this->categoria . " | Precio: $" . $this->precio . " | Stock: " . $this->stock;
    }

    public function guardarEnArchivo($ruta) {
        $linea = $this->nombre . "|" . $this->categoria . "|" . $this->precio . "|" . $this->stock . PHP_EOL;
        file_put_contents($ruta, $linea, FILE_APPEND);
    }
}

$productos = [
    new Producto("Laptop", "Electrónica", 15000, 10),
    new Producto("Funda", "Accesorios", 1200, 25),
    new Producto("Cable", "Electrónica", 500, 8),
    new Producto("Mouse", "Accesorios", 600, 40),
    new Producto("Silla Gamer", "Muebles", 4500, 15)
];

echo "<h2>Lista de Productos Registrados</h2>";
foreach ($productos as $producto) {
    echo $producto->getInfo() . "<br>";
    $producto->guardarEnArchivo("productos.txt");
}
?>