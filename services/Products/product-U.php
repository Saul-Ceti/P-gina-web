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
    <link rel="stylesheet" href="/styles/styles.css">
    <link rel="shortcut icon" href="../../img/Browser/Favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,700;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Imagen Perfecta</title>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img src="../../img/Header/Diamante.png">
            <span class="logo-name">Imagen Perfecta</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bxs-grid' ></i>
                    <span class="link-name">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-user' ></i>
                        <span class="link-name">Usuarios</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="#">Usuarios</a></li>
                    <li><a href="../Account/user-U.php">Clientes</a></li>
                    <li><a href="../Account/admin-U.php">Administradores</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-credit-card-alt'></i>
                        <span class="link-name">Ventas</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="#">Ventas</a></li>
                    <li><a href="#">Balance</a></li>
                    <li><a href="#">Prestamos</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-shopping-bag'></i>
                        <span class="link-name">Productos</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="#">Productos</a></li>
                    <li><a href="../../View/Productos/product-C.html">Agregar</a></li>
                    <li><a href="#">Inventario</a></li>                    
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-stats'></i>
                        <span class="link-name">Estadistícas</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="#">Estadistícas</a></li>
                    <li><a href="#">Opiniones</a></li>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Ventas</a></li>                    
                </ul>
            </li>
            <li>
                <div class="icon-links">
                    <a href="#">
                        <i class='bx bx-package'></i>
                        <span class="link-name">Envíos</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="#">Envíos</a></li>
                    <li><a href="#">Finalizados</a></li>
                    <li><a href="#">En camino</a></li>
                    <li><a href="#">Peticiones</a></li>                    
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../../img/profile.jpg" alt="profile">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Eliud Hernández</div>
                        <div class="job">Director</div>
                    </div>
                    <a href="../../login.html">
                        <i class='bx bx-log-out'></i>
                    </a>
                </div>            
            </li>
        </ul>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <div class="title">
                        <h2 class="title">Inventario</h2>
                    </div>           
                    <?php
                    // Mostrar los datos en una tabla HTML
                        echo "<table class='tabla-editar'>";
                        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Tipo de producto</th><th>Color</th><th>Talla</th><th>Cantidad</th><th>Fecha de creación</th><th>Estatus</th></tr>";

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $fila["id"] . "</td>";
                            echo "<td>" . $fila["name"] . "</td>";
                            echo "<td>" . $fila["price"] . "</td>";
                            echo "<td>" . $fila["type"] . "</td>";
                            echo "<td>" . $fila["color"] . "</td>";
                            echo "<td>" . $fila["size"] . "</td>";
                            echo "<td>" . $fila["stock"] . "</td>";
                            echo "<td>" . $fila["created_at"] . "</td>";
                            echo "<td>" . $fila["status"] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    ?>
                    <div class="form-box-product">
                        <div class="title">
                            <h2 class="title">Editar</h2>
                        </div>                    
                        <form method="POST" action="product-UX.php">
                            <input type="text" id="id" name="id" placeholder="id" required>
                            <input type="text" id="name" name="name" placeholder="nombre" required>
                            <input type="number" id="price" name="price" placeholder="Precio" required>                
                            <input type="text" id="type" name="type" placeholder="Tipo" required>
                            <input type="text" id="color" name="color" placeholder="Color" required>
                            <input type="text" id="size" name="size" placeholder="Talla" required>
                            <input type="number" id="stock" name="stock" placeholder="Cantidad" required>
                            <input type="text" id="status" name="status" placeholder="Estatus" required>
                            <button type="submit" class="btn">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>