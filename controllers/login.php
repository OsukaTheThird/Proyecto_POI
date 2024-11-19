<?php
// Iniciar sesión (si deseas mantener la sesión activa para el usuario)
session_start();

include_once __DIR__ . '/../Database.php'; // Ajusta la ruta según sea necesario

header('Content-Type: application/json');

// Comprobar si el método de la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtener los datos enviados a través de la solicitud POST
    $input = json_decode(file_get_contents('php://input'), true);

    // Verificar que los parámetros obligatorios estén presentes
    if (isset($input['email']) && isset($input['password'])) {
        $email = $input['email'];
        $password = $input['password'];

        // Llamar a la función Login para verificar las credenciales
        $user = Login($email, $password);

        if ($user !== null) {
            // Iniciar una sesión para el usuario, si se desea
            $_SESSION['email'] = $user['Email'];

            // Responder con éxito y los datos del usuario
            echo json_encode([
                'success' => true,
                'user' => [
                    'Nombre' => $user['Nombre'],
                    'Apellido' => $user['Apellido'],
                    'Email' => $user['Email'],
                    'FechaNacimiento' => $user['FechaNacimiento'],
                    'Foto' => blobToBase64($user['Foto']), // Asegúrate de convertir la foto aquí

                    $_SESSION['user']
                ]
            ]);
        } else {
            // Credenciales incorrectas
            echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
        }
    } else {
        // Faltan parámetros
        echo json_encode(['success' => false, 'message' => 'Email y contraseña son obligatorios']);
    }
} else {
    // Método incorrecto
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no permitido']);
}
?>
