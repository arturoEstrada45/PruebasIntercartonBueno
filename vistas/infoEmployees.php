<?php
$empleado=$_REQUEST['empleado'];
$correo=$_REQUEST['correo'];
$estado=$_REQUEST['estado'];

$estadoMenu=$_REQUEST['estadoMenu'];
$estadoCuentas="1";

$estadoUsuario="0";
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');
/*if($estado==1){
    $sql =  "UPDATE servicios SET estado='Concluido' WHERE servicioID='$buscarServicio'";
    $result = mysqli_query($conexion, $sql);
}else{
    $sql =  "UPDATE servicios SET estado='Pendiente' WHERE servicioID='$buscarServicio'";
    $result = mysqli_query($conexion, $sql);
}*/

$sql =  "SELECT * from empleados WHERE empleadoID='$empleado'";
$result = mysqli_query($conexion, $sql);
$cambioEstado="1";

$cambioEstadoPendiente="0";
while ($mostrar = mysqli_fetch_array($result)) 
{
        $empleadoID=$mostrar['empleadoID'];      
        $nombre=$mostrar['nombre'];        
        $apellidos=$mostrar['apellidos'];  
        $area=$mostrar['area'];  
        $contrasenia=$mostrar['contrasenia'];  
        $cuentaIntelisis=$mostrar['cuentaIntelisis'];    
        $contraseniaIntelisis=$mostrar['contraseniaIntelisis'];  
        $cuentaServidor=$mostrar['cuentaServidor'];
        $contraseniaServidor=$mostrar['contraseniaServidor'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Información Empleado</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                        <img src="../img/infoService.jpg" width="430" height="515">
                    </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <?php if($estadoMenu=="0"){?>
<div class="text-center">
                                        
<h1 class="h4 text-gray-900 mb-2">ID del empleado</h1>
<p class="mb-4"><?php echo $empleadoID ?></p>
<h1 class="h4 text-gray-900 mb-2">Nombre del empleado:</h1>
<p class="mb-4"><?php echo $nombre." ".$apellidos ?></p>
<h1 class="h4 text-gray-900 mb-2">Area en la que trabaja: </h1>
<p class="mb-4"><?php echo $area ?></p>
<h1 class="h4 text-gray-900 mb-2">Contraseña incio sesion plataforma: </h1>
<p class="mb-4"><?php echo $contrasenia ?></p>
</div>
                               <?php } ?>
                               <?php if($estadoMenu=="1"){?>
<div class="text-center">
                                        
<h1 class="h4 text-gray-900 mb-2">Cuenta Intelisis</h1>
<p class="mb-4"><?php echo $cuentaIntelisis ?></p>
<h1 class="h4 text-gray-900 mb-2">Contraseña Intelisis:</h1>
<p class="mb-4"><?php echo $contraseniaIntelisis?></p>
<h1 class="h4 text-gray-900 mb-2">Cuenta Servidor</h1>
<p class="mb-4"><?php echo $cuentaServidor ?></p>
<h1 class="h4 text-gray-900 mb-2">Contraseña Servidor:</h1>
<p class="mb-4"><?php echo $contraseniaServidor ?></p>
</div>
                               <?php } ?>
                                    <div class="text-center">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="text-gray-400"></i>
                                    Editar información
                                </a>
                                    </div>
                                    <?php if($estadoMenu=="0"){?>
                                        <div class="text-center">
                                        <a class="small"href="../vistas/infoEmployees.php?empleado=<?php echo $empleadoID?>&correo=<?php echo $correo?>&estado=<?php echo $estado?>&estadoMenu=<?php echo $estadoCuentas?>">Información de cuentas.</a>
                                    </div>
                               <?php } ?>
                               <?php if($estadoMenu=="1"){?>
                                        <div class="text-center">
                                        <a class="small" href="../vistas/infoEmployees.php?empleado=<?php echo $empleadoID?>&correo=<?php echo $correo?>&estado=<?php echo $estado?>&estadoMenu=<?php echo $estadoUsuario?>">Información de Usuario.</a>
                                    </div>
                               <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menu para editar datos de empleado</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    
                </div>
                <div class="modal-body">
                <form action="../php/conexion.php" method="POST" id="updateUser">
                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio de correo</p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="correoCambio" name="correoCambio" value="<?php echo $empleadoID?>"
                                            placeholder="ingresa correo nuevo" pattern="[a-zA-Z0-9.#$%&*+_-]{1,35}(@intercarton.com.mx){1}" required data-toggle="tooltip" title="El correo debe ser de la empresa @intercarton.com.mx">
                                    </div>
                </div>
                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio nombre</p>
                                    </div>
                                    <input type="hidden" name="correo" id="correo" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $correo ?>"> 
                                <input type="hidden" name="correoBusqueda" id="correoBusqueda" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $empleadoID ?>"> 
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="nombre" name="nombre" value="<?php echo $nombre?>"
                                            placeholder="Nuevo nombre" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,35})" required data-toggle="tooltip">
                                    </div>
                                </div><div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio apellidos</p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="apellidos" name="apellidos" value="<?php echo $apellidos?>"
                                            placeholder="Nuevos apellidos" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,35})" required data-toggle="tooltip">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio contraseña plataforma</p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="contrasenia" name="contrasenia" value="<?php echo $contrasenia?>"
                                            placeholder="Nueva Contraseña" required data-toggle="tooltip">
                                    </div>
                                </div>
                    </form>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="updateUser" form="updateUser">Actualizar usuario</button>
                    <a class="btn btn-primary" href="#">Concluido</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    
   <!-- Bootstrap core JavaScript-->
   <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>