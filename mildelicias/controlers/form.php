<?php

    session_start();
    require "db.php";
    
    $err = "";

    
    if(!empty($_POST["signup"])){
        $name = $_POST['Name'];
        $password = $_POST['Password'];
        $conpass = $_POST['conPassword'];
        if(empty($name) or empty($password)){
            $err = "<h2 class='error'> Parece que algunos campos están vacíos </h2>";
        }
        elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $err = "<h2 class='error'> Su usuario solo puede tener letras y espacios </h2>";
        }
        elseif(strlen($name) < 4){
            $err = "<h2 class='error'> Su nombre debe de tener almenos 4 caracteres </h2>";
        }

        elseif($conpass != $password){
            $err = "<h2 class='error'> Las contraseñas no coinciden </h2>";
        }
        else{
            $sql = "insert into usuario(user,password) values('$name','$password')";
            $result = mysqli_query($db, $sql);
            if($result==true){
                $collect = mysqli_query($db, "SELECT * FROM usuario WHERE user = '$name' and password = '$password'");
                if($datos = $collect->fetch_object()){
                    $_SESSION['id'] = $datos->idusuario;
                    $_SESSION['name'] = $datos->user;
                    $_SESSION['password'] = $datos->password;
                    header("location: ./controlpanel.php");
                }   
                else{
                    $err = "parece que hubo un error";
                }
            }
            else{
                $err = "parece que hubo un error";
            }
        }
    }
    elseif(!empty($_POST["login"])){
        $name = $_POST['Name'];
        $password = $_POST['password'];
        if(empty($name) or empty($password)){
        $err = "<h2 class='error'> Parece que hay campos vacíos </h2>";
        }
        else{
            $sql = "SELECT * FROM usuario WHERE user = '$name' And password = '$password' ";
            $result = mysqli_query($db, $sql);
            if($datos = mysqli_fetch_object($result)){

                $_SESSION['id'] = $datos->iduser;
                $_SESSION['name'] = $datos->user;
                $_SESSION['password'] = $datos->password;
                header("location: ./controlpanel.php");
                }
                else{
                    $err = "Parece que hubo un error";
                }
            }
            
    }
    elseif(empty($_SESSION['name'])) {
                $_SESSION['id'] = "";
                $_SESSION['name'] = "";
                $_SESSION['password'] = "";

    }
?>