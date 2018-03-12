<?php
require_once 'init_db.php';

$query = "SELECT * FROM `noticias` ORDER BY fecha DESC";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>

<!DOCTYPE HTML>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Noticias sobre Castanae y nuevos productos y servicios. Pasteleria y reposteria artesana. Lugo, Galicia, Espa�a.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Castanae es una empresa ubicada en Lugo dedicada a la producci�n y distribuci�n de productos de respoter�a artesana confeccionados con ingredientes naturales de la m�xima calidad." />
<meta name="keywords" content="castanae, reposteria, artesano, pasteles, tartas, bolleria, pastas, Lugo" />
<meta name="author" content="Castanae" />
<meta name="distribution" content="global" /> 
<meta name="resource-type" content="document" />
<meta name="robots" content="all" />
<meta name="revisit-after" content="15 days" />
<link rel="canonical" href="http://www.castanae.es/noticias.php" />
<link type="text/css" rel="stylesheet" href="_cssweb.css" media="screen" />
<link type="text/css" rel="stylesheet" href="_cssprint.css" media="print" />
<link type="image/x-icon" rel="shortcut icon" href="favicon.ico" />
<link type="image/x-icon" rel="icon" href="favicon.ico" />
<script type="text/javascript" src="_funciones.js"></script>
<script src="jquery/1.5/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://malsup.github.com/chili-1.7.pack.js"></script> -->
<script src="chili-1.7.pack.js"></script>
<script type="text/javascript" src="jquery/jquery.cycle.all.js"></script>
</head>
<body>

<div id="container">

<div id="top">

<span id="toplogos"><a id="downpdf" href="catalogo/catalogo-castanae.pdf" target="_blank">DESCARGAR CAT�LOGO PDF</a></span>

<a id="toplogo" href="index.php"><img src="img/logo_castanae.jpg" width="30%" alt="" /></a>

<ul id="menu">
 <li><a id="inicio" class="menui" href="index.php">Inicio</a></li>
 <li><a id="productos" class="menui" href="productos.php">Productos</a></li>
 <li><a id="noticias" class="menui" href="noticias.php">Noticias</a></li>
 <li><a id="quienes_somos" class="menui" href="quienes_somos.php">Qui�nes somos</a></li>
 <li><a id="contacto" class="menui" href="contacto.php">Contacto</a></li>
</ul>

<div class="dclear"></div>
</div>


<div id="contenido">

<?php
if($result->num_rows > 0) {

	$detalle_noticia_fecha = '';
	$detalle_noticia_titulo = '';
	$detalle_noticia_texto = '';

	while($row = $result->fetch_assoc()) {
		//echo stripslashes($row['username']);
		$id = $row['id'];
		$titulo = $row['titulo'];
		$fecha = date("d/m/Y", strtotime($row['fecha']));
		$detalle_noticia_fecha = $fecha;
		$detalle_noticia_titulo = $titulo;
		$detalle_noticia_texto = $row['texto'];
		if( $id == $noticia ) {
		}
		echo '<div class="noticia">';
		echo '	<h2 style="line-height: 1.5em;">' . $detalle_noticia_fecha . ': ' . $detalle_noticia_titulo . '</h2>';
		echo '	<div style="margin-left: 20px;">' . $detalle_noticia_texto . '</div>';
		echo '</div>';
	}
}
else {
	echo '<li class="columna1_li"><a href="#">No hay noticias</a></li>';	
}
?>
	<div class="dclear"></div>

</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$("#noticias").addClass("menua");
	$("#noticia<?php echo $noticia?>").removeClass("eventoinactivo").addClass("eventoactivo");
});
</script> 

<div id="pie">
	<div id="pie1">
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p style="padding: 0px;"><a target="_new" href="https://www.facebook.com/castanae.es">https://www.facebook.com/castanae.es</a></p>
	</div>
	<div id="pie2">
		<p>Castanae</p>
		<p>San Fiz de Paradela, Vilanova 18</p>
		<p>27365 O Corgo - Lugo</p>
		<p><a href="aviso_legal.php">Aviso legal</a></p>
	</div>
	<div id="pie3">
		<p>Tel�fono: 625 107 135</p>
		<p>&nbsp;</p>
		<p><script type="text/javascript">mkm('info','castanae','es','')</script></p>
	</div>
	<div class="dclear"></div>
</div>


</div>

<?php include_once("analyticstracking.php") ?>

</body>
</html>
<?php
require_once 'close_db.php';
?>
