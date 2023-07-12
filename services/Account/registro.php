<?php
    include '../conection.php';
    
    // Conectar a la base de datos y crear la nueva entrada
    $names = $_POST["names"];
    $apellidoP = $_POST["first_lastname"];
    $apellidoM = $_POST["second_lastname"];
    $email = $_POST["email"];
    $contrasena = $_POST["password"];
    $edad = $_POST["age"];
    $direccion = $_POST["address"];
    $genero = $_POST["gender"];

    $sql = mysqli_query($con, "INSERT INTO usuarios(id_role, names, first_lastname, second_lastname, created_at, email, password, age, address, gender) VALUES(1, '$names', '$apellidoP', '$apellidoM', NOW(), '$email', '$contrasena', '$edad', '$direccion', '$genero')");


    if($sql){
        header("location: ../../login.html");
    }
    else{
        echo "Usuario no agregado";
    }
?>
    