//funciones para obtener la ubicacion 

function getLocation(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}

function showPosition(position){
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    
/*     // Mostrar la ubicación en el div
    document.getElementById('output').innerHTML = 
        "Latitud: " + latitude + "<br> Longitud: " + longitude; */

    // Si necesitas enviar la ubicación a un script PHP
    sendLocationToServer(latitude, longitude);
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("No se ha permitido el acceso a la ubicación.");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("La ubicación no está disponible.");
            break;
        case error.TIMEOUT:
            alert("El tiempo de solicitud ha expirado.");
            break;
        case error.UNKNOWN_ERROR:
            alert("Ha ocurrido un error desconocido.");
            break;
    }
}

function sendLocationToServer(latitude, longitude) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../views/perfil.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Manejar la respuesta del servidor si es necesario
        }
    };
    xhr.send("latitude=" + latitude + "&longitude=" + longitude);
}