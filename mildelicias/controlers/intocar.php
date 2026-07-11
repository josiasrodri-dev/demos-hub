<?php

session_start();
require "./db.php";

$id = $_GET['id'];
$orderID = $_SESSION['Car'];
$quantity = $_POST['quantity'];

$searchProductsQuery = "SELECT * FROM Productos WHERE idProductos = $id";
$searchProductResult = mysqli_query($db, $searchProductsQuery);
$data = mysqli_fetch_assoc($searchProductResult);
$product = $data['ProductName'];
$price = $data['ProductPrice'];
$image = $data['Imagen'];

$subtotal = $price * $quantity;

if ($_SESSION['Car'] == 0) {
    $searchOrderQuery = "SELECT idorden FROM orden ORDER BY idorden DESC limit 1";
    $searchOrderResult = mysqli_query($db, $searchOrderQuery);
    if (mysqli_num_rows($searchOrderResult) <= 0) {
        
        $InsertOrderQuery = "INSERT INTO orden(idorden,producto,cantidad,precio,subtotal,estado,imagen) VALUES('1','$product','$quantity','$price','$subtotal','p', '$image')";
        $InsertOrderResult = mysqli_query($db, $InsertOrderQuery);
        if($InsertOrderResult){
            $_SESSION['Car'] = 1;
            header("location: ../home.php");
        }
    }else{
        $lastIDsearch = mysqli_fetch_assoc($searchOrderResult);
        $lastID = $lastIDsearch['idorden'];
        $newID = $lastID + 1;
        $InsertOrderQuery = "INSERT INTO orden(idorden,producto,cantidad,precio,subtotal,estado,imagen) VALUES('$newID','$product','$quantity','$price','$subtotal','p', '$image')";
        $InsertOrderResult = mysqli_query($db, $InsertOrderQuery);
        if($InsertOrderResult){
            $_SESSION['Car'] = $newID;
            header("location: ../home.php");
        }
    }
}
else{
    $InsertOrderQuery = "INSERT INTO orden(idorden,producto,cantidad,precio,subtotal,estado,imagen) VALUES('$orderID','$product','$quantity','$price','$subtotal','p', '$image')";
    $InsertOrderResult = mysqli_query($db, $InsertOrderQuery);
    if($InsertOrderResult){
        echo "si";
        header("location: ../home.php");
    }else{
        echo "no";
    }
}
