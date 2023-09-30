<?php 
    require "vista/layout/header.php" 
?>
    <a href="estudiante.php?m=nuevo">NUEVO</a>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Fecha de Nacimiento</td>
            <td>Opciones</td>
        </tr>
        <?php
        if(!empty($dato))
            foreach ($dato as $key => $value)
                foreach ($value as $va ):
                echo "<tr><td>".$va['ID']."</td><td>".$va['Nombres']."</td><td>".$va['Apellidos']."</td><td>".$va['FechaNacimiento']."</td>";
                echo "<td><a href='estudiante.php?m=editar&id=".$va['ID']."'>ACTUALIZAR</a> ";
                echo "<a href='estudiante.php?m=eliminar&id=".$va['ID']."'>ELIMINAR</a></td>";
                echo "</tr>";
            endforeach;
        
    ?>
    </table>
<?php require "vista/layout/footer.php" ?>
