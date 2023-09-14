<?php
    function connection(){
        $cn = mysqli_connect('localhost','root','');
        $bd = mysqli_select_db($cn,'digital');
        if(!$bd){
            echo "Error de conexion";
        }
        else{
        }
        return $cn;
    }
?>