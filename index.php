<?php
require_once 'debug_functions.php';
require_once 'init_db.php';

session_start();
$session_id = session_id();
$url = $_SERVER['REQUEST_URI'];
$ip = get_real_ip_address();

// registramos el acceso a la pagina inicial
$session_id = mysqli_real_escape_string($mysqli, $session_id);
$url = mysqli_real_escape_string($mysqli, $url);
$ip = mysqli_real_escape_string($mysqli, $ip);
$observaciones = "acceso la pagina principal index.php";
$insert_acceso = "INSERT INTO accesos (session_id, url, ip, observaciones) VALUES ('$session_id', '$url', '$ip', '$observaciones')";
$result_acceso = $mysqli->query($insert_acceso) or die($mysqli->error.__LINE__);
 
$query_noticias = "SELECT * FROM `noticias` ORDER BY fecha DESC";
$result_noticias = $mysqli->query($query_noticias) or die($mysqli->error.__LINE__);

$query_productos = "SELECT * FROM `productos` ORDER BY orden";
$result_productos = $mysqli->query($query_productos) or die($mysqli->error.__LINE__);

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
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<link rel="canonical" href="http://www.castanae.es/index.php" />
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
	<div class="septop"></div>
	<div id="wrapper">
		<div id="banner">  				

			<div class="oneByOne_item">
				<img src="fotos/rosca_castana.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/biquinos.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/polvorones.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/magdalenas.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/polvorones2.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/polvorones3.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/magdalenas2.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/polvorones4.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/rosca2.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/polvorones5.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/biquinos3.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
			<div class="oneByOne_item">
				<img src="fotos/rosca3.jpg" class="ndx2i"/>
				<span class="ndx2a">Pasteler&iacute;a y reposter&iacute;a artesana</span>			
				<span class="ndx2b">Con los mejores productos naturales</span>
			</div>
<!-- inicio: dejamos solo una imagen
			<div class="oneByOne_item">
				<a href="subcategorias.asp?categoria=preparados-fritos&n=9">
				<img src="img/portada-fritos.jpg" class="ndx4i" alt="" />
				<span class="ndx4a">preparados para</span>
				<span class="ndx4b">Fritos</span>
				</a>
			</div>                                                                                              
			<div class="oneByOne_item">
				<a href="subcategorias.asp?categoria=reposteria&n=11">
				<img src="img/portada-reposteria.jpg" class="ndx5i" alt="" />
				<span class="ndx5a">deliciosa</span>								
				<span class="ndx5b">Repostería</span>											
				</a>
			</div>	
fin: dejamos solo una imagen -->
		</div>    
		<div class="dclear"></div>
	</div>
	<div class="sepbottom"></div>

	<div class="dclear"></div>

	<div class="texto">
	Castanae es un horno de repostería artesanal, gestionado por Anjhara Gómez Rodríguez, basado en la elaboración de dulces y tartas de creación propia y original, manufacturadas con una implicación mecánica mínima para respetar los procesos de elaboración tradicionales, los tiempos de las masas y sin conservantes ni colorantes de ningún tipo, ya que la máxima de este proyecto es la producción de productos naturales con una excelente calidad.
	</div>
	<div class="texto">
	El alma de Castanae se encuentra en el campo, y en el aprovechamiento de nuestros ricos recursos naturales, en conjunción con la naturaleza y con respeto hacia ella, pues el horno donde nacen las delicias que presentamos es una edificación tradicional que en inicio fue destinada a la producción de pan en horno de leña para consumo doméstico que data de los años treinta (siglo XX) y que, de acuerdo a la filosofía de empresa de Castanae se ha rehabilitado y ahora constituye el obrador donde se elaboran todos nuestros productos con el mayor cuidado, situado en el Ayuntamiento de O Corgo, provincia de Lugo, en San Fiz de Paradela, Vilanova nº 18.
	</div>
	
<div id="indexbajo">
		<div class="columna2">
			<h2 style="margin-bottom: 10px;">Noticias</h2>
<?php
if($result_noticias->num_rows > 0) {
	while($row = $result_noticias->fetch_assoc()) {
		//echo stripslashes($row['username']);
		$noticia_id = $row['id'];
		$noticia_titulo = $row['titulo'];
		$noticia_fecha = date("d/m/Y", strtotime($row['fecha']));
		echo '<li style="margin: 5px;"><a href="noticias.php?noticia=' . $noticia_id . '">' . $noticia_fecha . ': ' . $noticia_titulo . '</a></li>';
	}
}
else {
	echo '<li"><a href="#">No hay noticias</a></li>';	
}
?>
		</div>
		<div class="columna2 yfin">
			<h2 style="margin-bottom: 10px;">Nuestros productos</h2>
<?php
if($result_productos->num_rows > 0) {
	while($row = $result_productos->fetch_assoc()) {
		//echo stripslashes($row['username']);
		$producto_cod = $row['cod'];
		$producto_nombre = $row['nombre'];
		$producto_descripcion_corta = $row['descripcion_corta'];
		$producto_foto = $row['foto'];
		echo'<p><a href="producto.php?cod=' . $producto_cod . '"><img src="fotos/' . $producto_foto . '" width="80" height="40" alt="' . $producto_nombre . '" title="' . $producto_nombre . '" class="indexmini"><b>' . $producto_nombre . '</b><br>' . $producto_descripcion_corta . '</a></p>';
		echo '<div class="dclear"></div>';
	}
}
else {
	echo '<li"><a href="#">No hay productos</a></li>';	
}
?>
		</div>
		<div class="dclear"></div>
	</div>
	
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() { 
	$("#inicio").addClass("menua");
	$('#banner').oneByOne({
		className: 'oneByOne1',
		sliderClassName: 'oneByOne_item',  		
		//easeType: 'random',
		easeType: 'fadeInRightBig',
		showArrow: true,
		showButton: true,
		slideShowDelay: 5000,
		slideShow: true
	});
/*
*/
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
		<p>Teléfono: 625 107 135</p>
		<p>&nbsp;</p>
		<p><script type="text/javascript">mkm('info','castanae','es','')</script></p>
	</div>
	<div class="dclear"></div>
</div>


</div>

<script src="cookieControl-6.2.min.js" type="text/javascript"></script>

<div id="cookie_assistant_container"><style tyle="text/css">
#cookie_assistant_wrapper{position:fixed !important;width:320px !important;background-color:#fff !important;padding:10px !important;border:1px solid #ccc !important;border-radius:5px !important;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;font-size:12px !important;line-height:15px !important;z-index:9999 !important;box-shadow:0px 5px 10px rgba(0,0,0,0.2)}#cookie_assistant_wrapper.top-left{left:10px !important;top:10px !important}#cookie_assistant_wrapper.top-right{right:10px !important;top:10px !important}#cookie_assistant_wrapper.bottom-left{left:10px !important;bottom:10px !important}#cookie_assistant_wrapper.bottom-right{right:10px !important;bottom:10px !important}#cookie_assistant_wrapper.dark{background-color:#222 !important;color:#fff !important}#cookie_assistant_wrapper.large{width:600px !important}#cookie_assistant_wrapper h2{font-size:14px !important;line-height:16px !important;margin:0 0 4px 0 !important;padding:0 !important}#cookie_assistant_wrapper p{margin:0 !important;padding:0 !important;margin-top:3px !important;margin-bottom:10px !important}#cookie_assistant_wrapper div.buttons{margin:5px 0 3px 0 !important}#cookie_assistant_wrapper a.btn-accept{padding:4px 8px !important;border-radius:3px !important;font-size:12px !important;-moz-border-radius:4px !important;-webkit-border-radius:4px !important;-khtml-border-radius:4px !important;border-radius:4px !important;-moz-box-shadow:inset 1px 1px 0 rgba(255,255,255,0.3) !important;-webkit-box-shadow:inset 1px 1px 0 rgba(255,255,255,0.3) !important;box-shadow:inset 1px 1px 0 rgba(255,255,255,0.3) !important;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif !important;font-weight:bold !important;text-align:center !important;text-decoration:none !important;cursor:pointer !important;outline:none !important;overflow:visible !important;color:#fff !important;background:#a5bd24 !important;background:-moz-linear-gradient(top, #a5bd24 0%, #7dac38 100%) !important;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #a5bd24), color-stop(100%, #7dac38)) !important;background:-webkit-linear-gradient(top, #a5bd24 0%, #7dac38 100%) !important;background:-o-linear-gradient(top, #a5bd24 0%, #7dac38 100%) !important;background:-ms-linear-gradient(top, #a5bd24 0%, #7dac38 100%) !important;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a5bd24', endColorstr='#7DAC38',GradientType=0 ) !important;background:linear-gradient(top, #a5bd24 0%, #7dac38 100%) !important;text-shadow:0 1px 1px rgba(0,0,0,0.25) !important;border:1px solid #781 !important}#cookie_assistant_wrapper a.btn-accept:focus,#cookie_assistant_wrapper a.btn-accept:hover{text-decoration:none !important;color:#fff !important;background:#5c8825 !important;background:-moz-linear-gradient(top, #8fbb44 0%, #5c8825 100%) !important;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #8fbb44), color-stop(100%, #5c8825)) !important;background:-webkit-linear-gradient(top, #8fbb44 0%, #5c8825 100%) !important;background:-o-linear-gradient(top, #8fbb44 0%, #5c8825 100%) !important;background:-ms-linear-gradient(top, #8fbb44 0%, #5c8825 100%) !important;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8fbb44', endColorstr='#5c8825',GradientType=0 ) !important;background:linear-gradient(top, #8fbb44 0%, #5c8825 100%) !important;border:1px solid #670 !important}#cookie_assistant_wrapper a.btn-more{color:#0088cc !important;font-size:12px !important;margin-left:10px !important}

</style>

<div id="cookie_assistant_wrapper" class="bottom-right">
	<h2>Uso de cookies</h2>	
	<p>Castanae.es utiliza cookies, tanto propias como de terceros. Si continua navegando, consideramos que acepta su uso</p>

	<div class="buttons">
		<a href="#" class="btn-accept">Aceptar</a>
		<a href="politica_cookies.html" class="btn-more" target="_blank">Leer más</a>
	</div>
</div></div>

</body>
</html>

<?php include_once("analyticstracking.php") ?>

<?php
require_once 'close_db.php';
?>
