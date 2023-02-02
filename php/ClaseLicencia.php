<?php
class Licencia
{

    public static function registraLicencia($tipo,$status,$proveedor,$vigencia,$equipo,$correo,$con)
    {


        try{
            $consulta = "SELECT * from licencias";
            $result = mysqli_query($con, $consulta);
            $numeroDatos= mysqli_num_rows($result)+1;
            print($numeroDatos);
            $sql = "INSERT INTO licencias(licenciaID,tipoLicencia,estado,proveedor,vencimiento,equipoID) VALUES ($numeroDatos,'$tipo','$status','$proveedor','$vigencia','$equipo')";
           $opcion= mysqli_query($con, $sql);
                $estado="0";
            mysqli_close($con);
            header('location: ../vistas/registerLicencia.php?correo=' . $correo. '&estado='. $estado);
        } catch (Exception $e){
            $estado="Error al ingresar datos";
            header('location: ../vistas/registerLicencia.php?correo=' . $correo. '&estado='. $estado);
        }
    }
   
}

?>