<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de proveedor</title>
    <link rel="stylesheet" href="../css/Estilos/publicar_finca.css">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="card bg-light text-dark">
            <div class="card-body">
                <h2 class="card-title text-center">Registrar Finca</h2>
                <form method="post" action="http://192.168.1.7:5500/public/index.php?action=registerLugar">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input name="nombre_lugar" type="text" class="form-control" placeholder="Nombre de la finca" required />
                        </div>
                        <div class="form-group col-md-6">
                            <input name="cantidad_habitaciones" type="number" class="form-control" placeholder="Número de habitaciones" required min="1" />
                        </div>
                        <div class="form-group col-md-6">
                            <input name="cantidad_banos" type="number" class="form-control" placeholder="Número de baños" required min="1" />
                        </div>
                        <div class="form-group col-md-6">
                            <input name="cantidad_piscinas" type="number" class="form-control" placeholder="Número de piscinas" required min="0" />
                        </div>
                        <div class="form-group col-md-6">
                            <select name="juegos_infantiles" class="form-control" required>
                                <option value="" disabled selected>Juegos infantiles</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select name="zonas_verdes" class="form-control" required>
                                <option value="" disabled selected>Zonas verdes</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="descripcion_lugar" class="form-control" placeholder="Descripción de la finca (maximo 70 palabras)" rows="4" required></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input name="ubicacion_lugar" type="text" class="form-control" placeholder="Ubicación o dirección" required />
                        </div>
                        <div class="form-group col-md-12">
                            <input name="precio_lugar" type="number" step="0.01" class="form-control" placeholder="Precio por noche" required />
                        </div>
                        <input type="hidden" name="disponibilidad_lugar" value="disponible" />
                        <input type="hidden" name="usuario_idusuario" value="1" />
                        <input type="hidden" name="rol_idrol" value="2" />
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button type="button" class="btn btn-danger btn-block" onclick="window.history.back()">Cancelar</button>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-warning btn-block">Registrar</button>
                        </div>
                    </div>
                    <p class="text-center">
                        Al registrarte, aceptas los <a href="#" class="text-primary">términos y condiciones</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
