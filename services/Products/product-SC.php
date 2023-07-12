<?php
    include '../conection.php';
    
    // Conectar a la base de datos y crear la nueva entrada
    $id_product = $_POST["id_product"];
    $id_user = $_POST["id_user"];

    $sql = mysqli_query($con, "INSERT INTO orden(id_product, id_user) VALUES('$id_product', '$id_user')");

    if($sql){
        header("location: product-R.php");
    }
    else{
        echo "error";
    }
?>
    