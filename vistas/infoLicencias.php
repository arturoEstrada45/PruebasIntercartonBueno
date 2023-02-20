<?php
$licencia=$_REQUEST['licencia'];
$correo=$_REQUEST['correo'];
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');
$sql =  "SELECT * from licencias WHERE licenciaID='$licencia'";
$result = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($result)) 
{
        $licenciaID=$mostrar['licenciaID'];      
        $tipoLicencia=$mostrar['tipoLicencia'];        
        $estadoLicencia=$mostrar['estado'];  
        $proveedor=$mostrar['proveedor'];
        $vencimiento=$mostrar['vencimiento'];
        $equipoID=$mostrar['equipoID'];
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

    <title>Información Licencia</title>

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

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                        <img src="../img/infoService.jpg" width="435" height="650">
                    </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        
                                    <h1 class="h4 text-gray-900 mb-2">ID de la Licencia</h1>
                                    <p class="mb-4"><?php echo $licenciaID ?></p>
                                    <h1 class="h4 text-gray-900 mb-2">Tipo Licencia:</h1>
                                    <p class="mb-4"><?php echo $tipoLicencia ?></p>
                                    <h1 class="h4 text-gray-900 mb-2">Proveedor de Licencia: </h1>
                                    <p class="mb-4"><?php echo $proveedor ?></p>
                                    <h1 class="h4 text-gray-900 mb-2">Estado: </h1>
                                    <p class="mb-4"><?php echo $estadoLicencia ?></p>
                                    <h1 class="h4 text-gray-900 mb-2">Vencimiento: </h1>
                                    <p class="mb-4"><?php echo $vencimiento ?></p>
                                    <h1 class="h4 text-gray-900 mb-2">Equipo Asignado a Licencia: </h1>
                                    <p class="mb-4"><?php echo $equipoID ?></p>
                                    </div>
                                    <div class="text-center">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="text-gray-400"></i>
                                    Editar información
                                    </a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small"href="../vistas/licencias.php?correo=<?php echo $correo?>">Regresar al menú.</a>
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
                <form action="../php/conexion.php" method="POST" id="updateLicencia">
                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio de estado</p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="estadoCambio" name="estadoCambio" value="<?php echo $estadoLicencia?>"
                                            placeholder="ingresa correo nuevo">
                                    </div>
                </div>
                <div class="form-group row">
                                    
                                    <input type="hidden" name="correo" id="correo" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $correo ?>"> 
                                <input type="hidden" name="licencia" id="licencia" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $licenciaID ?>"> 
                                    
                                </div>
                                 </form>
                <div class="modal-footer">
                <div class="col-sm-6">
                    <button class="btn btn-primary" type="submit" name="updateLicencia" form="updateLicencia">Actualizar Licencia</button>
                </div>
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