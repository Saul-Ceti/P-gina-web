<?php
    include '../conection.php';
    require_once('../../TCPDF/tcpdf.php');
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    require '../../PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();

    // Verificar si el usuario ha iniciado sesión
    if(isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $userEmail = $_SESSION['user_email'];
        $userName = $_SESSION['user_name'];
    } else {
        $message = "No hay sesión activa";
    }

    $mail = new PHPMailer(true);

    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'sullivanerner@gmail.com';
    $mail->Password = 'nqtncmtfkxteuusk';
    
    try {
        // Conexión a la base de datos y consulta SQL
        $sql = "SELECT 
                    orden.id AS id,
                    productos.name AS name,
                    productos.price AS price,
                    productos.type AS type,
                    productos.color AS color,
                    productos.size AS size
                FROM orden INNER JOIN productos ON orden.id_product = productos.id";
        $resultado = mysqli_query($con, $sql);

        // Crear un nuevo objeto TCPDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

        // Establecer el título del documento
        $pdf->SetTitle('Detalle de la compra');

        // Agregar una página al documento
        $pdf->AddPage();

        // Crear la tabla de productos
        $html = "<h1>Tabla de productos</h1>";
        $html .= "<table>";
        $html .= "<tr><th>Nombre</th><th>Precio</th><th>Tipo de producto</th><th>Color</th><th>Talla</th></tr>";

        $total = 0;
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $html .= "<tr>";
            $html .= "<td>" . $fila["name"] . "</td>";
            $html .= "<td>" . $fila["price"] . "</td>";
            $html .= "<td>" . $fila["type"] . "</td>";
            $html .= "<td>" . $fila["color"] . "</td>";
            $html .= "<td>" . $fila["size"] . "</td>";
            $html .= "</tr>";

            $total = $total + $fila["price"];
        }
        $html .= "</table>";

        $html .= "<h1>Total a pagar<h1/>";
        $html .= "<h1>" . $total . "<h1/>";

        // Escribir el contenido HTML en el documento PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Establecer el nombre del archivo PDF para descargar
        $filename = 'tabla_productos.pdf';

        $pdfPath = 'C:/Users/sulli/Desktop/archivos/tabla_productos.pdf';

        // Guardar el archivo PDF en el servidor
        $pdf->Output($pdfPath, 'F');

        // Adjuntar el archivo PDF al correo electrónico
        $mail->addAttachment($pdfPath);

        // Configurar los detalles del correo electrónico
        $mail->setFrom('imagenperfecta34@gmail.com', 'Imagen perfecta');
        $mail->addAddress($userEmail, $userName);
        $mail->Subject = 'Compras';
        $mail->Body = 'Gracias por su compra, adjuntamos el detalle';

        // Enviar el correo electrónico
        $mail->send();

        $sql = mysqli_query($con, "DELETE FROM orden");
        header("location: ../Products/product-R.php");

    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
?>