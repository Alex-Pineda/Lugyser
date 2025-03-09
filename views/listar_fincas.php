<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Fincas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="card bg-light text-dark">
            <div class="card-body">
                <h2 class="card-title text-center">Fincas Publicadas</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Habitaciones</th>
                                <th>Baños</th>
                                <th>Piscinas</th>
                                <th>Juegos Infantiles</th>
                                <th>Zonas Verdes</th>
                                <th>Descripción</th>
                                <th>Ubicación</th>
                                <th>Precio por Noche</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Conexión a la base de datos
                            $conn = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');

                            // Verificar la conexión
                            if ($conn->connect_error) {
                                die("Conexión fallida: " . $conn->connect_error);
                            }

                            // Consulta para obtener las fincas
                            $sql = "SELECT nombre_lugar, cantidad_habitaciones, cantidad_banos, cantidad_piscinas, juegos_infantiles, zonas_verdes, descripcion_lugar, ubicacion_lugar, precio_lugar FROM lugar WHERE disponibilidad_lugar = 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Mostrar los datos de cada fila
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$row['nombre_lugar']}</td>
                                        <td>{$row['cantidad_habitaciones']}</td>
                                        <td>{$row['cantidad_banos']}</td>
                                        <td>{$row['cantidad_piscinas']}</td>
                                        <td>{$row['juegos_infantiles']}</td>
                                        <td>{$row['zonas_verdes']}</td>
                                        <td>{$row['descripcion_lugar']}</td>
                                        <td>{$row['ubicacion_lugar']}</td>
                                        <td>\${$row['precio_lugar']}</td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No hay fincas publicadas</td></tr>";
                            }

                            // Cerrar la conexión
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
