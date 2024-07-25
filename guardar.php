<?php
include_once'conexion.php';
?>
<form method="POST" action="guardar.php" align="center">
    <p> Los nombres de usuario deben ser en minusculas y tener entre 4 y 8 caracteres de longitud </p>
    NOMBRE <input type="text" name="usuario" required placeholder="Ingrese Nombre" size="30" pattern="[a-z ]{4,8}"><br>
    CLAVE <input type="password" name="clave" required placeholder="Ingrese Clave" minlength="1" maxlength="5"><br>
    IDROL <input type="number" name="idrol" required placeholder="Ingrese Rol"  max="4"><br>
    EMAIL <input type="email" name="email" required placeholder="Ingrese Correo"><br>
        <input type="submit" name="insertar" value="Insertar Datos"><br>
</form>

<?php
    if (isset($_POST['insertar']))
    {
        $usuario=$_POST['usuario'];
        $password=$_POST['clave'];
        $rol=$_POST['idrol'];
        $correo=$_POST['email'];
        $repetido="SELECT * FROM usuarios where nomusuario='$usuario' or email='$correo'";
        $resultado= mysqli_query($conexion,$repetido);//una la conexion y la otra la consulta
        if(mysqli_num_rows($resultado)>0)
        {
            echo '<p style="color:red; font-size:20px;text-align:center">!Hey ya existe un usuario con ese nombre o correo elctronico¡</p><br>';
        }
        else
        {
            $insertar="INSERT INTO usuarios (nomusuario,clave,idrol,email)values('$usuario','$password','$rol','$correo')";
            $ejecutar=mysqli_query($conexion,$insertar);
            if($ejecutar)
            {
                echo'<p style="color:blue; font-size:24px; text-align:center; padding:10px;"><strong>!WOW</strong>Registro Insertado</p><br>';
            }
            else
            {
                echo'<script>alert("Error al ingresar el registro");</script>';
            }
        }
    }
?>