<?php
    include '../conection.php';
    
    // Conectar a la base de datos y crear la nueva entrada    
    $id = $_POST["id"];
    $name = $_POST["names"];
    $first_lastname = $_POST["first_lastname"];
    $second_lastname = $_POST["second_lastname"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];

    $sql = mysqli_query($con, "UPDATE usuarios SET name = '$name', first_lastname = '$first_lastname', second_lastname = '$second_lastname', email = '$email', age = '$age', address = '$address', gender = '$gender' WHERE id = $id");

    if($sql){
        header("location: admin-U.php");
    }
    else{
        echo "error";
    }
?>