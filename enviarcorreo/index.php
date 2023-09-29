<!DOCTYPE HTML>
<html>
<head>
    <title>Correo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    
<h1> Enviar nuevo correo</h1>
    <form action="" method="POST">
        <input type="text" placeholder="Escriba el nombre" name="name" required>
        <input type="email" placeholder="Escriba el correo" name="email" required>
        <input type="text" placeholder="Escriba el asunto" name="asunto" required>
        <textarea placeholder="Escribir el mensaje en este espacio" name="msg" required></textarea>
        <?php include('correo.php');?>
        <input type="submit" name="enviar">
    </form>
</body>
</html>
