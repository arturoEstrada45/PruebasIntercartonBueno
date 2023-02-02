<?php
class Contratos
{

    public static function ingresaContrato($descripcion, $proveedor,$vigencia,$correo, $con)
    {
        $consulta = "SELECT * from contratos";
        $result = mysqli_query($con, $consulta);
        $numeroDatos= mysqli_num_rows($result)+1;
        print($numeroDatos);
        $sql = "INSERT INTO contratos(contratoID,descripcion,proveedor,vigencia) VALUES ($numeroDatos,'$descripcion','$proveedor','$vigencia')";
        mysqli_query($con, $sql);
        mysqli_close($con);
        header('location: ../vistas/registerContrato.php?correo=' . $correo);
    }
   
}
