<?php

$con = mysqli_connect('localhost', 'root', '', 'intercartonpruebas') or die(mysqli_error($mysqli));

funcionPHP($con);

  
   function funcionPHP($con){
      
      try{
    $consulta3 = mysqli_query($con,"UPDATE notificaciones set estado='leido'");
    
      }catch (Exception $e){
         echo 'Excepción capturada: ',  $e->getMessage(), "\n";
     }
   }



        


?>