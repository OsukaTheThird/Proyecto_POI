<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/css/registerStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!--<box-icon name='power-off'></box-icon>-->
    <title>Syum</title>
</head>

<body>
    <main>

        <div class="title">Registro</div>

        <form class="formulario" name="formulario" id="formulario" enctype="multipart/form-data" method="POST">

            <div class="formulario_grupo" id="grupo_nombre">
                <label for="nombre" class="formulario_label">Nombre(s):</label>
                <div class="formulario_grupo-input">

                    <input type="text" id="nombre" name="nombre"  class="formulario_input">
                    <i class="formulario_validacion-estado bx bxs-x-circle"></i>
                    <p class="formulario_input-error">El Nombre solo puede contener letras y espacios.</p>
                </div>

            </div>

            <!-- apellidos -->
            <div class="formulario_grupo" id="grupo_apellidos">
                <label for="apellido" class="formulario_label">Apellidos:</label>
                <div class="formulario_grupo-input">

                    <input type="text" name="apellido" id="apellido" class="formulario_input">
                    <i class="formulario_validacion-estado bx bxs-x-circle"></i>
                    <p class="formulario_input-error">El Apellido solo puede contener letras espacios.</p>
                </div>

            </div>

            <!-- correo -->
            <div class="formulario_grupo" id="grupo_email">
                <label for="email" class="formulario_label">Email:</label>
                <div class="formulario_grupo-input">

                    <input type="email" name="email" id="email"
                        class="formulario_input">
                    <i class="formulario_validacion-estado bx bxs-x-circle"></i>
                </div>
                <p class="formulario_input-error">Siga el formato tradicional de email aaa.aaa@aaa.aaa.</p>
            </div>

            <!-- contraseña -->
            <div class="formulario_grupo" id="grupo_password">
                <label for="password" class="formulario_label">Contraseña:</label>
                <div class="formulario_grupo-input">

                    <input type="password" name="password" id="password"
                        class="formulario_input">
                    <i class="formulario_validacion-estado bx bxs-x-circle"></i>
                </div>
                <!-- <p class="formulario_input-error">La contraseña debe contener un minimo de 8 caracteres, este debera tener una letra en mayuscula, minusculas, minusculas comos signos de puntuación.</p> -->
                <ul class="formulario_input-error">
                    <li class="mas">Tiene que tener mayusculas</li>
                    <li class="minus">Tiene que tener minusculas</li>
                    <li class="nums">Tiene que tener numeros</li>
                    <li class="sig">Tiene que tener signos</li>
                    <li class="long">Tiene que ser mayor a 6 caracteres</li>
                </ul>
            </div>

            <!-- contraseña2 -->
            <div class="formulario_grupo" id="grupo_password2">
                <label for="password2" class="formulario_label">Confirme su contraseña:</label>
                <div class="formulario_grupo-input">

                    <input type="password" name="password2" id="password2"
                        class="formulario_input">
                    <i class="formulario_validacion-estado bx bxs-x-circle"></i>
                </div>
                <p class="formulario_input-error">Las contraseña deben ser iguales.</p>
            </div>

            <!-- Foto -->
            <div class="formulario_grupo" id="grupo_foto">
                <label for="foto" class="formulario_label">Suba su foto:</label>
                <div class="formulario_grupo-input">
                  
                   <input type="file" class="form-control-file" name="img" id="img">
                </div>
            </div>

            <!-- fecha  -->
            <div class="formulario_grupo" id="grupo_fecha">
                <label for="fechaNacimiento" class="formulario_label">Fecha de Nacimiento:</label>
                <div class="formulario_grupo-input">
                    <input class="formulario_input" type="date" id="fecha" name="fecha" min="1990-01-01"
                        max="2022-09-30" required>
                </div>

            </div>

            <!--Mensaje de error-->
            <div class="formulario_mensaje" id="formulario_mensaje">

                <p><i class='bx bxs-error-alt'></i><b>Error: </b>Por favor, llene el formulario.</p>

            </div>

            <div class="formulario_grupo formulario_grupo-btn-enviar">
                <button class="formulario_btn" type="submit">Registrarse</button>
                <p class="formulario_mensaje-exito" id="formulario_mensaje-exito">Formulario enviado exitosamente!</p>
            </div>

        </form>
        <div class="formulario_grupo" id="grupo_iniciarsesion">
            <p class="details">¿Ya tienes una cuenta?<a class="link" href="index.php">Inicia Sesion</a></p>
        </div>
        <p id="mensaje"></p>

    </main>


    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <!--<script src="js/valdIndex.js"></script>-->
    <script src="./js/register.js"></script>
</body>

</html>