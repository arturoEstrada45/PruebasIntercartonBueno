<?php
class Inventarios
{

    public static function ingresa($nombre, $ubicacion, $descripcion, $correo,$con,$service, $sesion, $contrasenia,$correo1)
    {
        try{
        $consulta = "SELECT * from inventarios";
        $result = mysqli_query($con, $consulta);
        $numeroDatos= mysqli_num_rows($result)+1;
        print($numeroDatos);
        $sql = "INSERT INTO inventarios(equipoID,nombre,ubicacion,descripcion,empleadoID,serviceTag,cuentaInicioSesion,contrasenia) VALUES ($numeroDatos,'$nombre','$ubicacion','$descripcion','$correo1','$service','$sesion','$contrasenia')";
       $opcion= mysqli_query($con, $sql);
            $estado="0";
        mysqli_close($con);
        header('location: ../vistas/registerInventary.php?correo=' . $correo. '&estado='. $estado);
    } catch (Exception $e){
        $estado="Error al ingresar datos";
        header('location: ../vistas/registerInventary.php?correo=' . $correo. '&estado='. $estado);
    }
       
    }

    public static function actualizaInventario($correoCambio,$inventario,$ubicacion,$contrasenia,$correo,$con)
    {
        try{
        $estado=0;
        $sql = "UPDATE inventarios SET empleadoID='$correoCambio',ubicacion='$ubicacion',contrasenia='$contrasenia' WHERE equipoID='$inventario'";
        mysqli_query($con, $sql);
        mysqli_close($con);
        header('location: ../vistas/infoInventary.php?inventario='. $inventario.'&correo='.$correo.'&estado='.$estado.'&estadoMenu='.$estado);
        }catch (Exception $e){
        $estado="Error al ingresar datos, posiblemente el usuario ya existe o no existe";
        $estadoCero=0;
        header('location: ../vistas/infoInventary.php?inventario='. $inventario.'&correo='.$correo.'&estado='.$estado.'&estadoMenu='.$estadoCero);
    }
    }
    
    
}

?>