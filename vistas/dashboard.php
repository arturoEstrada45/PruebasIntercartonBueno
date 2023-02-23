<?php
/*
Proyecto realizado por: Arturo Jimenez Estrada
Contacto para soporte:arturoestrada45@gmail.com
Proyecto realizado para: Intercarton S. de R.L de C.V.
Periodo de realización: Enero-Junio
Propósito de la aplicación: Tener un sistema el cual nos sirva para enviar tickets, y mantener un inventario.
Proyecto realizado con Bootstrap
*/
$correo = $_REQUEST['correo'];
$estado = "0";


$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');

//Esto nos sirve para los datos de las notificaciones
$sql =  "SELECT * from notificaciones WHERE estado='No leido' ORDER BY notificacionID DESC";
$resultNotis = mysqli_query($conexion, $sql);
$numeroNotis= mysqli_num_rows($resultNotis);



//Para la información del usuario que tiene su sesión iniciada
$sql =  "SELECT * from empleados WHERE empleadoID='$correo'";
$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($result)) 
{
        $nombre=$mostrar['nombre'];      
   
}
//Para  sacar los tickets que se encuentran activos (Que no se les ha dado una solucion)
$activo="Activo";
$sqlActivos =  "SELECT * from tickets WHERE estado='$activo'";
$result = mysqli_query($conexion, $sqlActivos);
$numeroDatosActivos= mysqli_num_rows($result);
//Tickets que no han tenido una solución
$concluido="Corregido";
$sqlActivos =  "SELECT * from tickets WHERE estado='$concluido'";
$result = mysqli_query($conexion, $sqlActivos);
$numeroConcluido= mysqli_num_rows($result);

//tickets en general
$sqlActivos =  "SELECT * from tickets";
$result = mysqli_query($conexion, $sqlActivos);

$numeroTotal= mysqli_num_rows($result);
if($numeroTotal==0){
$cuenta=0;
}else{

    $cuenta=(($numeroConcluido)*100)/$numeroTotal;
    $cuenta=round($cuenta,0);
}

//Esto nos sirve para extraer el mes de cada tickets,
// esto para mostrar un ranking de los meses en los que se registran más tickets
$numeroTotal= mysqli_num_rows($result);
$arregloConteoMeses=array();
$SQLFechas =  "SELECT EXTRACT(MONTH FROM fechaAlta) as fecha from tickets";
$consultaFechas = mysqli_query($conexion, $SQLFechas);
//Estas variables seran enviadas a un script el cual esta en js/demo/chart-area-demo.js 
$enero=0;
$febrero=0;
$marzo=0;
$abril=0;
$mayo=0;
$junio=0;
$julio=0;
$agosto=0;
$septiembre=0;
$octubre=0;
$noviembre=0;
$diciembre=0;
//La consulta de los meses es almacenada en un arreglo
while ($datos = mysqli_fetch_array($consultaFechas)) 
{
        array_push($arregloConteoMeses,$datos['fecha']);  

}
//El arreglo es descompuesto para saber el mes en el que se mandaron más tickets
foreach($arregloConteoMeses as $meses){
        if($meses==1){
        $enero=$enero+1;
        
    }else if($meses==2){
        $febrero=$febrero+1;
        
    }else if($meses==3){
        $marzo=$marzo+1;
        
    } if($meses==4){
        $abril=$abril+1;
        
    } if($meses==5){
        $mayo=$mayo+1;
        
    } if($meses==6){
        $junio=$junio+1;
        
    } if($meses==7){
        $julio=$julio+1;
        
    } if($meses==8){
        $agosto=$agosto+1;
        
    } if($meses==9){
        $septiembre=$septiembre+1;
        
    } if($meses==10){
        $octubre=$octubre+1;
        
    } if($meses==11){
        $noviembre=$noviembre+1;
        
    } if($meses==12){
        $diciembre=$diciembre+1;
    }
}

//Estas acciones nos sirven para analizar a los usuarios que más tickets mandan
$arregloUsuariosActivos=array();
$arregloUsuariosConteo=array();
$sqlUsuariosActivos="SELECT solicitanteID,COUNT(*) as total FROM tickets GROUP BY solicitanteID";
$resultadoUsuariosActivos=mysqli_query($conexion,$sqlUsuariosActivos);

while ($datos = mysqli_fetch_array($resultadoUsuariosActivos)) 
{
        array_push($arregloUsuariosActivos,$datos['solicitanteID']);
        array_push($arregloUsuariosConteo,$datos['total']);
}
//foreach()
$longitud = count($arregloUsuariosActivos);
for ($i = 0; $i < $longitud; $i++) {
    for ($j = 0; $j < $longitud - 1; $j++) {
        if ($arregloUsuariosActivos[$j] > $arregloUsuariosActivos[$j + 1]) {
            $temporal = $arregloUsuariosActivos[$j];
            $temporal2 = $arregloUsuariosConteo[$j];
            $arregloUsuariosActivos[$j] = $arregloUsuariosActivos[$j + 1];
            $arregloUsuariosConteo[$j] = $arregloUsuariosConteo[$j + 1];
            $arregloUsuariosActivos[$j + 1] = $temporal;
            $arregloUsuariosConteo[$j + 1] = $temporal2;
        }
    }
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

    <title>Intercarton Dashboard</title>

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
            <li class="nav-item"> 
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Activos</span> 
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
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
                        <h1 class="h3 mb-0 text-gray-800">Intercarton</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Tickets activos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeroDatosActivos?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tickets concluidos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeroConcluido?></div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Procentaje de tickets resueltos
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cuenta."%"?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: <?php echo $cuenta?>%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                               Tickets totales</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeroTotal?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tickets ingresados por mes</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"> <script>var enero= <?php echo $enero?>;
                                        var febrero= <?php echo $febrero?>;
                                        var marzo= <?php echo $marzo?>;
                                        var abril= <?php echo $abril?>;
                                        var mayo= <?php echo $mayo?>;
                                        var junio= <?php echo $junio?>;
                                        var julio = <?php echo $julio?>;                                
                                        var agosto= <?php echo $agosto?>;                                
                                        var septiembre= <?php echo $septiembre?>   ;                             
                                        var octubre= <?php echo $octubre?>          ;                      
                                        var noviembre= <?php echo $noviembre?>  ;
                                        var diciembre= <?php echo $diciembre?>   ;                                                                                           
                                        </script></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Información Tickets</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"><script>var activos= <?php echo $numeroDatosActivos?>;
                                        var concluidos= <?php echo $numeroConcluido?>;
                                        </script></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Activos
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Concluidos
                                        </span>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Usuarios con más tickets</h6>
                                </div>
                                <?php if($longitud>0){
                                    $aux=1;
                                    for($i=0;$i<$longitud;$i++){
                                        if($aux<=5){
                                        ?>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold"><?php echo $arregloUsuariosActivos[$i]?><span
                                            class="float-right"><?php echo $arregloUsuariosConteo[$i]?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="btn-outline-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </div>
                                    <?php $aux=$aux+1;}}}?>
                            </div>

                            <!-- Color System -->
                            

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">INTERCARTON</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="../img/inter.png" alt="...">
                                    </div>
                                    <p>En Intercarton, estamos comprometidos a la comercialización y distribución de papel y cartón plegadizo proveniente de fuentes sustentables de una manera confiable. Y a través de la mejora continua de todos nuestros procesos, basados en el cumplimiento de nuestro SGC y SG-CoC, lograremos la plena satisfacción de nuestros clientes mediante productos que cumplan sus requisitos.
                                        
                                    </p>
                                    <a target="_blank" rel="nofollow" href="https://www.intercarton.com.mx/nosotros/">Nosotros &rarr;</a>
                                </div>
                            </div>

                            <!-- Approach -->
                           

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js">
       
    </script>
    <script>
         
    </script>

    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>