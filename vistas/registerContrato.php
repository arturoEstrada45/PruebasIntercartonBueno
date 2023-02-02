<?php
$correo = $_REQUEST['correo'];
$estado = "0";
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');
$sql =  "SELECT * from inventarios";
$result = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                        <img src="../img/registroContratos.jpg" width="500" height="410">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Agregar Contratos</h1>
                            </div>
                            <form action="../php/conexion.php" method="POST" id="register">
                                <div class="form-group" >
                                        <input type="text" class="form-control form-control-user" id="descripcion" name="descripcion"
                                            placeholder="Descripcion de contrato" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9,.-_!#$%*+&/ ]{1,10000})" required data-toggle="tooltip">
                                    
                                </div>
                                <input type="hidden" name="correo" id="correo" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $correo ?>"> 
                            
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="proveedor" name="proveedor"
                                        placeholder="Proveedor"  pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9,.-_!#$%*+&/ ]{1,10000})" required data-toggle="tooltip" data-placement="right" title="Solo letras, números y espacios">
                                </div>
                                <div class="form-group ">
                                        <input type="text" class="form-control form-control-user" id="vigencia" name="vigencia"
                                            placeholder="Vigencia" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9,.-_!#$%*+&/ ]{1,10000})"  required data-toggle="tooltip" data-placement="right" title="El correo debe ser de la empresa @intercarton.com.mx">
                                </div>
                                  
                               
                                <button class="btn btn-primary btn-user btn-block" type="submit" name="registrarContrato" form="register">
                                    Registrar Contrato
                                </button>
                                <button class="btn btn-danger btn-user btn-block" type="button" onclick="location.href='contratos.php?correo=<?php echo $correo ?>&estado=<?php echo $estado?>'">
                                    Regresar página anterior
                                </button>
                               
                            </form>
                            
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

</body>

</html>