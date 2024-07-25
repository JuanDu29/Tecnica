<?php
$nombreservidor="localhost";
$usuario="root";
$password="";
$basedatos="bdprueba";
$conexion=mysqli_connect($nombreservidor,$usuario,$password,$basedatos);
    if($conexion)
        {
            echo"<p style='color:green;font-size:30px;text-align:center;'>!A caray Conexion Exitosa¡</p>";
        }
?>