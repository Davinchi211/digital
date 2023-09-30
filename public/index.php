<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../public/img/infinity.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
<?php 
session_start();
include('header.php');?>

<div class="container mt-5">
    <br><br>
    <h1 class="text-center">DIGITAL CHECK</h1>
    
    <div class="container mt-5">
        <!-- Sección de Asistencia -->
    <section class="mt-5">
        <h2>Tomar Asistencia</h2>
        <p>Tomar asistencia diaria en el curso</p>
    </section>
    
    <!-- Sección de Generar Reportes -->
    <section class="mt-5">
        <h2>Generar Reportes</h2>
        <p>Generar reportes de asistencia por id de alumno y curso</p>
    </section>
    
    <!-- Sección de Crear Tareas -->
    <section class="mt-5">
        <h2>Crear Tareas para el Profesor</h2>
        <p>Crear tareas para el curso necesario</p>
    </section>
    </div>
</div>
<?php include('footer.php');?>
</body>
</html>
