<?php
include_once'conexion.php';
?>
<?php
$consulta="SELECT id,nomusuario,clave,idrol,email FROM usuarios";
$ejecutar=mysqli_query($conexion,$consulta);//necesito la conexion y la consulta
if(mysqli_num_rows($ejecutar)>0)//ejecutar si encontro algo
{
    ?>
    <table border="3"  bgcolor="white" align="center" style="border-color:blue"><!--diseño para ver-->
        <tr align="center" bgcolor="purple" style="color:white;">
            <th>ID </th>
            <th>NOMBRE</th>
            <th>CLAVE</th>
            <th>ID ROL</th>
            <th>CORREO</th>
        </tr>   

    <?php
        while($fila=mysqli_fetch_array($ejecutar))//genera un recorrido de todos los datos"array" de ejecutar almacenado en $fila
        {//trae los datos del formulario o tabla y los pasamos a variables en php
                $id=$fila['id'];
                $nombre=$fila['nomusuario'];
                $clave=$fila['clave'];
                $rol=$fila['idrol'];
                $correo=$fila['email'];
            ?>
            <tr align="center"> <!-- muestra los datos del formulario-->
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $clave; ?></td>
                <td><?php echo $rol; ?></td>
                <td><?php echo $correo; ?></td>
            </tr>
        <?php
        }//cerrar el while
        ?>
    </table><br><br><!--cierra la tabla-->
    <?php
}//cierra el if
    else
        {
            echo '<p style="color:red;font-size:20px;font-family:old english text Mt;align:center;>!UPS¡ parece que no hay registros</p>';
        }
        mysqli_close($conexion);
    ?>
