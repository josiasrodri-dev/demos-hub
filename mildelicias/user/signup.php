<?php

    require "../controlers/form.php"

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/accountStyles.css">
    <script src="https://kit.fontawesome.com/7a61a17b2f.js" crossorigin="anonymous"></script>

    <title>Sign up</title>
</head>
<body>
    <div class="contenedor">
        <form method="post">
            <h2>Regístrate</h2>
            <div class="inputcontainer">
            <i class="fa-solid fa-user" style="color: #2d2d2d;"></i>
                <input type="text" name="Name" class="email" placeholder="Nombre de usuario">
            </div>
           
            <div class="inputcontainer">
                <i class="fa-solid fa-key" style="color: #2d2d2d;"></i>
                <input type="password" name="Password" id="pass" placeholder="Su contaseña">
                <i class="fa-solid fa-eye" id="eye" style="color: #2d2d2d;"></i>
            </div>
            <div class="inputcontainer">
                <i class="fa-solid fa-key" style="color: #2d2d2d;"></i>
                <input type="password" name="conPassword" id="conpass" placeholder="Confirmar">
                <i class="fa-solid fa-eye" id="eye2" style="color: #2d2d2d;"></i>
            </div>
            <a href="login.php">¿Ya tienes cuenta? inicia sesión</a>
            <?php echo $err ?>
            <input type="submit" value="Registrarse" name="signup" class="submitbtn">
        </form>
    </div>
    <script src="../scripts/showhide.js"></script>
</body>
</html>