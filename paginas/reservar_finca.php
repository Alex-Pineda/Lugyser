<?php
// Incluir encabezado
include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles_reserva.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id='header-container'></div> <!-- Aquí se insertará el encabezado -->
    <main class="main-content">
        <div>
            <form action="../controladores/reservar_finca_controlador.php" method="POST">
                <div class="date-picker">
                    <h3>Seleccionar días</h3><br>
                    <label for="start-date">Fecha inicio / final</label>
                    <input id="start-date" name="start-date" type="date" required>
                    <input id="end-date" name="end-date" type="date" required>
                </div>
                <div class="reservation-details">
                    <label for="people-count">Cantidad personas mayores de 5 años</label><br>
                    <input class="cantidad-personas" name="people-count" type="number" placeholder="Escribe el número de personas" required>
                    <br><br>
                    <label for="payment-method">Método de pago</label>
                    <select id="payment-method" name="payment-method" required>
                        <option>PayPal</option>
                        <option>PSE</option>
                        <option>Tarjeta de crédito</option>
                        <option>Nequi</option>
                    </select>
                    <button class="botones" type="submit">Confirmar</button>
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