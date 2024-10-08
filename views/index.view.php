<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <main>
        <form class="formulario" name="formulario" enctype="multipart/form-data"  method="post">
            <h1>¡Hola!</h1>

            <div class="formulario_grupo" id="grupo_correo"> 
                <label for="usuario" class="formulario_label">Correo Electrónico </label>
                <div> 
                    <input type="text" name="correo" id="correo" class="formulario_input"> 

                </div>

            </div>

            <div class="formulario_grupo" id="grupo_password">
                <label for="password" class="formulario_label">Contraseña </label>
                <div> 
                    <input type="text" name="correo" id="correo" class="formulario_input"> 
                    
                </div>

            </div>

            <br>

            <div class="formulario_grupo">
                <button class="formulario_btn" type="submit" >Iniciar Sesión</button>
            </div>

            <br>

            <p>¿No tienes una cuenta? <a class="link" href="registro.php">Regístrate </a></p>

        </form>


    </main>
    
</body>
</html>