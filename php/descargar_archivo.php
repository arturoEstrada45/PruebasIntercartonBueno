<?php
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');


$id=$_REQUEST['id'];
$qry = "SELECT * FROM img WHERE imagenID=$id";
 $res = mysqli_query($conexion,$qry);
 $contenido = mysqli_fetch_array($res);
 $tipo =$contenido['tipo'];
$nombre=$contenido['nombre'];

 header("Content-type: $tipo"); 
 header('Content-Disposition: attachment; filename="'.$nombre.'"');
 echo $contenido['imagenes']; 
 ?>