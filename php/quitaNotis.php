<?php
$conexion = mysqli_connect('localhost', 'root', '', 'intercartonpruebas');
funcionPHP();

  
   function funcionPHP(){
    $consulta3 = mysqli_query($conexion,"UPDATE notificaciones set estado='leido'");
   }



        


?>