<?php
session_start();
require "db.php";
$mesaid = $_SESSION['mesa'];
$ClearTable = "UPDATE mesa SET uso = 0 WHERE numero = $mesaid";
$result= mysqli_query($db, $ClearTable);
session_destroy();
header("location: ../Welcome.php");
