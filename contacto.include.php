<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
-->
<!DOCTYPE HTML>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Castanae: Contacta con nosotros. Pasteleria y reposteria. Lugo, Galicia, España.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Castanae es una empresa ubicada en Lugo dedicada a la producción y distribución de productos de respotería artesana confeccionados con ingredientes naturales de la máxima calidad." />
<meta name="keywords" content="castanae, reposteria, artesano, pasteles, tartas, bolleria, pastas, Lugo" />
<meta name="author" content="Castanae" />
<meta name="distribution" content="global" /> 
<meta name="resource-type" content="document" />
<meta name="robots" content="all" />
<meta name="revisit-after" content="15 days" />
<link rel="canonical" href="http://www.castanae.es/contacto.php" />
<link type="text/css" rel="stylesheet" href="_cssweb.css" media="screen" />
<link type="text/css" rel="stylesheet" href="_cssprint.css" media="print" />
<link type="image/x-icon" rel="shortcut icon" href="favicon.ico" />
<link type="image/x-icon" rel="icon" href="favicon.ico" />
<script type="text/javascript" src="_funciones.js"></script>
<script src="jquery/1.5/jquery.min.js"></script>
</head>
<body>

<div id="container">

{{top.html}}

<div id="contenido">

	<h2 style="margin:30px 0 0 0;">Contacto</h2>

	<div id="contact1">
	<p>Puede ponerse en contacto con nosotros por cualquiera de los siguientes medios:</p>
	<h3><img class="iconocon" src="img/icono-direccion.png" width="50" height="50" alt="" style="padding-top: 10px; padding-bottom: 10px;">Dirección:</h3>
	<p>Anjhara G&oacute;mez<br>San Fiz de Paradela, Vilanova 18<br>27365 O Corgo - Lugo</p>
	<h3><img class="iconocon" src="img/icono-telefono.png" width="50" height="50" alt="">Teléfono:</h3>
	<p>625 107 135</p>
	<h3><img class="iconocon" src="img/icono-email.png" width="50" height="50" alt="">E-mail:</h3>
	<p><script type="text/javascript">mkm('info','castanae','es','')</script></p>
	</div>

	<div id="contact2">

	<form method="post" name="fcontacto" id="fcontacto" action="contactar.php" onsubmit="return validate()">
	<p>También puede ponerse en contacto con nosotros rellenando el siguiente formulario:</p>
	<p><label>Nombre y apellidos*</label><input class="ancho310" type="text" name="nombre" id="nombre" size="50" maxlength="75"></p>
	<p><label>E-mail*</label><input class="ancho310" type="text" name="email" id="email" size="50" maxlength="75"></p>
	<p><label>Teléfono</label><input class="ancho310" type="text" name="telefono" id="telefono" size="15" maxlength="25"></p>
	<p><label>Comentarios</label><textarea class="ancho310" name="comentarios" id="comentarios" rows="4"></textarea></p>
	<p class="centro"><button><strong>Enviar</strong></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*campos obligatorios</p>
	</form>

	</div>
	<div class="dclear"></div>

</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() { 
	$("#contacto").addClass("menua");
});
</script> 

{{pie.html}}

</div>

<?php include_once("analyticstracking.php") ?>

</body>
</html>