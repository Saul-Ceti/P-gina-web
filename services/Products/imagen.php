<?php


    // Verificar si se ha enviado un archivo
    if(isset($_FILES['imagen'])) {
  
    // Nombre del archivo
    $nombre_archivo = $_FILES['imagen']['name'];

    // Ubicación temporal del archivo en el servidor
    $ubicacion_temporal = $_FILES['imagen']['tmp_name'];

    // Mover el archivo a su ubicación final
    $directorio_destino = "../../img/products"; // Ruta donde se almacenará la imagen
    $ruta_final = $directorio_destino . $nombre_archivo;
    move_uploaded_file($ubicacion_temporal, $ruta_final);

    // Mensaje de éxito
    echo "La imagen ha sido cargada exitosamente.";

}
?>
