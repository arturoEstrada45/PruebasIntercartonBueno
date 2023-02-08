<?php
$buscarTicket=$_REQUEST['buscarTicket'];
$correo=$_REQUEST['correo'];
$estado=$_REQUEST['estado'];

$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');


$sql =  "SELECT * from tickets WHERE ticketID='$buscarTicket'";
$result = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($result)) 
{
        $ticketID=$mostrar['ticketID'];      
        $asunto=$mostrar['asunto'];        
        $descripcion=$mostrar['descripcion'];  
        $solicitante=$mostrar['solicitanteID'];  
        $estado=$mostrar['estado'];  
        $prioridad=$mostrar['prioridad'];  
        $soporteID=$mostrar['soporteID'];
}
$sql =  "SELECT * from img WHERE ticketID='$buscarTicket'";
$result = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($result)) 
{
        $imagenID=$mostrar['imagenID'];      
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

    <title>Información Servicios</title>

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
                                
                            <img src="../php/cargaImgTicket.php?id=<?php echo $imagenID?>" alt='<?php echo $imagenID?>' width="600" />   
                    </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">ID del Ticket <?php echo $buscarTicket?></h1>
                                        <h1 class="h4 text-gray-900 mb-2">Asunto del Ticket <?php echo $asunto?></h1>
                                        <p class="mb-4"><?php echo $descripcion ?></p>
                                        <h1 class="h4 text-gray-900 mb-2">Estado del ticket:</h1>
                                        <p class="mb-4"><?php echo $estado ?></p>
                                        <h1 class="h4 text-gray-900 mb-2">¿Quién solicita el Ticket? </h1>
                                        <p class="mb-4"><?php echo $solicitante ?></p>
                                        <h1 class="h4 text-gray-900 mb-2">¿Quién dara soporte al Ticket? </h1>
                                        <p class="mb-4"><?php echo $soporteID ?></p>
                                    </div>
                                    
                                    <div class="text-center">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="text-gray-400"></i>
                                    Cambiar estado
                                </a>
                                    </div>
                                
                                    <div class="text-center">
                                        <a class="small" href="servicios.php?correo=<?php echo $correo ?>">Regresar a los servicios</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">¿Ya concluiste el servicio?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Concluido" si ya terminaste tu servicio, si no solo oprime "Pendiente".</div>
                <div class="modal-footer">
                    <a class="btn btn-warning" href="../vistas/infoService.php?buscarServicio=<?php echo $buscarServicio?>&correo=<?php echo $correo?>&estado=<?php echo $cambioEstadoPendiente?>">Pendiente</a>
                    <a class="btn btn-primary" href="../vistas/infoService.php?buscarServicio=<?php echo $buscarServicio?>&correo=<?php echo $correo?>&estado=<?php echo $cambioEstado?>">Concluido</a>
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