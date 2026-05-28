<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Asistentes</title>
</head>
<body>
    <h2>Registrar Asistente</h2>
    <form method="POST" action="">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Registrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreAsistente = trim($_POST["nombre"]);
        $nombreArchivo = "asistentes.txt";

        try {
            // Usamos "a" para que se vayan sumando y no se borren los anteriores
            $RArchivo = fopen($nombreArchivo, "a");

            if (!$RArchivo) {
                throw new Exception("No se pudo abrir el archivo.");
            }

            // Escribimos el nombre que mandó el usuario
            fwrite($RArchivo, $nombreAsistente . PHP_EOL);
            fclose($RArchivo);

            echo "<p style='color: green;'>¡$nombreAsistente ha sido registrado con éxito!</p>";

        } catch (Exception $e) {
            echo "<p style='color: red;'>Ocurrió un error: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</body>
</html>