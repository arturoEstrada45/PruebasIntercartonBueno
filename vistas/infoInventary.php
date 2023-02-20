<?php
$inventario=$_REQUEST['inventario'];
$correo=$_REQUEST['correo'];
$estado=$_REQUEST['estado'];

$estadoMenu=$_REQUEST['estadoMenu'];
$estadoCuentas="1";

$estadoUsuario="0";
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');
$sql =  "SELECT * from inventarios WHERE equipoID='$inventario'";
$result = mysqli_query($conexion, $sql);
$cambioEstado="1";

$cambioEstadoPendiente="0";
while ($mostrar = mysqli_fetch_array($result)) 
{
        $inventarioID=$mostrar['equipoID'];      
        $nombre=$mostrar['nombre'];        
        $ubicacion=$mostrar['ubicacion'];  
        $descripcion=$mostrar['descripcion'];  
        $empleadoID=$mostrar['empleadoID'];  
        $serviceTag=$mostrar['serviceTag'];    
        $cuentaInicioSesion=$mostrar['cuentaInicioSesion'];  
        $contrasenia=$mostrar['contrasenia'];
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

    <title>Información Inventario</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../css/textos.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
<br>
  <br>  
<?php if(!($estado=="0")){?>
<div class="container div" id="mensajeCont">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10 justify-content-center">
                <div class="div div-mensaje" id="mensaje">
                    <p><?php echo $estado ?></p>
                </div>
            </div>
            <div class="col-1">
            </div>
        </div>
    </div><?php }?> 
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
                                        
<h1 class="h4 text-gray-900 mb-2">ID del Inventario</h1>
<p class="mb-4"><?php echo $inventarioID ?></p>
<h1 class="h4 text-gray-900 mb-2">Nombre del equipo:</h1>
<p class="mb-4"><?php echo $nombre  ?></p>
<h1 class="h4 text-gray-900 mb-2">Descripción del equipo: </h1>
<p class="mb-4"><?php echo $descripcion ?></p>
<h1 class="h4 text-gray-900 mb-2">Dueño del equipo: </h1>
<p class="mb-4"><?php echo $empleadoID ?></p>

</div>
                               <?php } ?>
                               <?php if($estadoMenu=="1"){?>
<div class="text-center">
                                        
<h1 class="h4 text-gray-900 mb-2">Ubicación del equipo: </h1>
<p class="mb-4"><?php echo $ubicacion ?></p>
<h1 class="h4 text-gray-900 mb-2">ServiceTag: </h1>
<p class="mb-4"><?php echo $serviceTag ?></p>
<h1 class="h4 text-gray-900 mb-2">Cuenta Computadora</h1>
<p class="mb-4"><?php echo $cuentaInicioSesion ?></p>
<h1 class="h4 text-gray-900 mb-2">Contraseña:</h1>
<p class="mb-4"><?php echo $contrasenia ?></p>
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
                                        <a class="small"href="../vistas/infoInventary.php?inventario=<?php echo $inventarioID?>&correo=<?php echo $correo?>&estado=<?php echo $estado?>&estadoMenu=<?php echo $estadoCuentas?>">Más información.</a>
                                    </div>
                               <?php } ?>
                               <?php if($estadoMenu=="1"){?>
                                        <div class="text-center">
                                        <a class="small" href="../vistas/infoInventary.php?inventario=<?php echo $inventarioID?>&correo=<?php echo $correo?>&estado=<?php echo $estado?>&estadoMenu=<?php echo $estadoUsuario?>">Más información.</a>
                                    </div>
                               <?php } ?>
                               <div class="text-center">
                                        <a class="small"href="../vistas/inventary.php?correo=<?php echo $correo?>&estado=0">Regresar al menú.</a>
                                    </div>
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
                <form action="../php/conexion.php" method="POST" id="updateInventary">
                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio de Dueño</p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="correoCambio" name="correoCambio" value="<?php echo $empleadoID?>"
                                            placeholder="ingresa correo nuevo" pattern="[a-zA-Z0-9.#$%&*+_-]{1,35}(@intercarton.com.mx){1}" required data-toggle="tooltip" title="El correo debe ser de la empresa @intercarton.com.mx">
                                    </div>
                </div>
                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio Area</p>
                                    </div>

                                    <input type="hidden" name="correo" id="correo" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $empleadoID ?>"> 
                                <input type="hidden" name="inventario" id="inventario" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $inventarioID ?>"> 



                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="ubicacion" name="ubicacion" value="<?php echo $ubicacion?>"
                                            placeholder="Nueva ubicación"  required data-toggle="tooltip">
                                    </div>
                                </div><div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio contraseña</p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="contrasenia" name="contrasenia" value="<?php echo $contrasenia?>"
                                            placeholder="Nueva Contraseña"  required data-toggle="tooltip">
                                    </div>
                                </div>
                               
                    </form>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="updateInventary" form="updateInventary">Actualizar Inventario</button>
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