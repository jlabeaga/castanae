<?php
require_once 'init_db.php';

$query_productos = "SELECT * FROM `productos` ORDER BY orden";
$result_productos = $mysqli->query($query_productos) or die($mysqli->error.__LINE__);

?>

<!DOCTYPE HTML>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Castanae: Productos de pasteleria y reposteria artesana con ingredientes naturales. Lugo, Galicia, España.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Castanae es una empresa ubicada en Lugo dedicada a la producción y distribución de productos de respotería artesana confeccionados con ingredientes naturales de la máxima calidad." />
<meta name="keywords" content="castanae, reposteria, artesano, pasteles, tartas, bolleria, pastas, Lugo" />
<meta name="author" content="Castanae" />
<meta name="distribution" content="global" /> 
<meta name="resource-type" content="document" />
<meta name="robots" content="all" />
<meta name="revisit-after" content="15 days" />
<link rel="canonical" href="http://www.castanae.es/productos.php" />
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

<div class="columna1 yfin">
</div> <!-- columna1 -->

<h2 style="margin:30px 0 0 0;">Nuestros productos de pasteler&iacute;a y reposter&iacute;a</h2>

<div id="indexbajo2">
<?php
if($result_productos->num_rows > 0) {
	while($row = $result_productos->fetch_assoc()) {
		//echo stripslashes($row['username']);
		$producto_cod = $row['cod'];
		$producto_nombre = $row['nombre'];
		$producto_descripcion_corta = $row['descripcion_corta'];
		$producto_foto = $row['foto'];
		echo'<p><a href="producto.php?cod=' . $producto_cod . '"><img src="fotos/' . $producto_foto . '" width="60" height="60" alt="' . $producto_nombre . '" title="' . $producto_nombre . '" class="indexmini"><b>' . $producto_nombre . '</b><br>' . $producto_descripcion_corta . '</a></p>';
		echo '<div class="dclear"></div>';
	}
}
else {
	echo '<li"><a href="#">No hay productos</a></li>';	
}
?>
</div> <!-- indexbajo -->

</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() { 
	$("#productos").addClass("menua");
});
</script> 

{{pie.html}}

</div>

<?php include_once("analyticstracking.php") ?>

</body>
</html>