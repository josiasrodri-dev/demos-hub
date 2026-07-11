<?php 
session_start();
require "./db.php";
$id = $_SESSION['Car'];

$clearcar = "DELETE FROM orden WHERE idorden = $id";
$clearresult = mysqli_query($db, $clearcar);
if($clearresult){
    header("location: ../home.php");
}