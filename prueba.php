<?php
require_once 'init_db.php'; 


$query = "SELECT * FROM `pruebas`";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>

<!DOCTYPE HTML>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pruebas de db</title>
</head>
<body>
<p>Prueba de texto hardcodeado con caracteres especiales: ñ Ñ á é í ó ú Á É Í Ó Ú</p>
<p>Pruebas de DB</p>

<?php
if($result->num_rows > 0) {
?>
<table border="1">
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>utf8_encode</th>
    <th>utf8_decode</th>
  </tr>
<?php
	while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['nombre']?></td>
    <td><?php echo utf8_encode($row['nombre'])?></td>
    <td><?php echo utf8_decode($row['nombre'])?></td>
  </tr>
<?php
	}
}
else {
	echo '<p>No hay registros en la tabla</p>';	
}
?>
</table>

</body>
</html>

<?php
require_once 'close_db.php';
?>
