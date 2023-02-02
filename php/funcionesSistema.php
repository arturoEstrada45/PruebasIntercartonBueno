<?php
class Sistema
{

    public static function iniciaSesion($correo, $contrasenia,$con)
    {
        $consulta1 = mysqli_query($con, "SELECT * from empleados WHERE empleadoID='$correo'
                                                AND contrasenia='$contrasenia'");
        $numeroDatos= mysqli_num_rows($consulta1);
        if($numeroDatos==1){
            
            header('location: ../vistas/dashboard.php?correo=' . $correo);
        } else{
            header('location: ../vistas/index.php?estado=' . "Correo o contraseña incorrectos.");
        }
       
    }

    
    }

?>