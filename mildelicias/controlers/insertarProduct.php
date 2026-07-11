<?php 

    require "db.php";

if(!empty($_POST['insert'])){
    $name = $_POST['name'];
    $categoria = $_POST['categoria'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $img = $_FILES['img']['name'];
    $location = "../Product".$img;
    $temp = $_FILES['img']['tmp_name'];
    if(empty($name) or empty($categoria) or empty($desc) or empty($price) or empty($img)){
        echo "Parece que no haz completado todos los campos";
    }else {
        $sql = "INSERT into Productos(ProductName,ProductCategory,productDescription,ProductPrice,Imagen) values('$name','$categoria','$desc','$price','$img')";
        $result = mysqli_query($db, $sql);
        if($result==true){
            move_uploaded_file($_FILES['img']['tmp_name'],'../Product/'.$img);

        }else{
            echo "error";
        }
        
    }
}