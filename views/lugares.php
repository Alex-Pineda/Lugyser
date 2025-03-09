<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lugares Disponibles</title>
    <link rel="stylesheet" href="../public/assets/styles.css">
</head>
<body>
    <h2>Lugares Disponibles</h2>
    <div class="lugares-container">
        <?php
        require_once '../config/database.php';
        require_once '../models/Lugar.php';

        $db = (new Database())->getConnection();
        $lugar = new Lugar($db);
        $lugares = $lugar->getAllLugares();

        foreach ($lugares as $lugar) {
            echo "<div class='lugar'>";
            echo "<h3>" . $lugar['nombre_lugar'] . "</h3>";
            echo "<p>" . $lugar['descripcion_lugar'] . "</p>";
            echo "<p>Ubicación: " . $lugar['ubicacion_lugar'] . "</p>";
            echo "<p>Precio por noche: $" . $lugar['precio_lugar'] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
