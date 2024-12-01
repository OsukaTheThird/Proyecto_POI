<?php

class Database{
    public $connection;

    public function __construct($config){
        $dsn = 'mysql:' . http_build_query($config,"",";");

        $this->connection = new PDO($dsn,'root','root');
    }

    public function query($query){
        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

$db_user = "root";
$db_pass = "123456789";
$db_name = "POI";
$db_host = "localhost";
$db_port = "9018";  // puerto de MySQL

#region Conexiones
// conectar a la base de datos usando PDO
function connect (){
    global $db_user, $db_pass, $db_name, $db_host, $db_port;
    try {
        $conn = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);
        // configurar el modo de error de PDO a excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

function close_connection(){
    global $conn;
    $conn = null;
}
#endregion
function Register($email, $name, $lastname, $password, $fotoBlob, $fechaNacimiento, $activo) {
    // Connect using the connection function
    $conn = connect();

    // Prepare the SQL statement with placeholders
    $sql = "CALL sp_Usuario_Add(:email, :name, :lastname, :password, :foto, :fechaNacimiento, :activo)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':foto', $fotoBlob, PDO::PARAM_LOB);  // Aquí usamos PDO::PARAM_LOB para el BLOB
        $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
        $stmt->bindParam(':activo', $activo);

        // Execute the statement
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        // Rethrow the exception to be caught in the calling function
        throw $e;
    } finally {
        // Close the connection
        close_connection();
    }
}

function blobToBase64($blob) {
    return base64_encode($blob);
}

function Login($email, $password) {
    // Conectar usando la función de conexión
    $conn = connect();
    
    // Seleccionar al usuario usando el email
    $sql = "SELECT * FROM Usuario WHERE Email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    // Si el usuario existe
    if (count($result) > 0) {
        $user = $result[0];

        // Verificar la contraseña ingresada con el hash almacenado
        if (password_verify($password, $user['Contrasena'])) {
            close_connection();

            // Preparar el arreglo con los datos del usuario
            $userData = array();
            $userData['Foto'] = blobToBase64($user['Foto']);
            $userData['Nombre'] = $user['Nombre'];
            $userData['Apellido'] = $user['Apellido'];
            $userData['FechaNacimiento'] = $user['FechaNacimiento'];
            $userData['Email'] = $user['Email'];
            $userData['Activo'] = $user['Activo'];

            // Almacenar los datos del usuario en la sesión
            $_SESSION['user'] = $userData;
            return $userData;
        } else {
            // Si la contraseña es incorrecta
            close_connection();
            return null;
        }
    }

    // Si el usuario no fue encontrado
    close_connection();
    return null;
}
#region Chat 1-1

function getChatsByEmail($email) {
    $conn = connect();

    // Consulta que obtiene los chats para el usuario por su correo
    $sql = "SELECT * FROM chats WHERE usuario_email = :email";  // Suponiendo que hay un campo 'usuario_email' en tu tabla de chats
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retorna todos los chats del usuario
}

function getchat($remitente, $destinatario) {
    // Conectar usando la función de conexión
    $conn = connect();
    // Sentencia SQL con marcadores de posición
    $sql = "CALL sp_Get_Chat_Messages(:remitente, :destinatario)";

    try {
        // Preparar la declaración
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros (con tipo explícito)
        $stmt->bindParam(':remitente', $remitente, PDO::PARAM_STR);
        $stmt->bindParam(':destinatario', $destinatario, PDO::PARAM_STR);

        // Ejecutar la declaración
        $stmt->execute();

        // Obtener los resultados
        $chats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $chats;

    } catch (PDOException $e) {
        // Relanzar la excepción para ser atrapada en la función que llama
        throw $e;
    } finally {
        // Cerrar la conexión
        close_connection();
    }
}

function AddChat($texto, $remitente, $destinatario) {
    
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'sendMessage':
            $texto = $_POST['texto'];
            $remitente = $_POST['remitente'];
            $destinatario = $_POST['destinatario'];

            $stmt = $db->getConnection()->prepare("CALL sp_Chat_Add(:texto, :remitente, :destinatario)");
            $stmt->bindParam(':texto', $texto);
            $stmt->bindParam(':remitente', $remitente);
            $stmt->bindParam(':destinatario', $destinatario);
            $stmt->execute();
            echo json_encode(['success' => true]);
            break;

        case 'getMessages':
            $remitente = $_POST['remitente'];
            $destinatario = $_POST['destinatario'];

            $stmt = $db->getConnection()->prepare("CALL sp_Get_Chat_Messages(:remitente, :destinatario)");
            $stmt->bindParam(':remitente', $remitente);
            $stmt->bindParam(':destinatario', $destinatario);
            $stmt->execute();
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($messages);
            break;

        default:
            echo json_encode(['error' => 'Invalid action']);
            break;
    }
}
}
#endregion
