<?php
    include '../conection.php';    
    $sql = "SELECT * FROM productos";
    $resultado = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="services" href="../conection.php">
    <link rel="shortcut icon" href="../../img/Browser/Favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Imagen Perfecta | Todos los productos</title>

</head>

<body>
    <!-- ENCABEZADO -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html">
                        <img src="../../img/Header/Logo.png" width="125px">
                    </a>
                </div>
                <nav id="menu">
                    <ul>
                        <li><a href="../../index.html">Inicio</a></li>
                        <li><a href="../../products.html">Productos</a></li>
                        <li><a href="../../location.html">Ubicación</a></li>
                        <li><a href="../../login.html">Cuenta</a></li>
                    </ul>
                </nav>
                <a href="shopping-cart.php">
                    <img class="bag" src="../../img/Header/Bolsa.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="small-container">
        <div class="row">
            <select>
                <option>Default</option>
                <option>Por mayor precio</option>
                <option>Por menor precio</option>
                <option>Por mayor calificación</option>
                <option>Por menor calificación</option>
            </select>
        </div>
    </div>

    <!-- PRODUCTOS DESTACADOS -->
    <div class="categories">
        <div class="small-container">
            <div class="title">
                <h1>
                    Productos
                </h1>
            </div>
            <?php
            echo "<div class='row'>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                if($fila["status"] == 1){
                    echo "<div class='featured'>";                    
                        echo "<img src='" . $fila["imagen"] . "'>";
                        echo "<h4>" . $fila["name"] . "</h4>";
                        echo "<span class='material-symbols-outlined'>star</span>";
                        echo "<span class='material-symbols-outlined'>star</span>";
                        echo "<span class='material-symbols-outlined'>star</span>";
                        echo "<span class='material-symbols-outlined'>star</span>";
                        echo "<span class='material-symbols-outlined'>star</span>";
                        echo "<p>" . $fila["price"] . "</p>";
                        echo "<form method='post' action='product-SC.php'>";
                        echo "<input type='hidden' name='id_product' value='" . $fila["id"] . "'>";
                        echo "<input type='hidden' name='id_user' value='1'>";
                        echo "<button type='submit' class='btn'>Comprar</button>";
                        echo "</form>";
                    echo "</div>";
                }                
            }
            echo "</div>"
            ?>
        </div>
    </div>
</body>

<footer class="footer">
    <div class="row">
        <div class="col-footer">
            <img src="img/Header/Logo.png">
        </div>
        <div class="col-footer">
            <P>© 2023 Imagen Perfecta. Todos los derechos reservados</P>
        </div>
        <div class="col-footer">

        </div>
    </div>
</footer>

</html>