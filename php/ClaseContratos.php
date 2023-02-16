<?php
class Contratos
{

    public static function ingresaContrato($descripcion,$proveedor,$vigencia,$correo,$documentContenido,$archivo_tipoDocument,$nombreDocument,$con)
    {
        $consulta = "SELECT * from contratos";
        $result = mysqli_query($con, $consulta);
        $numeroDatos= mysqli_num_rows($result)+1;
        print($numeroDatos);
        $sql = "INSERT INTO contratos(contratoID,descripcion,proveedor,vigencia) VALUES ($numeroDatos,'$descripcion','$proveedor','$vigencia')";
        mysqli_query($con, $sql);

        $consultaDocumentos = "SELECT * from documents";
        $resultDocument = mysqli_query($con, $consultaDocumentos);
        $numeroDatosDocuments= mysqli_num_rows($resultDocument)+1;

        $insertDocument = "INSERT INTO documents(documentID,document,contratoID,tipo,nombre) VALUES ($numeroDatosDocuments,'$documentContenido','$numeroDatos','$archivo_tipoDocument','$nombreDocument')";
        mysqli_query($con, $insertDocument); 
        mysqli_close($con);
       
        header('location: ../vistas/registerContrato.php?correo=' . $correo.'&estado=0');
    }
   
}
