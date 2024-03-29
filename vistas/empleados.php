<?php
$correo = $_REQUEST['correo'];
$estado = "0";
$estadoMenu = "0"; 
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');

$sql =  "SELECT * from notificaciones WHERE estado='No leido'";
$resultNotis = mysqli_query($conexion, $sql);
$numeroNotis= mysqli_num_rows($resultNotis);

$sql =  "SELECT * from empleados WHERE empleadoID='$correo'";
$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($result)) 
{
        $nombre=$mostrar['nombre'];      
   
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

    <title>Empleados</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php?correo=<?php echo $correo ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Intercarton <sup>1.0</sup></div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php?correo=<?php echo $correo ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel Principal</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            Tickets
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tickets</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="ticket.php?correo=<?php echo $correo ?>">Lista</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Activos</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones Inventario:</h6>
                        <a class="collapse-item" href="inventary.php?correo=<?php echo $correo ?>&estado=<?php echo $estado?>"> Inventario</a>
                        <a class="collapse-item" href="licencias.php?correo=<?php echo $correo ?>">Licencias</a>
                        <a class="collapse-item" href="contratos.php?correo=<?php echo $correo ?>">Contratos</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="empleados.php?correo=<?php echo $correo ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Empleados</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="servicios.php?correo=<?php echo $correo ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Servicios</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="test()">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $numeroNotis ?><span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notificaciones
                                </h6>
                                <?php while ($mostrarNotis = mysqli_fetch_array($resultNotis)){  ?>
                                    <a class="dropdown-item d-flex align-items-center" >
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo $mostrarNotis['fecha'];?></div>
                                        <span class="font-weight-bold"><?php echo $mostrarNotis['descripcion']; ?></span>
                                    </div>
                                </a>
                            <?php }  ?>
                            </div>
                        </li>
                        <script>
                        function test(){
                        $.ajax({url:"../php/quitaNotis.php", 
                            success:function(result){
                               }
                        })
                        }
                        </script>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Empleados</h1>
    <a href="registerEmpleado.php?correo=<?php echo $correo ?>&estado=<?php echo $estado?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i>Añadir Empleado</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabla Empleados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                                <tr>
                                <th>ID Empleado</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Area</th>
                                    <th>Contraseña</th>
                                    <th>Cuenta Intelisis</th>
                                    <th>Contraseña Intelisis</th>
                                    <th>Cuenta Servidor</th>
                                    <th>Contraseña Servidor</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID Empleado</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Area</th>
                                    <th>Contraseña</th>
                                    <th>Cuenta Intelisis</th>
                                    <th>Contraseña Intelisis</th>
                                    <th>Cuenta Servidor</th>
                                    <th>Contraseña Servidor</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                                
                                    <?php
                                    if($estado=="0"){
                                    $sql = "SELECT * FROM empleados";}
                                    
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) 
                                    {
                                    ?>
                                            <tr>
                                                <td><a target="_blank"
                            href="../vistas/infoEmployees.php?empleado=<?php echo $mostrar['empleadoID']?>&correo=<?php echo $correo?>&estado=<?php echo $estado?>&estadoMenu=<?php echo $estadoMenu?>" name="buscarServicio" value="<?php echo $mostrar['empleadoID'] ?>" id="buscarServicio"><?php echo $mostrar['empleadoID'] ?></a></td>
                                                <td><?php echo $mostrar['nombre'] ?></td>
                                                <td><?php echo $mostrar['apellidos'] ?></td>
                                                <td><?php echo $mostrar['area'] ?></td>
                                                <td><?php echo $mostrar['contrasenia'] ?></td>
                                                <td><?php echo $mostrar['cuentaIntelisis'] ?></td>
                                                <td><?php echo $mostrar['contraseniaIntelisis'] ?></td>
                                                <td><?php echo $mostrar['cuentaServidor'] ?></td>
                                                <td><?php echo $mostrar['contraseniaServidor'] ?></td>
                                            </tr>
                                        <?php
                                    }
                                    ?>
                             
                                    </tbody>
            </table>
        </div>
    </div>
</div>

</div> <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Intercarton S. de R.L. de C.V.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleeciona "Cerrar Sesión" si estas listo para salir de tu sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../index.html">Cerrar Sesión</a>
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