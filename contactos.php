<?php

// Autenticacion Básica HTTP
if( !isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Autenticacion de Castanae.es"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Error de autenticacion en Castanae.es';
    exit;
}

require_once 'debug_functions.php';
require_once 'init_db.php';

// Autenticacion Básica HTTP
if( $_SERVER['PHP_AUTH_USER']!="anjhara" || md5($_SERVER['PHP_AUTH_PW'])!="cb2333ed48a2b8ca61f49b2a05ffd1c8" ) {

	session_start();
	$session_id = session_id();
	$url = $_SERVER['REQUEST_URI'];
	$ip = get_real_ip_address();

	// registramos el acceso a la pagina
	$session_id = mysqli_real_escape_string($mysqli, $session_id);
	$url = mysqli_real_escape_string($mysqli, $url);
	$ip = mysqli_real_escape_string($mysqli, $ip);
	$observaciones = "acceso infructuoso la pagina contactos.php";
	$insert_acceso = "INSERT INTO accesos (session_id, url, ip, observaciones) VALUES ('$session_id', '$url', '$ip', '$observaciones')";
	$result_acceso = $mysqli->query($insert_acceso) or die($mysqli->error.__LINE__);

	require 'close_db.php';
	
    header('WWW-Authenticate: Basic realm="Autenticacion de Castanae.es"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Error 2 de autenticacion en Castanae.es';
    exit;
}


function href_encode($texto) {
	$texto_codificado = str_replace( ' ', '%20', $texto);
	$texto_codificado = str_replace( '\n\r', '%0D%0A', $texto_codificado);
	return $texto_codificado;
}


$action = 'get';

if( isset($_REQUEST['action']) && $_REQUEST['action'] ) {
	$action = $_REQUEST['action'];
}

if( $action == 'delete' ) {
    if( isset($_REQUEST['id']) && $_REQUEST['id'] ) {
	    $id = $_REQUEST['id'];
		$query_delete = "DELETE FROM `contactos` WHERE id = $id";
		$result_delete = $mysqli->query($query_delete) or die($mysqli->error.__LINE__);
    }
}

if( $action == 'update' ) {
	$leido = 0;
    if( isset($_REQUEST['id']) && $_REQUEST['id'] ) {
	    $id = $_REQUEST['id'];
	    $leido = $_REQUEST['leido'];
		$query_update = "UPDATE `contactos` SET leido = $leido WHERE id = $id";
		$result_update = $mysqli->query($query_update) or die($mysqli->error.__LINE__);
    }
}

$query_contactos = "SELECT * FROM `contactos` ORDER BY fecha DESC";
$result_contactos = $mysqli->query($query_contactos) or die($mysqli->error.__LINE__);

?>

<!DOCTYPE HTML>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Castanae: Pasteleria y reposteria artesana con productos naturales. Lugo, Galicia, España.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Castanae es una empresa ubicada en Lugo dedicada a la producción y distribución de productos de respotería artesana confeccionados con ingredientes naturales de la máxima calidad." />
<meta name="keywords" content="castanae, reposteria, artesano, pasteles, tartas, bolleria, pastas, Lugo" />
<meta name="author" content="Castanae" />
<meta name="distribution" content="global" /> 
<meta name="resource-type" content="document" />
<meta name="robots" content="all" />
<meta name="revisit-after" content="15 days" />
<link type="text/css" rel="stylesheet" href="_cssweb.css" media="screen" />
<link type="text/css" rel="stylesheet" href="_cssprint.css" media="print" />
<link type="image/x-icon" rel="shortcut icon" href="favicon.ico" />
<link type="image/x-icon" rel="icon" href="favicon.ico" />
<script type="text/javascript" src="_funciones.js"></script>

<script src="slider/jquery-1.8.1.min.js"></script>
<script src="slider/jquery.onebyone.min.js"></script>  
<script src="slider/jquery.touchwipe.min.js"></script>
<link rel="stylesheet" type="text/css" href="slider/animate.css">
<link rel="stylesheet" type="text/css" href="slider/jquery.onebyone.css">
<link rel="stylesheet" type="text/css" href="slider/custom.css">
</head>
<body>
<!--
<div id="cookie-law-info-bar" style="display: block; color: rgb(255, 255, 255); font-family: inherit; border-top-width: 4px; border-top-style: solid; border-top-color: rgb(68, 68, 68); position: fixed; bottom: 0px; background-color: rgb(239, 149, 149);">
<span>Utilizamos cookies propias y ajenas para facilitar el uso y elaborar estadísticas. Si continúa navegando, consideramos que acepta su uso <a href="#" id="cookie_action_close_header" target="_new" class="small cli-plugin-button cli-plugin-main-button" style="color: rgb(255, 255, 255); background-color: rgb(51, 51, 51);">Aceptar</a> Consulte nuestra <a href="http://www.pasteleria-nunos.es/cookies/" id="CONSTANT_OPEN_URL" target="_new" class="cli-plugin-main-link" style="color: rgb(0, 0, 0);">Política de cookies</a> <br></span>
</div>
<div id="cookie-law-info-again" style="color: rgb(255, 255, 255); position: fixed; font-family: inherit; border-top-width: 1px; border-right-width: 1px; border-left-width: 1px; border-style: solid solid none; border-top-color: rgb(68, 68, 68); border-right-color: rgb(68, 68, 68); border-left-color: rgb(68, 68, 68); bottom: 0px; right: 100px; display: none; background-color: rgb(239, 149, 149);"><span id="cookie_hdr_showagain">Política de Cookies</span></div>
-->
<div id="container">

<div id="top">

<span id="toplogos"><a id="downpdf" href="catalogo/catalogo-castanae.pdf" target="_blank">DESCARGAR CATÁLOGO PDF</a></span>

<a id="toplogo" href="index.php"><img src="img/logo_castanae.jpg" width="30%" alt="" /></a>

<ul id="menu">
 <li><a id="inicio" class="menui" href="index.php">Inicio</a></li>
 <li><a id="productos" class="menui" href="productos.php">Productos</a></li>
 <li><a id="noticias" class="menui" href="noticias.php">Noticias</a></li>
 <li><a id="quienes_somos" class="menui" href="quienes_somos.php">Quiénes somos</a></li>
 <li><a id="contacto" class="menui" href="contacto.php">Contacto</a></li>
</ul>

<div class="dclear"></div>
</div>


<div id="contenido">

<div id="indexbajo">
		<div class="columna1 yfin">
			<h2 style="margin-bottom: 30px;">Mensajes de contacto</h2>
<?php
$num_filas = $result_contactos->num_rows;
$min_filas = 11;
if($result_contactos->num_rows > 0) {
?>
<table>
<tr>
  <th style="padding: 5px;">Fecha / Hora</th> 
  <th style="padding: 5px;">Leido</th>
  <th style="padding: 5px;">Nombre</th>
  <th style="padding: 5px;">Email</th>
  <th style="padding: 5px;">Telefono</th>
  <th style="padding: 5px;">Comentarios</th>
  <th style="padding: 5px;">Opciones</th>
</tr>	
<?php
	while($row = $result_contactos->fetch_assoc()) {
		//echo stripslashes($row['username']);
		$id = $row['id'];
		$dia = date("l", strtotime($row['fecha']));
		$fecha = dia_semana($dia) . ' ' . date("d/m/Y H:i:s", strtotime($row['fecha']));
		//setlocale(LC_TIME, "es_ES.utf8");
		//$fecha = strftime("%A %d/%m/%Y %H:%M:%S", strtotime($row['fecha']));
		$leido = $row['leido'];
		$nombre = $row['nombre'];
		$email = $row['email'];
		$telefono = $row['telefono'];
		$comentarios = $row['comentarios'];
		$mailto = "mailto:info@castanae.es?cc=jlabeaga@hotmail.com&subject=Solicitud de contacto con castanae.es de " . $nombre;
		$mailto = $mailto . "&body=Fecha: $fecha%0D%0ANombre: $nombre%0D%0AEmail: $email%0D%0ATeléfono: $telefono%0D%0AComentarios: $comentarios";
		$mailto = href_encode($mailto);
		echo '<tr>';
		echo '<td style="padding: 5px; text-align: center;"><a href="contactos.php?id=' . $id . '">' . $fecha . '</a></td>';
		echo '<td style="padding: 5px; text-align: center;"><input type="checkbox" id="' . $id .'" ';
		if( $leido == 1 ) echo 'checked ';
		echo 'onclick="toggleCheckbox(' . $id . ')"></td>';
		echo '<td style="padding: 5px;"><a href="contactos.php?id=' . $id . '">' . $nombre . '</a></td>';
		echo '<td style="padding: 5px;"><a href="contactos.php?id=' . $id . '">' . $email . '</a></td>';
		echo '<td style="padding: 5px;"><a href="contactos.php?id=' . $id . '">' . $telefono . '</a></td>';
		echo '<td style="padding: 5px;"><a href="contactos.php?id=' . $id . '">' . $comentarios . '</a></td>';
		echo '<td style="padding: 5px; text-align: center;">';
		echo '<p><a href=' . $mailto . ' style="padding:4px; border:1px solid #999999; border-radius:25px;box-shadow:3px 3px 3px #888888;">Enviar</a></p>';
		echo '<p><a href="#" onclick="borrar(' . $id . ')" style="padding:4px; border:1px solid #999999; border-radius:25px;box-shadow:3px 3px 3px #888888;" >Borrar</a></p>';
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
}
else {
		echo '<tr>';
		echo '<td style="padding: 5px;">No hay mensajes de contacto</td>';
		echo '</tr>';
}
?>
</table>
		</div>
		<div class="dclear"></div>
<?php
$resto_filas = $min_filas - $num_filas;
for( $fila = 0; $fila < $resto_filas; $fila++ ) {
?>
		<div class="columna1 yfin">
		&nbsp;
		</div>
		<div class="dclear"></div>
<?php
}
?>
	</div>
	
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() { 
});

function borrar(id) {
	window.location.href = 'contactos.php?action=delete&id=' + id;
}

function toggleCheckbox(id) {
	if( document.getElementById(id).checked ) {
		//alert('checked');
		window.location.href = 'contactos.php?action=update&leido=1&id=' + id;
	} else {
		//alert('unchecked');
		window.location.href = 'contactos.php?action=update&leido=0&id=' + id;
	}

}

</script> 

<div id="pie">
	<div id="pie1">
	&nbsp;
	</div>
	<div id="pie2">
		<p>Castanae</p>
		<p>San Fiz de Paradela, Vilanova 18</p>
		<p>27365 O Corgo - Lugo</p>
		<p><a href="aviso_legal.php">Aviso legal</a></p>
	</div>
	<div id="pie3">
		<p>Teléfono: 625 107 135</p>
		<p>&nbsp;</p>
		<p><script type="text/javascript">mkm('castanaegalicia','gmail','com','')</script></p>
	</div>
	<div class="dclear"></div>
</div>


</div>

</body>
</html>

<?php
require 'close_db.php';
?>
