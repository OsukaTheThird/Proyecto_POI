document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Evitar el envío del formulario por defecto

    // Obtener los valores del formulario
    const email = document.getElementById('correo').value;
    const password = document.getElementById('password').value;

    // Crear el objeto de datos que se enviará al servidor
    const loginData = {
        email: email,
        password: password
    };

    // Realizar la solicitud POST a login.php
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(loginData)
    })
    .then(response => response.json()) // Convertir la respuesta a JSON
    .then(data => {
        if (data.success) {
            // Si el inicio de sesión es exitoso, redirigir al usuario
            window.location.href = '../views/chat.view.php'; 
        } else {
            // Si el login falla, mostrar un mensaje de error
            alert('Login fallido: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
