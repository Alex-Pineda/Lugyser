<?php
require_once '../controllers/UsuarioController.php';
require_once '../controllers/LugarController.php';
require_once '../controllers/ReservaController.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        $controller = new UsuarioController();
        $result = $controller->login($_POST['nombre'], $_POST['password']);
        if ($result) {
            header('Location: ../views/dashboard.php');
        } else {
            echo "Error en el inicio de sesión.";
        }
        break;
    case 'register':
        $controller = new UsuarioController();
        $result = $controller->register($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['telefono'], $_POST['direccion'], $_POST['ciudad'], $_POST['pais'], $_POST['codigo_postal'], $_POST['arg9']);
        if ($result) {
            header('Location: ../views/login.php');
        } else {
            echo "Error en el registro.";
        }
        break;
    case 'registerLugar':
        $controller = new LugarController();
        $result = $controller->createLugar([
            'nombre_lugar' => $_POST['nombre_lugar'],
            'imagen_lugar' => $_POST['imagen_lugar'],
            'tipo' => $_POST['tipo'],
            'ubicacion_lugar' => $_POST['ubicacion_lugar'],
            'descripcion_lugar' => $_POST['descripcion_lugar'],
            'cantidad_habitaciones' => $_POST['cantidad_habitaciones'],
            'disponibilidad_lugar' => $_POST['disponibilidad_lugar'],
            'precio_lugar' => $_POST['precio_lugar'],
            'usuario_idusuario' => $_POST['usuario_idusuario'],
            'rol_idrol' => $_POST['rol_idrol'],
            'cantidad_banos' => $_POST['cantidad_banos'],
            'cantidad_piscinas' => $_POST['cantidad_piscinas'],
            'juegos_infantiles' => $_POST['juegos_infantiles'],
            'zonas_verdes' => $_POST['zonas_verdes']
        ]);
        if ($result) {
            header('Location: http://192.168.1.7:5500/views/detalle_lugar.php?id=' . $result);
        } else {
            echo "Error en el registro del lugar.";
        }
        break;
    case 'viewReservations':
        // Conectar a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'lugyser');

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consultar las reservas
        $sql = "SELECT * FROM reservas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar las reservas
            echo "<table class='table table-striped'><thead class='thead-dark'><tr><th>ID</th><th>Nombre</th><th>Fecha</th><th>Estado</th></tr></thead><tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["fecha"] . "</td><td>" . $row["estado"] . "</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No hay reservas realizadas.";
        }

        // Cerrar la conexión
        $conn->close();
        break;
    case 'registerReserva':
        // Obtener los datos del formulario
        $nombre_cliente = $_POST['nombre_cliente'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_final = $_POST['fecha_final'];
        $cantidad_personas = $_POST['cantidad_personas'];
        $estado_reserva = $_POST['estado_reserva'];
        $pago_idpago = $_POST['pago_idpago'];
        $usuario_idusuario = $_POST['usuario_has_rol_usuario_idusuario'];
        $rol_idrol = $_POST['usuario_has_rol_rol_idrol'];
        $lugar_idlugar = $_POST['lugar_idlugar'];

        // Conectar a la base de datos
        $conn = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO reserva (nombre_cliente, fecha_inicio, fecha_final, cantidad_personas, estado_reserva, pago_idpago, usuario_has_rol_usuario_idusuario, usuario_has_rol_rol_idrol, lugar_idlugar)
                VALUES ('$nombre_cliente', '$fecha_inicio', '$fecha_final', '$cantidad_personas', '$estado_reserva', '$pago_idpago', '$usuario_idusuario', '$rol_idrol', '$lugar_idlugar')";

        if ($conn->query($sql) === TRUE) {
            echo "Reserva registrada exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
        break;
    default:
        echo "Acción no válida.";
        break;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'registerLugar') {
    // Obtener los datos del formulario
    $nombre_lugar = $_POST['nombre_lugar'];
    $cantidad_habitaciones = $_POST['cantidad_habitaciones'];
    $cantidad_banos = $_POST['cantidad_banos'];
    $cantidad_piscinas = $_POST['cantidad_piscinas'];
    $juegos_infantiles = $_POST['juegos_infantiles'];
    $zonas_verdes = $_POST['zonas_verdes'];
    $descripcion_lugar = $_POST['descripcion_lugar'];
    $ubicacion_lugar = $_POST['ubicacion_lugar'];
    $precio_lugar = $_POST['precio_lugar'];

    // Conectar a la base de datos
    $conn = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO lugares (nombre, habitaciones, banos, piscinas, juegos_infantiles, zonas_verdes, descripcion, ubicacion, precio)
            VALUES ('$nombre_lugar', '$cantidad_habitaciones', '$cantidad_banos', '$cantidad_piscinas', '$juegos_infantiles', '$zonas_verdes', '$descripcion_lugar', '$ubicacion_lugar', '$precio_lugar')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "Registro exitoso";
        header('Location: http://192.168.1.7:5500/views/detalle_lugar.php?id=' . $last_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
