<?php
    include '../conection.php';

    // Inicio de sesión
    session_start();
    
    // Conectar a la base de datos y crear la nueva entrada
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'");

    if (mysqli_num_rows($sql) == 1) {
        $row = mysqli_fetch_assoc($sql);
    
        // Almacenar los datos del usuario en la sesión
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_role'] = $row['id_role'];
        $_SESSION['user_name'] = $row['names'];

        // Redireccionar según el rol del usuario
        if ($row['id_role'] == 2) {
            header("location: ../../administrator.html");
        } else {
            header("location: ../Products/product-R.php");
        }
    } else {
        echo "<script>console.error('Usuario o contraseña incorrectos');</script>";
    }
?>