<?php
    session_start();
    require "db.php";
    $s = "";
    $thereTable = "SELECT * FROM mesa WHERE uso = '0' limit 1";
    $searchTable = mysqli_query($db, $thereTable);
    $data = mysqli_fetch_assoc($searchTable);
    if(mysqli_num_rows($searchTable) > 0){
       
        
        $id = $data['idmesa'];
        $num = $data['numero'];
        $ReserveTableQuery = "UPDATE mesa set uso = 1 WHERE idmesa = $id ";
        $ReserveResult = mysqli_query($db, $ReserveTableQuery);
        if($ReserveResult){
            echo "<h2> Su mesa es la No. $num </h2>";
            $_SESSION['mesa'] = $num;
            $_SESSION['mesaid'] = $id;
            $_SESSION['Car'] = 0; 
            header("location: ../home.php");
        }else{
            $_SESSION['mesa'] = "";
            $_SESSION['mesaid'] = "";
            $_SESSION['Car'] = 0; 
        }
    }else{
        echo "<h2> Ups... todas nuestras mesas están llenas </h2>";
        $full = "<h2> Ups... todas nuestras mesas están llenas </h2>";
    }

?>