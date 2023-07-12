<?php
    include '../conection.php';
    require_once('../../TCPDF/tcpdf.php');

    session_start();

    // Verificar si el usuario ha iniciado sesión
    if(isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $userEmail = $_SESSION['user_email'];
        $userRole = $_SESSION['user_role'];
        $message = "Usuario: ";
    } else {
        $message = "No hay sesión activa";
    }
    
    $sql = "SELECT 
                orden.id AS id,
                productos.name AS name,
                productos.price AS price,
                productos.type AS type,
                productos.color AS color,
                productos.size AS size
            FROM orden INNER JOIN productos ON orden.id_product = productos.id";
    $resultado = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/styles.css">
    <link rel="shortcut icon" href="../../img/Browser/Favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,700;1,900&display=swap" rel="stylesheet">
    <title>Imagen Perfecta</title>
</head>

<body>
    <!-- ENCABEZADO -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="../../index.html">
                        <img src="../../img/Header/Logo.png" width="125px">
                    </a>
                </div>
                <nav id="menu">
                    <ul>
                        <li><a href="../../index.html">Inicio</a></li>
                        <li><a href="product-R.php">Productos</a></li>
                        <li><a href="../../location.html">Ubicación</a></li>
                        <li><a href="../../login.html">Cuenta</a></li>
                    </ul>
                </nav>
                <a href="#">
                    <img class="bag" src="../../img/Header/Bolsa.png" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <div class="form-box">
                        <div class="title">
                            <h2 class="title">Carrito</h2>
                        </div>
                        <?php
                        // Mostrar los datos en una tabla HTML
                            echo "<table class='tabla-editar'>";
                            echo "<h2 class='title'>" . $message . $userEmail ."</h2>";
                            echo "<tr><th>Nombre</th><th>Precio</th><th>Tipo de producto</th><th>Color</th><th>Talla</th></tr>";
                            $total = 0;

                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $fila["name"] . "</td>";
                                echo "<td>" . $fila["price"] . "</td>";
                                echo "<td>" . $fila["type"] . "</td>";
                                echo "<td>" . $fila["color"] . "</td>";
                                echo "<td>" . $fila["size"] . "</td>";
                                echo "<form method='post' action='product-SCD.php'>";
                                echo "<input type='hidden' name='id' value='" . $fila["id"] . "'>";
                                echo "<td>" . "<button type='submit'>Eliminar</button>" . "</td>";
                                echo "</form>";
                                echo "</tr>";

                                $total = $total + $fila["price"];
                            }
                            echo "</table>";
                            echo "<table class='tabla-editar'>";
                            echo "<tr><td>Total a pagar<td/><tr/>";
                            echo "<tr><td>" . $total . "<td/><tr/>";
                            echo "<table/>";
                            echo "<form method='post' action='pdf.php'>";
                            echo "<button type='submit' class='btn'>Comprar</button>";
                            echo "</form>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
