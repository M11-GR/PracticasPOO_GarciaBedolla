<?php
$archivo = "asistentes.txt";

try {
    if (!file_exists($archivo)) {
        throw new Exception("El archivo no existe.");
    }

    $fp = fopen($archivo, "r");

    if (!$fp) {
        throw new Exception("No se pudo abrir el archivo para lectura.");
    }

    echo "<ol>";

    while (!feof($fp)) {
        $linea = fgets($fp);
        $linea_limpia = trim($linea);

        if (!empty($linea_limpia)) {
            echo "<li>" . htmlspecialchars($linea_limpia) . "</li>";
        }
    }

    echo "</ol>";

    fclose($fp);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>