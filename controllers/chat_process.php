<?php
        include_once __DIR__ . '/../Database.php'; // Ajusta la ruta según sea necesario
session_start();

if (isset($_SESSION['user'])) {
    $userEmail = $_SESSION['user'];
    $destinatarioEmail = 'gigyreyesjuarez@hotmail.com'; // Cambia esto según sea necesario

// quiero se muestre a quien estoy mandando el mensaje y quien lo recibe en la consola de la pagina
    echo "Enviando mensaje a: $destinatarioEmail";
    echo "<br>";
    echo "Mensaje de: $userEmail";

    try {
        // Llamar a la función getchat desde Database.php
        if (isset($_SESSION['user'])) {
            $userEmail = $_SESSION['user'];  // Aquí obtienes el email del usuario logueado
            $chats = getChatsByEmail($userEmail);  // Llamas a la función para obtener los chats del usuario
        
            if ($chats) {
                foreach ($chats as $chat) {
                    echo '<p>' . htmlspecialchars($chat['Texto']) . ' - ' . htmlspecialchars($chat['Hora']) . '</p>';
                }
            } else {
                echo "No tienes chats activos.";
            }
        } else {
            echo "Por favor, inicia sesión.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Por favor, inicia sesión.";
}

?>
