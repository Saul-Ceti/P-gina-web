<?php
    include '../conection.php';
    
    // Conectar a la base de datos y crear la nueva entrada
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $color = $_POST["color"];
    $size = $_POST["size"];
    $stock = $_POST["stock"];
    $status = true;

    // Verificar si se ha enviado un archivo
    if(isset($_FILES['imagen'])) {

        // Nombre del archivo
        $nombre_archivo = $_FILES['imagen']['name'];
    
        // Ubicación temporal del archivo en el servidor
        $ubicacion_temporal = $_FILES['imagen']['tmp_name'];
    
        // Mover el archivo a su ubicación final
        $directorio_destino = "../../img/Products"; // Ruta donde se almacenará la imagen
        $ruta_final = $directorio_destino . $nombre_archivo;
        move_uploaded_file($ubicacion_temporal, $ruta_final);
    }

    $sql = mysqli_query($con, "INSERT INTO productos(name, price, status, created_at, type, color, size, stock, imagen) VALUES('$name', '$price', '$status', NOW(), '$type', '$color', '$size', '$stock', '$ruta_final')");

    if($sql){
        header("location: ../../View/Productos/product-C.html");
    }
    else{
        echo "error";
    }
?>