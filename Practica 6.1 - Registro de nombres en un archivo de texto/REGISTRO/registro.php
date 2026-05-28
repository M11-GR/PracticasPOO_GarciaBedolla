<?php
// 1. Arreglo indexado con al menos 5 nombres completos
$nombres = [
    "Itzel Flores",
    "Valeria Herrera",
    "Michelle Lopez",
    "Cristian Camacho",
    "David Garcia"
];

// Nombre del archivo donde se guardarán los nombres
$nombreArchivo = "asistentes.txt";

try {
    // 2. Tratamos de abrir el archivo en modo escritura ("w")
    // Si el archivo no existe, PHP lo creará automáticamente.
    $RArchivo = fopen($nombreArchivo, "w");

    // Si no se pudo abrir el archivo, lanzamos una excepción
    if (!$RArchivo) {
        throw new Exception("No se pudo abrir el archivo.");
    }

    // 3. Recorremos el arreglo con un foreach
    foreach ($nombres as $nombre) {
        // Escribimos el nombre seguido de un salto de línea
        fwrite($RArchivo, $nombre . PHP_EOL); 
    }

    // 4. Cerramos el archivo correctamente
    fclose($RArchivo);

    echo "Archivo creado y nombres escritos correctamente.";

} catch (Exception $e) {
    // 5. Control de errores con try-catch
    echo "Ocurrió un error: " . $e->getMessage();
}
?>