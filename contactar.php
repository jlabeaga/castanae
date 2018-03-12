<?php
// echo '<p>' . 'debug: antes de insertar en BD' . '</p>';

// pimero insertamos los datos en BD y luego hacemos el envio por email

require_once 'debug_functions.php';
require_once 'init_db.php';

// echo '<p>' . 'debug: despues de abrir la BD' . '</p>';

$nombre = '';
$email = '';
$telefono = '';
$comentarios = '';

if( isset($_REQUEST['nombre']) && $_REQUEST['nombre'] ) {
	$nombre = $_REQUEST['nombre'];
}
if( isset($_REQUEST['email']) && $_REQUEST['email'] ) {
	$email = $_REQUEST['email'];
}
if( isset($_REQUEST['telefono']) && $_REQUEST['telefono'] ) {
	$telefono = $_REQUEST['telefono'];
}
if( isset($_REQUEST['comentarios']) && $_REQUEST['comentarios'] ) {
	$comentarios = $_REQUEST['comentarios'];
}

$nombre_esc = mysqli_real_escape_string($mysqli, $nombre);
$email_esc = mysqli_real_escape_string($mysqli, $email);
$telefono_esc = mysqli_real_escape_string($mysqli, $telefono);
$comentarios_esc = mysqli_real_escape_string($mysqli, $comentarios);

// echo '<p>' . 'debug: justo antes de insertar en BD' . '</p>';

$insert_contacto = "INSERT INTO contactos (nombre, email, telefono, comentarios) VALUES ('$nombre_esc', '$email_esc', '$telefono_esc', '$comentarios_esc')";
$result_contacto = $mysqli->query($insert_contacto) or die($mysqli->error.__LINE__);

// echo '<p>' . 'debug: despues de insertar en BD' . '</p>';

require 'close_db.php';

// echo '<p>' . 'debug: despues de cerrar la BD' . '</p>';

// de momento Hostinger no soporta SMTP de forma gratuita
// así que anulamos el código para el envío de emails


// envio de los datos por email, vease:
// http://www.w3schools.com/php/func_mail_mail.asp

$dia = dia_semana(date("l"));
$hoy = $dia . ' ' . date("d/m/Y H:i:s");

$to = "info@castanae.es";
$subject = "Solicitud de contacto desde castanae.es " . $hoy;
$texto = "Nombre y apellidos: " . $nombre . "\r\n" . 
         "Email: " . $email . "\r\n" . 
         "Telefono: " . $telefono . "\r\n" . 
         "Comentarios:" . "\r\n" . 
         $comentarios . "\r\n";
$from = "info@castanae.es";
if( isset($email_esc) && $email_esc ) {
	$from = $email_esc;
}
$headers = "From: " . $from . "\r\n" . "BCC: jlabeaga@hotmail.com,anjhara@hotmail.com";

//echo '<p>' . 'debug: justo antes de enviar el email' . '</p>';

try {
	// echo '<p>' . 'debug: justo antes de enviar el email' . '</p>';
	mail($to,$subject,$texto,$headers);
} catch(Exception $e) {
    echo 'Error: ' .$e->getMessage();
}

// echo '<p>' . 'debug: despues de enviar email' . '</p>';

// hemos terminado, redirigimos a la pagina final

header('Location: resultado_contacto.php');
exit();

//echo '<p>' . 'debug: despues de redirigir' . '</p>';

?>