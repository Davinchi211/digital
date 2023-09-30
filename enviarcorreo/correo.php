<?php
if (isset($_POST['enviar'])) {
    if (!empty($_POST['name']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['email'])) {
        $name = $_POST['name'];
        $asunto = $_POST['asunto'];
        $msg = $_POST['msg'];
        $email = $_POST['email'];

        // Configurar los encabezados del correo electrónico
        $headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";	
		$headers .= 'From: PROYECTO<proyect3514@gmail.com>' . "\r\n";

        // Obtener el nombre del archivo y ubicación temporal del archivo adjunto
        $file_name = $_FILES['adjunto']['name'];
        $file_tmp = $_FILES['adjunto']['tmp_name'];
        
        // Verificar si se ha subido un archivo adjunto
        if (!empty($file_name) && is_uploaded_file($file_tmp)) {
            // Agregar el archivo adjunto al correo
            $file_content = file_get_contents($file_tmp);
            $boundary = md5(time());
            
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n\r\n";
            $message = "--{$boundary}\r\n";
            $message .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
            $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $message .= "{$msg}\r\n\r\n";
            $message .= "--{$boundary}\r\n";
            $message .= "Content-Type: application/octet-stream; name=\"{$file_name}\"\r\n";
            $message .= "Content-Transfer-Encoding: base64\r\n";
            $message .= "Content-Disposition: attachment; filename=\"{$file_name}\"\r\n\r\n";
            $message .= chunk_split(base64_encode($file_content)) . "\r\n\r\n";
            $message .= "--{$boundary}--";
        } else {
            // Si no hay archivo adjunto, solo envía el mensaje de texto
            $message = $msg;
        }


        $mail = mail($email, $asunto, $message, $headers);
        if ($mail) {
            echo "<h4 align='center'> ¡Mail enviado con exito! </h4>";
        }else
        {
            echo "<script> alert('ERROR');</script>";
        }
    }else {
        echo "<h4>Por favor, completa todos los campos del formulario.</h4>";
    }
}

?>