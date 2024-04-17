<?php
$correo = $_REQUEST['correo'];
$estado = $_REQUEST['estado'];
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

    <title>Registrar empleado</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="../img/registroEmpleado.jpg" width="505" height="505">
                    </div>
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Agregar Empleado</h1>
                            </div>
                            <form action="../php/conexion.php" method="POST" id="licencia">
                                <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="correoRegistro" name="correoRegistro"
                                            placeholder="Correo" pattern="[a-zA-Z0-9.#$%&*+_-]{1,35}(@intercarton.com.mx){1}" required data-toggle="tooltip" data-placement="right" title="El correo debe ser de la empresa @intercarton.com.mx">
                                   
                                </div>

                                <!-- Este solo es para no perder la conexion del usuario-->
                                <input type="hidden" name="correo" id="correo" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="busca" aria-describedby="basic-addon2" value="<?php echo $correo ?>"> 
                             
                             <div class="form-group row">
                                     <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nombre" name="nombre"
                                            placeholder="Introduce tu Nombre" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,35})" required data-toggle="tooltip">
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="apellidos" name="apellidos"
                                            placeholder="Introduce tus Apellidos" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,35})" required data-toggle="tooltip">
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control form-control-user" id="area" name="area">
                                           <option selected="select">Area:</option>
                                            <option>RH</option>
                                            <option>Sistemas</option>
                                            <option>Almacen</option>
                                            <option>Embarques</option>
                                            <option>Producción</option>
                                            <option>Atención a clientes</option>
                                            <option>Compras</option>
                                            <option>Contabilidad</option>
                                            <option>Calidad</option>
                                            <option>Ventas</option>

                                          </select>        
                                </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="contrasenia" name="contrasenia"
                                            placeholder="Contraseña"  pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9./+*-_,]{1,10000})" required data-toggle="tooltip" data-placement="right" title="Solo letras, números y espacios">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="cuenta" name="cuenta"
                                            placeholder="Cuenta Intelissis"  pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9./+*-_,]{1,10000})" required data-toggle="tooltip" data-placement="right" title="Solo letras, números y espacios">
                                   
                                </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="contraseniaInte" name="contraseniaInte"
                                            placeholder="Contraseña Intelisis"  pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9./+*-_,]{1,10000})" required data-toggle="tooltip" data-placement="right" title="Solo letras, números y espacios">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="cuentaServer" name="cuentaServer"
                                            placeholder="Cuenta Servidor"  pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9./+*-_,]{1,10000})" required data-toggle="tooltip" data-placement="right" title="Solo letras, números y espacios">
                                   
                                </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="contraseniaServer" name="contraseniaServer"
                                            placeholder="Contraseña Servidor"  pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ0-9./+*-_,]{1,10000})" required data-toggle="tooltip" data-placement="right" title="Solo letras, números y espacios">
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary btn-user btn-block" type="submit" name="registrarEmpleado" form="licencia">
                                    Registrar Empleado 
                                </button>
                                <button class="btn btn-danger btn-user btn-block" type="button" onclick="location.href='empleados.php?correo=<?php echo $correo ?>'">
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