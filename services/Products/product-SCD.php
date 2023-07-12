<?php
    include '../conection.php';
    
    // Conectar a la base de datos y crear la nueva entrada
    $id = $_POST["id"];

    $sql = mysqli_query($con, "DELETE FROM orden WHERE id = $id");

    if($sql){
        header("location: shopping-cart.php");
    }
    else{
        echo "error";
    }
?>
    