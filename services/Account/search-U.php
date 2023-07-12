<?php
    include '../conection.php';
    
    $query = $_GET['query'];
    
    $sql = "SELECT * FROM usuarios WHERE (id_role = 1) AND (names LIKE '%$query%' OR first_lastname LIKE '%$query%' OR second_lastname LIKE '%$query%' OR email LIKE '%$query%')";
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
                    <li><a href="#">Clientes</a></li>
                    <li><a href="admin-U.php">Administradores</a></li>
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
                    <li><a href="../../View/Productos/product-U.html">Inventario</a></li>
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
            <div class="rectification">
                <div class="col-1">
                    <div class="title">
                        <h2 class="title">Clientes</h2>
                    </div>
                    <div class="search-container">
                        <form action="search-U.php" method="GET">
                            <input type="text" name="query" placeholder="Buscar usuarios...">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                    <?php
                    // Mostrar los datos en una tabla HTML
                        echo "<table class='tabla-editar'>";
                        echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Fecha de creación</th><th>Email</th><th>Edad</th><th>Dirección</th><th>Género</th></tr>";

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $fila["id"] . "</td>";
                            echo "<td>" . $fila["names"] . "</td>";
                            echo "<td>" . $fila["first_lastname"] . " " . $fila["second_lastname"] . "</td>";
                            echo "<td>" . $fila["created_at"] . "</td>";
                            echo "<td>" . $fila["email"] . "</td>";
                            echo "<td>" . $fila["age"] . "</td>";
                            echo "<td>" . $fila["address"] . "</td>";
                            echo "<form method='POST' action='user-D.php'>";
                            echo "<input type='hidden' name='id' value='" . $fila["id"] . "'>";
                            echo "<td>" . "<button type='submit'>Eliminar</button>" . "</td>";
                            echo "</form>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    ?>
                </div>
                <div class="col-3">
                    <div class="form-box-product">
                        <div class="title">
                            <h2 class="title">Editar</h2>
                        </div>                    
                        <form method="POST" action="user-UX.php">
                            <input type="text" id="id" name="id" placeholder="Escribe el Id del usuario que quieres editar" required>
                            <input type="text" id="names" name="names" placeholder="Nombres" required>
                            <input type="text" id="first_lastname" name="first_lastname" placeholder="Primer apellido" required>
                            <input type="text" id="second_lastname" name="second_lastname" placeholder="Segundo apellido" required>
                            <input type="text" id="email" name="email" placeholder="Email" required>
                            <input type="number" id="age" name="age" placeholder="Edad" required>
                            <input type="text" id="address" name="address" placeholder="Dirección" required>
                            <input type="text" id="gender" name="gender" placeholder="Género" required>
                            <button type="submit" class="btn">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>