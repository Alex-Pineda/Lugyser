<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../public/ccc/styles.css">
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <form action="../public/index.php?action=login" method="post">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        // Conexión a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'lugyser');

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para verificar usuario y contraseña
        $sql = "SELECT * FROM usuarios WHERE nombre = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $nombre, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Usuario y contraseña correctos
            echo "Inicio de sesión exitoso.";
            // Redirigir a la página de inicio o dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Usuario o contraseña incorrectos
            echo "Nombre de usuario o contraseña incorrectos.";
        }

        // Cerrar conexión
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
