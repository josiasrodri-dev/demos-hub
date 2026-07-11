<?php
session_start();
require "./controlers/db.php";
error_reporting(0);
if($_SESSION['mesa']== 0){
    header("Location: Welcome.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://kit.fontawesome.com/2c2fe026c8.js" crossorigin="anonymous"></script>
    <title>Mildelicias</title>
</head>

<body>
    <header>
        <img src="./Pictures/Logo.jpg" alt="" id="logo">
        <form method="post" class="menu">
            <input type="text" name="search-content" id="search" placeholder="¿Qué se te antoja hoy?">
            <button type="submit" name="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        
        <div class="account">
            <i class="fa-solid fa-cart-shopping" id="car"></i>
            <i class="fa-regular fa-circle-user" id="user"></i>
            <div class="userinfo" id="usercontent">
                <h2> Mesa No. <?php echo $_SESSION['mesa'] ?> </h2>
                <hr>
                <a href="./controlers/cerrarsession.php">Salir</a>
            </div>
            
         <div class="car" id="modalcar">
                <div class="layout">
                    <div class="carcontent">

                        <div class="flex-order">
                            <div class="scrollmargin">
                                <div class="producttable">
                                    <?php

                                    $searchincar = "SELECT * FROM orden WHERE idorden = $_SESSION[Car]";
                                    $searchResult = mysqli_query($db, $searchincar);
                                    if (mysqli_num_rows($searchResult) <= 0) {
                                        echo "<div class='emptycar'><h2> Aún no has ordenado nada... </h2></div>";
                                    }
                                    while ($data = mysqli_fetch_array($searchResult)) {


                                    ?>

                                    <div class="products">
                                        <img src="Product/<?php echo $data['imagen']?>" alt="">
                                        <h2><?php echo $data['producto']?></h2>
                                        
                                           
                                            <p><?php echo $data['cantidad']?></p>
                                           
                                        
                                        <h3>$ <?php echo $data['precio']?>.00</h3>
                                    </div>

                                    <?php } ?>
                                </div>
                            </div>

                            <div class="total">
                            <div class="details">
                                <?php
                                $idcar = $_SESSION['Car'];
                                $searchincar = "SELECT * FROM orden WHERE idorden = $idcar";
                                $searchResult = mysqli_query($db, $searchincar);
                                while ($data = mysqli_fetch_array($searchResult)) {

                                ?>
                                
                                    <div class="otherdetails">
                                        <h2><?php echo $data['producto']?></h2>
                                        
                                        <p class="subtotal">$ <?php echo $data['subtotal']?>.00</p>
                                        <hr>
                                    </div>
                                   
                                
                                <?php } ?>
                                <div class="totales">
                                <h2 id="total"> TOTAL: </h2>
                                <p>
                                <?php 
                                
                                    $findTotalQuery = "SELECT SUM(subtotal) from orden WHERE idorden = $idcar";
                                    $findTotalResult = mysqli_query($db, $findTotalQuery);
                                    $data = mysqli_fetch_assoc($findTotalResult);
                                    $sumtotal = $data['SUM(subtotal)'];

                                    echo "$ $sumtotal.00"
                                ?>
                                
                                </p>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="pay">
                            <button id="Continue"> Seguir comprando <i class="fa-solid fa-cart-shopping"></i></button>
                            <a href="./controlers/trashcar.php" id="Trash"> Vaciar carrito <i class="fa-solid fa-trash"></i></a>
                            <a href="./controlers/Done.php" id="Order"> Ordenar <i class="fa-solid fa-receipt"></i></a>
                            <a href="./controlers/pay.php" id="Pay"> Pagar <i class="fa-solid fa-sack-dollar"></i></a>
                        </div>

                    </div>
                </div>
            </div> 
            
        </div>
    </header>
    
    <div class="bodycontent">
        
        <form class="filter" method="post">
            <select name="search-content" id="">
                <option value="" selected disabled>Categoria</option>
                <option value="Bebidas calientes">Bebidas calientes</option>
                <option value="Bebidas frías">Bebidas frías</option>
                <option value="Brunch">Brunch</option>
                <option value="Postres">Postres</option>
            </select>
            <input type="submit" name="buscar" value="Buscar">
        </form>

        <div class="results">
            <?php
            $search = $_POST['search-content'];
            $where = null;
           if(isset($_POST['Search'])){
                $where = " WHERE ProductName LIKE'%".$search."%' OR ProductCategory LIKE '%".$search."%'";
            }
            elseif(isset($_POST['buscar'])){
                $where = " WHERE ProductName LIKE'%".$search."%' OR ProductCategory LIKE '%".$search."%'";

            }
            $searchquery = "SELECT * FROM Productos $where";
            $queryResult = mysqli_query($db, $searchquery);

            while ($data = mysqli_fetch_array($queryResult)) {

            ?>
            <div class="content">
                <div class="product">
                    <img src="./Product/<?php echo $data['Imagen'] ?>">
                </div>
                <div class="desc">
                    <h2><?php echo $data['ProductName'] ?></h2>
                    <h3><?php echo $data['ProductCategory'] ?></h3>
                    <p><?php echo $data['productDescription'] ?></p>
                    <p class="price"><?php echo $data['ProductPrice'] ?> $</p>
                    <form action="controlers/intocar.php?id=<?php echo $data['idProductos'] ?>" method="post"
                        class="add">
                        <div class="quantitys">
                            <i class="fa-solid fa-plus more"></i>
                            <input type="number" name="quantity" class="quantity" value="1">
                            <i class="fa-solid fa-minus less"></i>
                        </div>
                        <button class="addbtn" type="submit"> Add <i class="fa-solid fa-cart-shopping"></i> </button>
                    </form>
                </div>


            </div>
            <?php } ?>
        </div>
    </div>
    <script src="scripts/script.js"></script>
</body>

</html>