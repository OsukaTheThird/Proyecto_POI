window.onload = function() {
    document.getElementById('formulario').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch('register_process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            var mensaje = document.getElementById('mensaje');
            if (data === "success") {
                mensaje.innerText = "Registro exitoso!";
            } else {
                mensaje.innerText = "Error: " + data;
            }
        })
        .catch(error => {
            document.getElementById('mensaje').innerText = "Error: " + error;
        });
    });
};
