<?php

    session_start();
    require "./db.php";
    $_SESSION['Car'] = 0;
    header("location: ../home.php");
