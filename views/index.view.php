<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/css/loginStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <main>
        <form class="formulario" name="formulario" id="loginForm" enctype="multipart/form-data" method="post">
            <h1>¡Hola!</h1>

            <div class="formulario_grupo" id="grupo_correo"> 
                <label for="correo" class="formulario_label">Correo Electrónico </label>
                <div> 
                    <input type="text" name="correo" id="correo" class="formulario_input" required> 
                </div>
            </div>

            <div class="formulario_grupo" id="grupo_password">
                <label for="password" class="formulario_label">Contraseña </label>
                <div> 
                    <input type="password" name="password" id="password" class="formulario_input" required>
                </div>
            </div>

            <br>

            <div class="formulario_grupo">
                <button class="formulario_btn" type="submit">Iniciar Sesión</button>
            </div>

            <br>

            <p>¿No tienes una cuenta? <a class="link" href="register.php">Regístrate</a></p>
        </form>
    </main>
    <script src="./js/login.js"></script>
</body>
</html>
