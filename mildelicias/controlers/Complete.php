<?php

require 'searchtable.php';

$Carid = $_GET['id'];


$insertTotalQuery = "UPDATE orden SET estado = 'c' WHERE idorden = $Carid";
$insertTotalResult = mysqli_query($db, $insertTotalQuery);
if ($insertTotalResult) {
    header("location: ../user/controlpanel.php");
}else{
    echo "something is wrong";
}
