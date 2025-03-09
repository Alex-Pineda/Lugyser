<?php
// Incluir encabezado y conexión a la base de datos si es necesario
include '../config/database.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Finca</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles_reserva.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id='header-container'></div> <!-- Aquí se insertará el encabezado -->
    <main class="main-content">
        <div>
            <h1>Reservar Finca</h1>
            <form action="../controllers/reservar_finca_controlador.php" method="POST">
                <div class="date-picker">
                    <h3>Seleccionar días</h3><br>
                    <label for="start-date">Fecha de inicio:</label>
                    <input id="start-date" name="start-date" type="date" required><br>
                    <label for="end-date">Fecha de fin:</label>
                    <input id="end-date" name="end-date" type="date" required><br>
                </div>
                <div class="reservation-details">
                    <label for="people-count">Número de personas:</label><br>
                    <input class="cantidad-personas" id="people-count" name="people-count" type="number" placeholder="Escribe el número de personas" required><br><br>
                    <label for="payment-method">Método de pago:</label>
                    <select id="payment-method" name="payment-method" required>
                        <option value="credit-card">Tarjeta de crédito</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank-transfer">Transferencia bancaria</option>
                        <option>Nequi</option>
                    </select><br>
                    <button class="botones" type="submit">Reservar</button>
                    <button class="cancel" type="reset">Cancelar</button>
                </div>
            </form>
        </div>
        <div class="image-section">
            <div>
                <img id="imagen" alt="Beautiful resort with a pool and scenic view" height="400" src="../imagenes/finca12.avif" width="800"><br><br>
                <h2 class="total">Total: </h2>
            </div>
            <div class="descripcion">
                <p>¡Escápate de la rutina y descubre el paraíso en nuestra finca de recreo!
                    🌿✨ Relájate en un entorno natural único, rodeado de tranquilidad y 
                    vistas espectaculares. Disfruta de amplias áreas verdes, piscina, zona 
                    de BBQ y todo lo necesario para momentos inolvidables con tu familia o amigos. 
                    Reserva ahora en Lugyser y haz de tu próxima escapada una experiencia mágica. 
                    🏡🌞 ¡Te esperamos!</p>
                <a class="ubicacion" href="#">Ver ubicación</a>
            </div>
        </div>
        <div class="lugar-section">
            <h2>Fincas Disponibles</h2>
            <?php
            $query = "SELECT * FROM lugar WHERE disponibilidad_lugar = 1";
            $result = $conn->query($query);

            if ($result === false) {
                echo "<p>Error en la consulta: " . $conn->error . "</p>";
            } elseif ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='lugar-item'>";
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
        <a href="https://wa.me/tuNumeroDeTelefono" class="whatsapp-icon" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </main>
    <div id='footer-container'></div> <!-- Aquí se insertará el pie de página -->
    <script src="../js/main.js" defer></script>
    <script src="../js/imagen_aleatorio.js" defer></script>
</body>
</html>

<?php
// Incluir pie de página
include '../includes/footer.php';
?>