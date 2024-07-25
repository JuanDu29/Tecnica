<?php
include_once 'conexion.php';
    if(isset($_POST['buscar']))
    {
        $idusuario=$_POST['id'];
        $consulta="SELECT * FROM usuarios WHERE id='$idusuario'";
        $resultado=mysqli_query($conexion,$consulta);
            if(mysqli_num_rows($resultado)==1)//si encontro uno 
            {
              $fila=mysqli_fetch_assoc($resultado);
              $usuario=$fila['nomusuario'];
              $clave=$fila['clave'];
              $idrol=$fila['idrol'];
              $email=$fila['email'];
            }   
    }
    if(isset($_POST['actualizar']))//traemos los resultados de la tabla
    {
        $idusuario=$_POST['id'];
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        $idrol=$_POST['idrol'];
        $email=$_POST['email'];
        $actualizar="UPDATE usuarios SET nomusuario='$usuario',clave='$clave',idrol='$idrol',email='$email' WHERE id='$idusuario'";
        $ejecutar=mysqli_query($conexion,$actualizar);
        if($ejecutar)
        {
            echo'<p style="color:green;font-size:30px;text-align:center;"> Actualizacion  Exitosa</p>';
        }
        else
        {
            echo'<p style="color:red;font-size:20px;text-align:center;">Error al actualizar el registro</p>';
        }
    }
?>
<form action="#" method="POST">Ingrese el id del usuario
    <input type="number" name="id" style="width:45;" required value="<?php echo isset($idusuario);?>">
    <input type="submit" name="buscar" value="Buscame" class="boton">
</form>
<?php 
    if(isset($usuario)&& empty($usuario))
    {
        echo'<p style="color:red;font-size:20px;text_align:center;"><strong>!UPS¡</strong>No se encontro el usuario con el  id especificado</p>';
    }
?>
<form action="#" method="POST" align="center">
    <table border="3" align="center" bgcolor="08ACF9">
        <tr><td>
        <input type="hidden" name="id" value="<?php echo $idusuario ?>">
        NOMBRE<input type="text" style="font-family:impact; text-align:center;" name="usuario" reqquired placeholder="Ingrese usuario" size="20px" pattern="[a-zA-Z]{4-8}" value="<?php echo $usuario;?>"><br>
        CLAVE<input type="password" name="clave" style="text-align:center;"required placeholder="ingrese la clave" minlegth="1" maxlength="5" value="<?php echo $clave;?>"><br>
        IDROL<input type="number" name="idrol" style="text-align:center;" required placeholder="Ingrese el rol" maxlength="4" value="<?php echo $idrol;?>"><br>
        EMAIL<input type="email" name="email" style="text-align:center;" required placeholder="Ingrese correo" value="<?php echo  $email;?>"><br>
        </td></tr>
        
</table>
<input type="submit" name="actualizar" value="Actualizar datos" class="boton">
</form>