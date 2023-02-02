<?php
class Servicio
{

    public static function registrarServicio($tipo,$descripcion,$fecha,$asignado,$correo,$con)
    {


        try{
            $consulta = "SELECT * from servicios";
            $result = mysqli_query($con, $consulta);
            $numeroDatos= mysqli_num_rows($result)+1;
            print($numeroDatos);
            $pendiente="Pendiente";
            $sql = "INSERT INTO servicios(servicioID,tipoServicio,descripcion,fecha,asignadoID,estado) VALUES ($numeroDatos,'$tipo','$descripcion','$fecha','$asignado','$pendiente')";
           $opcion= mysqli_query($con, $sql);
                $estado="0";
            mysqli_close($con);
            header('location: ../vistas/registerServicio.php?correo=' . $correo. '&estado='. $estado);
        } catch (Exception $e){
            $estado="Error al ingresar datos";
            header('location: ../vistas/registerServicio.php?correo=' . $correo. '&estado='. $estado);
        }
    }
   
}

?>