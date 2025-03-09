<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Lugar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Agregar Lugar</h1>
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre_lugar">Nombre del Lugar</label>
                <input type="text" class="form-control" id="nombre_lugar" name="nombre_lugar" required>
            </div>
            <div class="form-group">
                <label for="imagen_lugar">Imagen del Lugar</label>
                <input type="file" class="form-control" id="imagen_lugar" name="imagen_lugar" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
            <div class="form-group">
                <label for="ubicacion_lugar">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion_lugar" name="ubicacion_lugar" required>
            </div>
            <div class="form-group">
                <label for="descripcion_lugar">Descripción</label>
                <textarea class="form-control" id="descripcion_lugar" name="descripcion_lugar" required></textarea>
            </div>
            <div class="form-group">
                <label for="cantidad_habitaciones">Cantidad de Habitaciones</label>
                <input type="number" class="form-control" id="cantidad_habitaciones" name="cantidad_habitaciones" required>
            </div>
            <div class="form-group">
                <label for="disponibilidad_lugar">Disponibilidad</label>
                <input type="checkbox" id="disponibilidad_lugar" name="disponibilidad_lugar">
            </div>
            <div class="form-group">
                <label for="precio_lugar">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio_lugar" name="precio_lugar" required>
            </div>
            <div class="form-group">
                <label for="usuario_has_rol_usuario_idusuario">ID Usuario</label>
                <input type="number" class="form-control" id="usuario_has_rol_usuario_idusuario" name="usuario_has_rol_usuario_idusuario" required>
            </div>
            <div class="form-group">
                <label for="usuario_has_rol_rol_idrol">ID Rol</label>
                <input type="number" class="form-control" id="usuario_has_rol_rol_idrol" name="usuario_has_rol_rol_idrol" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
