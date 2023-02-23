<?php
include "../php/ClaseInventarios.php";
include "../php/ClaseLicencia.php";
include "../php/funcionesSistema.php";
include "../php/ClaseContratos.php";
include "../php/ClaseEmpleados.php";
include "../php/ClaseServicios.php";

$con = mysqli_connect('localhost', 'root', '', 'intercartonpruebas') or die(mysqli_error($mysqli));
conexion($con);
function conexion($con){
    
    if (isset($_POST['registrarInventario']))
   {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    $correo = $_POST['correo'];
    $correo1 = $_POST['correo1'];
    $servie = $_POST['service'];
    $sesion = $_POST['sesion'];
    $contrasenia = $_POST['contrasenia'];
    Inventarios::ingresa($nombre,$ubicacion,$descripcion,$correo,$con,$servie,$sesion,$contrasenia,$correo1);
    
   }else if (isset($_POST['inicia']))
   {
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    Sistema::iniciaSesion($correo,$contrasenia,$con);

   }
   
   else if (isset($_POST['registrarLicencia']))
   {
    $status = $_POST['status'];
    $tipo = $_POST['tipo'];
    $proveedor = $_POST['proveedor'];
    $vigencia = $_POST['vigencia'];
    $equipo = $_POST['equipo'];
    $correo = $_POST['correo'];
    Licencia::registraLicencia($tipo,$status,$proveedor,$vigencia,$equipo,$correo,$con);
   }
   else if (isset($_POST['registrarContrato']))
   {
    $descripcion = $_POST['descripcion'];
    $proveedor = $_POST['proveedor'];
    $vigencia = $_POST['vigencia'];
    $correo = $_POST['correo'];
    $nombreDocument = $_FILES["document"]["name"];
    $archivo_tipoDocument = $_FILES['document']['type'];
    if($_FILES["document"]["tmp_name"]){
      
      $document = $_FILES['document']['tmp_name'];
      
      $documentContenido = addslashes(file_get_contents($document));
Contratos::ingresaContrato($descripcion,$proveedor,$vigencia,$correo,$documentContenido,$archivo_tipoDocument,$nombreDocument,$con);
    }

    else {
      $estado="En este caso si debes ingresar un documento del contrato";
      header('location: ../vistas/registerContrato.php?correo=' . $correo.'&estado='.$estado);

    }
   
   }
   else if (isset($_POST['registrarEmpleado']))
   {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $area = $_POST['area'];
    $contrasenia = $_POST['contrasenia'];
    $cuenta = $_POST['cuenta'];
    $contraseniaInte = $_POST['contraseniaInte'];
    $cuentaServer = $_POST['cuentaServer'];
    $contraseniaServer = $_POST['contraseniaServer'];
    //correo es variable para regresar al mismo usuario
    $correo = $_POST['correo'];
    //correoRegistro es el correo del nuevo usuario
    $correoRegistro = $_POST['correoRegistro'];
    Empleados::ingresaEmpleado($nombre,$apellidos,$area,$contrasenia,$cuenta,$contraseniaInte,$correoRegistro,$correo,$cuentaServer,$contraseniaServer,$con);
   
   }
   else if (isset($_POST['registrarServicio']))
   {
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $asignado = $_POST['asignado'];
    $correo = $_POST['correo'];
    Servicio::registrarServicio($tipo,$descripcion,$fecha,$asignado,$correo,$con);
      }
      else if (isset($_POST['updateUser']))
    {
      $correoCambio = $_POST['correoCambio'];
      
      $correoBusqueda = $_POST['correoBusqueda'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $contrasenia = $_POST['contrasenia'];
    $correo = $_POST['correo'];
    Empleados::actualizaEmpleado($correoCambio,$correoBusqueda,$nombre,$apellidos,$contrasenia,$correo,$con);
   
    }

    else if (isset($_POST['updateInventary']))
    {
      $correoCambio = $_POST['correoCambio'];
      
      $inventario = $_POST['inventario'];
    $ubicacion = $_POST['ubicacion'];
    $contrasenia = $_POST['contrasenia'];
    $correo = $_POST['correo'];
    Inventarios::actualizaInventario($correoCambio,$inventario,$ubicacion,$contrasenia,$correo,$con);
   
    }
    else if (isset($_POST['updateLicencia']))
    {
      $estadoCambio = $_POST['estadoCambio'];
      $licencia = $_POST['licencia'];
      $correo = $_POST['correo'];
      Licencia::actualizaLicencia($estadoCambio,$licencia,$correo,$con);
   
    }


}
  
?>