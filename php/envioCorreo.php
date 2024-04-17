<?php


header('Content-Type: text/html; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', '', 'intercartonpruebas') or die(mysqli_error($mysqli));
$correo = $_REQUEST['correo'];
$soporteID = $_REQUEST['soporteID'];
$asunto = $_REQUEST['asunto'];
$solicitante = $_REQUEST['solicitante'];
$ticketID = $_REQUEST['ticket'];
$correoenvio='intercarton@gmail.com';
$estado = $_REQUEST['estado'];

$consulta1=mysqli_query($con,"SELECT * from empleados where empleadoID='$solicitante'");

while ($mostrar = mysqli_fetch_array($consulta1)) 
                         {
$nombre=$mostrar['nombre'].' '.$mostrar['apellidos'];
                         }

if($estado==1){
    $to = $solicitante; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = $asunto;



$email_body = "Estimado/a ".$nombre.",\n\n\nTu ticket con ID ".$ticketID." ha sido revisado y se le ha dado una solución\n\n Si la solución que se le dio no te parece la correcta puedes reactivar tu ticket en el siguiente link: \n";
$email_body.="http://192.168.1.6:8080/PruebasIntercartonBueno/vistas/infoTicketsUsuario.php?buscarTicket=".$ticketID."&correo=".$correo."&estado=3";

$email_body.="\n\nAgradecemos tu paciencia, buen día :D\n";
$email_body.="\n\n\nContacto:\ntickets@intercarton.com.mx\nExt.129 Oscar Hernandez\nExt.131 Arturo Jimenez\n";

$headers = "FROM: ".$correoenvio; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($to,$email_subject,$email_body,$headers);




$to = 'tickets@intercarton.com.mx'; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = $asunto;
$email_body = 'El ticket con asunto '.$asunto.' e ID '.$ticketID.' ha sido corregido';

$headers = "FROM: ".$correoenvio; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($to,$email_subject,$email_body,$headers);
echo "corregido";
}

elseif($estado==3){
    echo $solicitante;
    // Crea el correo electrónico y envía el mensaje
    $to = $solicitante; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
    $email_subject = $asunto;
    $email_body = "Estimado/a ".$nombre.",\n\n\nTu ticket con ID ".$ticketID." ha sido marcado como pendiente, lo que significa que lo estamos revisando\n\nRecuerda que puedes ver su estado en el siguiente enlace: \n";
    $email_body.="http://192.168.1.6:8080/PruebasIntercartonBueno/vistas/infoTicketsUsuario.php?buscarTicket=".$ticketID."&correo=".$correo."&estado=0";
    
    $email_body.="\n\nAgradecemos tu paciencia, buen día :D\n";
    $email_body.="\n\n\nContacto:\ntickets@intercarton.com.mx\nExt.129 Oscar Hernandez\nExt.131 Arturo Jimenez\n";
    
    
    $headers = "FROM: ".$correoenvio; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    
    mail($to,$email_subject,$email_body,$headers);

    $to = 'tickets@intercarton.com.mx'; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = $asunto;
$email_body = 'El ticket con asunto '.$asunto.' e ID '.$ticketID.' se encuentra en revisión';

$headers = "FROM: ".$correoenvio; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($to,$email_subject,$email_body,$headers);
echo "pendiente";
    
}



header('location: ../vistas/infoTickets.php?buscarTicket=' . $ticketID.'&correo='.$correo.'&estado=0');
return true;			
?>