<?php 

    require "../controlers/insertarProduct.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Document</title>
</head>

<body>
    <header>

    </header>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Nombre producto">
            <select name="categoria" id="">
                <option value="" selected disabled>Categoria</option>
                <option value="Bebidas calientes">Bebidas calientes</option>
                <option value="Bebidas frías">Bebidas frías</option>
                <option value="Brunch">Brunch</option>
                <option value="Postres">Postres</option>
            </select>
            <input type="text" name="desc" placeholder="Descripción">
            <input type="number" name="price" placeholder="Precio">
            <input type="file" name="img" id="img">

            <input type="submit" name="insert" value="Insertar">
        </form>
        <div class="ordenes">
            <?php 
            
                $orderquery = "SELECT * FROM orden where estado = 's'";
                $result = mysqli_query($db, $orderquery);
                while($data = mysqli_fetch_array($result)){
                    
                
            
            ?>
            <div class="ordenespera">
           <h2><?php echo $data['idorden']; ?></h2>
           <h3><?php echo $data['producto']; ?></h3>
           <h4>$ <?php echo $data['total']; ?>.00</h3>
           <a href="../controlers/Complete.php?id=<?php echo $data['idorden']; ?>">Completar Orden</a>
            </div>
            <?php } ?>
        </div>
  
</body>

</html>