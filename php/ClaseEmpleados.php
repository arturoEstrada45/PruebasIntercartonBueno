<?php
class Empleados
{

    public static function ingresaEmpleado($nombre,$apellidos,$area,$contrasenia,$cuenta,$contraseniaInte,$correoRegistro,$correo,$cuentaServer,$contraseniaServer,$con)
    {
        try{
        $estado="0";
        $sql = "INSERT INTO empleados(empleadoID,nombre,apellidos,area,contrasenia,cuentaIntelisis,contraseniaIntelisis,cuentaServidor,contraseniaServidor) VALUES ('$correoRegistro','$nombre','$apellidos','$area','$contrasenia','$cuenta','$contraseniaInte','$cuentaServer','$contraseniaServer')";
        mysqli_query($con, $sql);
        mysqli_close($con);
        header('location: ../vistas/registerEmpleado.php?correo=' . $correo.'&estado='.$estado);
        }catch (Exception $e){
        $estado="Error al ingresar datos, posiblemente el usuario ya existe";
        header('location: ../vistas/registerEmpleado.php?correo=' . $correo. '&estado='. $estado);
    }
    }
    
}