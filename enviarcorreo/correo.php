<?php
if (isset($_POST['enviar'])) {
    if (!empty($_POST['name']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['email'])) {
        $name = $_POST['name'];
        $asunto = $_POST['asunto'];
        $msg = $_POST['msg'];
        $email = $_POST['email'];

        $headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";	
		$headers .= 'From: PROYECTO<proyect3514@gmail.com>' . "\r\n";

        $mail = mail($email, $asunto, $msg, $headers);
        if ($mail) {
            echo "<h4 align='center'> ¡Mail enviado con exito! </h4>";
        }else
        {
            echo "<script> alert('ERROR');</script>";
        }
    }
}

?>