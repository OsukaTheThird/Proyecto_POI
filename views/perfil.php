<?php 
session_start();

// Comprobar si el usuario está autenticado
if (isset($_SESSION['user'])) {
    // Obtener datos del perfil de usuario
    $user = $_SESSION['user'];
}

/*include_once __DIR__ . '/../functions.php';*/
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="tailwindcss-colors.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../views/css/perfilStyle.css">
    <title>Chat</title>
</head>
<?php require 'partials/sidebar.php' ?>
<body>
    <section class="profile-section">
        <div class="modal-content">
                    <div class="modal-body" id="Perfil">
                       
                        <img src="data:image/jpeg;base64,<?php echo $user['Foto']; ?>" alt="Imagen desde Base64" />
                        <p>Nombre: <a id="NombreUsuario" name="NombreUsuario" class="col-form-label"> <?php echo $user['Nombre']?></a> </p>
                        <p>Apellidos: <a id="ApellidoUsuario" name="ApellidoUsuario" class="col-form-label"><?php echo $user['Apellido']?></a></p>
                        <p>Email: <a id="EmailUsuario" name="EmailUsuario" class="col-form-label"><?php echo $user['Email']?></a></p>
                        <p>Fecha de Nacimiento: <small id="NacimientoUsuario" name="NacimientoUsuario" class="col-form-label"><?php echo $user['FechaNacimiento']?></small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="Boton_editar"  data-toggle="modal" data-target="#ModalUsuarioEditar">Editar</button>
                    </div>
                </div>
    </section>
</body>
</html>