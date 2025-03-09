<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Lugares</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Lista de Lugares</h1>
        <a href="create.php" class="btn btn-primary mb-3">Agregar Lugar</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Ubicación</th>
                    <th>Descripción</th>
                    <th>Habitaciones</th>
                    <th>Disponibilidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lugares as $lugar): ?>
                    <tr>
                        <td><?php echo $lugar['idlugar']; ?></td>
                        <td><?php echo $lugar['nombre_lugar']; ?></td>
                        <td><?php echo $lugar['tipo']; ?></td>
                        <td><?php echo $lugar['ubicacion_lugar']; ?></td>
                        <td><?php echo $lugar['descripcion_lugar']; ?></td>
                        <td><?php echo $lugar['cantidad_habitaciones']; ?></td>
                        <td><?php echo $lugar['disponibilidad_lugar'] ? 'Disponible' : 'No Disponible'; ?></td>
                        <td><?php echo $lugar['precio_lugar']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
