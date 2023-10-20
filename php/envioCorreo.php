<?php


                         
$correo = $_REQUEST['correo'];
$soporteID = $_REQUEST['soporteID'];
$asunto = $_REQUEST['asunto'];
$solicitante = $_REQUEST['solicitante'];
$ticketID = $_REQUEST['ticket'];
$correoenvio='intercarton@gmail.com';
// Crea el correo electrónico y envía el mensaje
$to = $solicitante; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = $asunto;
$email_body = 'El ticket con asunto '.$asunto.' ha sido corregido, favor de revisar';

$headers = "FROM: ".$correoenvio; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($to,$email_subject,$email_body,$headers);

$to = 'tickets@intercarton.com.mx'; // Agregua tu dirección de correo electrónico entre el "" reemplazando msevillab@gmail.com - Aquí es donde el formulario enviará un mensaje.
$email_subject = $asunto;
$email_body = 'El ticket con asunto '.$asunto.' e ID '.$ticketID.' ha sido corregido';

$headers = "FROM: ".$correoenvio; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

mail($to,$email_subject,$email_body,$headers);
echo "Tu correo ha sido enviado";

header('location: ../vistas/infoTickets.php?buscarTicket=' . $ticketID.'&correo='.$correo.'&estado=0');
return true;			
?>