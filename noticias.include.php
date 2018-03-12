<?php
require_once 'init_db.php';

if( isset($_REQUEST['noticia']) && $_REQUEST['noticia'] ) {
	$noticia = $_REQUEST['noticia'];
} else {
    // por defecto, mostramos la última noticia
    $query = "SELECT id FROM `noticias` WHERE fecha = (SELECT max(fecha) FROM `noticias`)";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    if($result->num_rows > 0) {
	    $row = $result->fetch_assoc();
	    $noticia = $row['id'];
    }
}

$query = "SELECT * FROM `noticias` ORDER BY fecha DESC";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>

<!DOCTYPE HTML>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Noticias sobre Castanae y nuevos productos y servicios. Pasteleria y reposteria artesana. Lugo, Galicia, España.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Castanae es una empresa ubicada en Lugo dedicada a la producción y distribución de productos de respotería artesana confeccionados con ingredientes naturales de la máxima calidad." />
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

{{top.html}}

<div id="contenido">

	<div id="news1">
		<ul>
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
		if( $id == $noticia ) {
			$detalle_noticia_fecha = $fecha;
			$detalle_noticia_titulo = $titulo;
			$detalle_noticia_texto = $row['texto'];;
		}
		echo '<li id="noticia' . $id . '" class="eventoinactivo"><a href="noticias.php?noticia=' . $id . '">' . $fecha . ': ' . $titulo . '</a></li>';
	}
}
else {
	echo '<li class="columna1_li"><a href="#">No hay noticias</a></li>';	
}
?>
		 </ul>
	</div>

	<div id="news2">
		<h2 style="line-height: 1.5em;"><?php echo $detalle_noticia_fecha . ': ' . $detalle_noticia_titulo ;?></h2>
		<div><?php echo $detalle_noticia_texto ;?></div>
	</div>
	
	<div class="dclear"></div>

</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$("#noticias").addClass("menua");
	$("#noticia<?php echo $noticia?>").removeClass("eventoinactivo").addClass("eventoactivo");
});
</script> 

{{pie.html}}

</div>

<?php include_once("analyticstracking.php") ?>

</body>
</html>
<?php
require_once 'close_db.php';
?>