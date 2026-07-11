<?php

session_start();
require "./db.php";
$Carid = $_SESSION['Car'];



$findTotalQuery = "SELECT SUM(subtotal) from orden WHERE idorden = $Carid";
$findTotalResult = mysqli_query($db, $findTotalQuery);
$data = mysqli_fetch_assoc($findTotalResult);
$sumtotal = $data['SUM(subtotal)'];

$insertTotalQuery = "UPDATE orden SET total = $sumtotal,estado = 's' WHERE idorden = $Carid";
$insertTotalResult = mysqli_query($db, $insertTotalQuery);
if ($insertTotalResult) {
    header("location: ../home.php");
}else{
    echo "something is wrong";
}
