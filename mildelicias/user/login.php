<?php 

    require "../controlers/form.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/accountStyles.css">
    <script src="https://kit.fontawesome.com/7a61a17b2f.js" crossorigin="anonymous"></script>

    <title>log in</title>
</head>
<body>
    <div class="contenedor">
        <form method="post">
            <h2>Inicio de sesión</h2>
            <div class="inputcontainer">
            <i class="fa-solid fa-user" style="color: #2d2d2d;"></i>
                <input type="text" name="Name" class="email" placeholder="John">
            </div>
            <div class="inputcontainer">
                <i class="fa-solid fa-key" style="color: #2d2d2d;"></i>
                <input type="password" name="password" id="pass" placeholder="Su contaseña">
                <i class="fa-solid fa-eye" id="eye" style="color: #2d2d2d;"></i>
            </div>
            <?php echo $err ?>
            <a href="signup.php">¿No tienes cuenta? Regístrate</a>
            <input type="submit" value="Inicia sesión" name="login" class="submitbtn">
        </form>
    </div>
    <script src="../scripts/showhide.js"></script>
</body>
</html>