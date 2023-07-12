<?php
    include '../conection.php';
    
    // Conectar a la base de datos y crear la nueva entrada
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $color = $_POST["color"];
    $size = $_POST["size"];
    $stock = $_POST["stock"];
    $status = $_POST["status"];

    $sql = mysqli_query($con, "UPDATE productos SET name = '$name', price = '$price', status = '$status', type = '$type', color = '$color', size = '$size', stock = '$stock' WHERE id = $id");

    if($sql){
        header("location: product-U.php");
    }
    else{
        echo "error";
    }
?>