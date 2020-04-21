<?php
extract($_REQUEST);
$data=unserialize($data);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editando Pelicula</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<br>
<form action="ControladorPeliculas.php" method="post" name="formulario">
<table>
	<tr>
		<td colspan="2">Editar Datos</td>
	</tr>
	<tr>
			<td align="right">Nombre:</td>
			<td align="left">
			<input type="text" name="nombre" id="nombre" required="required" placeholder="Ingrese el nombre de la pelicula"  size="50">
			</td></tr>
	<tr>
		<td align="right">Director:</td>
			<td align="left">
			<input type="text" name="director" id="director" required="required" placeholder="Nombre del director"  size="50">
			</td></tr>
	<td align="right">Compañia:</td>
			<td align="left">
			<input type="text" name="compañia" id="compañia" required="required" placeholder="Compañia"  size="50">
			</td></tr>
			<tr>
	<td align="right">Año de estreno:</td>
	<td>
		<input type="date" name="date_birth" id="estreno" max="2010-02-18">
	</td>
</tr>
<td align="right"><label>Tipo</label></td>
<td>
	<select name="tipo" id="tipo" title="Selecciona un tipo de Peliculas">
	<option value="Actual" title="Actual">Actual</option>
	<option value="Antiguas" title="Antiguas">Antiguas</option>
	<option value="estreno" title="estreno">Estreno</option>
	<option value="clasicos" title="clasicos">Clasicos</option>
	</select>
	</td>
				
	<td>
		<input type="hidden" name="id_persona" value="<?=$data[0]?>">
		<input type="hidden" name="operacion" value="actualizar">
		<input type="submit" name="enviar" value="enviar">
	</td>
</table>
</form>
</body>
</html>