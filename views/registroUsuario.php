<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- ...existing code... -->
</head>
<body>
    <div id="header-container"></div>
    <form class="formulario" method="post" action="../public/index.php?action=register">
        <div class="register-container">
            <h2>Ingresa tus datos</h2>
            <div class="seleccion">
                <div class="datos1">
                    <input name="nombre" type="text" placeholder="Nombres" required />
                    <input name="apellido" type="text" placeholder="Apellidos" required />
                    <input name="nombre_usuario" type="text" placeholder="Nombre de usuario" required />
                    <input name="contrasena" type="password" placeholder="Crear contraseña" required />
                </div>
                <div class="datos2">
                    <input name="email" type="email" placeholder="Correo electrónico" required />
                    <select name="tipo_documento" required>
                        <option value="" disabled selected>Tipo de documento</option>
                        <option value="Cedula">Cedula</option>
                        <option value="Cedula_extranjera">Cedula extranjera</option>
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="Targeta_identidad">Targeta de identidad</option>
                        <option value="Niup">Niup</option>
                        <option value="DNI">DNI</option>
                    </select>
                    <input name="documento_identidad" type="text" placeholder="Documento de identidad" required />
                    <input name="telefono" type="tel" placeholder="Número de teléfono" required />
                </div>
            </div>
            <div class="button-container">
                <button type="button" class="btn-cancel" onclick="window.history.back()">Cancelar</button>
                <button type="submit" class="btn-register">Aceptar</button>
            </div><br>
            <p class="terms">
                Al registrarte, aceptas los <a href="restaurar_contrasena.html">términos y condiciones</a>.
            </p>
        </div>
    </form>
    <!-- ...existing code... -->
</body>
</html>
