<?php 
    require "vista/layout/header.php" 
?>


    <div class="row">
        <div class="col-sm-5">
            <br>
            <a href="tarea.php?m=nuevo" type="button" class="btn btn-success">NUEVO</a><br><br>
        </div>
    </div>
    <div class="row">

        <table border="1" class="table table-hover">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Fecha</td>
            <td>Puntos</td>
            <td>Materio</td>
            <td>Maestro</td>
            <td>Opciones</td>
        </tr>
        <?php
        if(!empty($dato))
            foreach ($dato as $key => $value)
                foreach ($value as $va ):
                echo "<tr><td>".$va['id']."</td><td>".$va['nombre']."</td><td>".$va['descripcion']."</td><td>".$va['fecha']."</td><td>".$va['puntos']."</td><td>".$va['materia']."</td><td>".$va['maestro']."</td>";
                echo "<td><a href='tarea.php?m=editar&id=".$va['id']."' type='button' class='btn btn-warning'>ACTUALIZAR</a> ";
                echo "<a href='tarea.php?m=eliminar&id=".$va['id']."' type='button' class='btn btn-danger'>ELIMINAR</a></td>";
                echo "</tr>";
            endforeach;
        
    ?>
    </table>        
    </div>

    
<?php require "vista/layout/footer.php" ?>

