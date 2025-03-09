document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Simulación de validación en la base de datos
    if (username === 'usuario' && password === 'contraseña') {
        window.location.href = 'index.html';
    } else {
        alert('Usuario o contraseña incorrectos');
    }
});

document.getElementById('btn-login').addEventListener('click', function() {
    document.getElementById('login-form').submit();
});
