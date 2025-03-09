<?php
// Incluir encabezado y conexión a la base de datos
include '../includes/header.php';
include '../config/database.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Fincas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles_listar.css">
</head>
<body>
    <div id='header-container'></div> <!-- Aquí se insertará el encabezado -->
    <main class="main-content">
        <h1>Fincas Disponibles</h1>
        <div class="fincas-list">
            <?php
            $query = "SELECT * FROM lugar";
            $result = $conn->query($query);

            if ($result === false) {
                echo "<p>Error en la consulta: " . $conn->error . "</p>";
            } elseif ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='finca-item'>";
                    echo "<h3>" . $row['nombre_lugar'] . "</h3>";
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['imagen_lugar']) . "' alt='" . $row['nombre_lugar'] . "' width='200' height='150'/>";
                    echo "<p>Tipo: " . $row['tipo'] . "</p>";
                    echo "<p>Ubicación: " . $row['ubicacion_lugar'] . "</p>";
                    echo "<p>Descripción: " . $row['descripcion_lugar'] . "</p>";
                    echo "<p>Habitaciones: " . $row['cantidad_habitaciones'] . "</p>";
                    echo "<p>Precio: $" . $row['precio_lugar'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay fincas disponibles en este momento.</p>";
            }
            ?>
        </div>
    </main>
    <div id='footer-container'></div> <!-- Aquí se insertará el pie de página -->
    <script src="../js/main.js" defer></script>
</body>
</html>

<?php
// Incluir pie de página
include '../includes/footer.php';
?>