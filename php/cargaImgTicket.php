<?php
if(!empty($_GET['id'])){
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');
$result = $conexion->query("SELECT imagenes FROM img WHERE imagenID = {$_GET['id']}");
if($result->num_rows > 0){
    $imgDatos = $result->fetch_assoc();
    
    //Mostrar Imagen
    
    header("Content-type: image/jpg"); 
    echo $imgDatos['imagenes']; 
}else{
    echo 'Imagen no existe...';
}
}
else {
    echo "error";
}
?>