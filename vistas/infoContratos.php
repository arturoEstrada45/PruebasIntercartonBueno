<?php
$contrato=$_REQUEST['contrato'];
$correo=$_REQUEST['correo'];
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');
$sql =  "SELECT * from contratos WHERE contratoID='$contrato'";
$result = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($result)) 
{
        $contratoID=$mostrar['contratoID'];      
        $descripcion=$mostrar['descripcion'];        
        $proveedor=$mostrar['proveedor'];  
        $vigencia=$mostrar['vigencia'];
    }




    $sql =  "SELECT * from documents WHERE contratoID='$contrato'";
$result = mysqli_query($conexion, $sql);

$numeroDatos= mysqli_num_rows($result);
while ($mostrar = mysqli_fetch_array($result)) 
{
        $documentID=$mostrar['documentID'];      
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

    <title>Información Contrato</title>

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
                        <img src="../img/infoService.jpg" width="430" height="530">
                    </div>
                            <div class="col-lg-6">
                                <div class="p-5">
<div class="text-center">
                                        
<h1 class="h4 text-gray-900 mb-2">ID del Contrato</h1>
<p class="mb-4"><?php echo $contratoID ?></p>
<h1 class="h4 text-gray-900 mb-2">Descripcion:</h1>
<p class="mb-4"><?php echo $descripcion ?></p>
<h1 class="h4 text-gray-900 mb-2">Proveedor de contrato: </h1>
<p class="mb-4"><?php echo $proveedor ?></p>
<h1 class="h4 text-gray-900 mb-2">Vigencia: </h1>
<p class="mb-4"><?php echo $vigencia ?></p>

<?php if($numeroDatos!="0"){
    echo "<h1 class=h4 text-gray-900 mb-2>Documento del Contrato</h1>  
<a href='../php/descargarDocumento.php?id=$documentID'>Descargar</a>";
}?>
            

</div>
                                    
                                    <div class="text-center">
                                        <a class="small"href="../vistas/contratos.php?correo=<?php echo $correo?>">Regresar al menú.</a>
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