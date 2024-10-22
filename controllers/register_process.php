<?php
include_once __DIR__ . '/../Database.php'; // Ajusta la ruta según sea necesario

// Procesar el registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $name = $_POST['nombre'];
    $lastname = $_POST['apellido'];
    $password = $_POST['password'];
    $fechaNacimiento = $_POST['fecha'];
    $activo = 1; // Asignado como constante
    
    // Manejo de la imagen
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $fotoTmpPath = $_FILES['img']['tmp_name'];

        // Verifica si el archivo se subió correctamente al directorio temporal
        if (is_uploaded_file($fotoTmpPath)) {
            // Leer el contenido binario del archivo
            $fotoBlob = file_get_contents($fotoTmpPath);
            
            if ($fotoBlob !== false) {
                    // Hashear la contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);



                // Pasa el contenido binario ($fotoBlob) a la función Register
                try{

                Register($email, $name, $lastname, $hashed_password, $fotoBlob, $fechaNacimiento, $activo);
                echo "success";
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Error al leer el contenido de la imagen.";
            }
        } else {
            echo "Error: el archivo no se subió correctamente.";
        }
    } else {
        echo "Error al cargar la imagen: " . $_FILES['img']['error'];
    }

}
?>
