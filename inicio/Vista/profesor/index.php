<?php 
    require "vista/layout/header.php" 
?>


    <div class="row">
        <div class="col-sm-5">
            <br>
            <a href="profesor.php?m=nuevo" type="button" class="btn btn-success">NUEVO</a><br><br>
        </div>
    </div>
    <div class="row">

        <table border="1" class="table table-hover">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Genero</td>
            <td>Opciones</td>
        </tr>
        <?php
        if(!empty($dato))
            foreach ($dato as $key => $value)
                foreach ($value as $va ):
                echo "<tr><td>".$va['id']."</td><td>".$va['nombre']."</td><td>".$va['apellido']."</td><td>".$va['genero']."</td>";
                echo "<td><a href='profesor.php?m=editar&id=".$va['id']."' type='button' class='btn btn-warning'>ACTUALIZAR</a> ";
                echo "<a href='profesor.php?m=eliminar&id=".$va['id']."' type='button' class='btn btn-danger'>ELIMINAR</a></td>";
                echo "</tr>";
            endforeach;
        
    ?>
    </table>        
    </div>

    
<?php require "vista/layout/footer.php" ?>

