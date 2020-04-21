<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="recibir_formulario.php" method="post" name="formulario">

	<h1>Registrar Película</h1>
		<table>
			<tr>
			<td align="right">Nombre:</td>
			<td align="left">
			<input type="text" name="nombre" id="nombre" required="required" placeholder="Ingrese el nombre de la pelicula"  size="30">
			</td></tr>
			
			<tr>
		<td align="right">Director:</td>
			<td align="left">
			<input type="text" name="director" id="director" required="required" placeholder="Nombre del director"  size="30">
			</td></tr>
			
<td align="right">Compañia:</td>
			<td align="left">
			<input type="text" name="compañia" id="compañia" required="required" placeholder="Compañia"  size="30">
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
						
					</td>
				</tr>
			
		</table>
	
	<tr><input type="submit" name="enviar" value="enviar"></tr>
	
</br>

</form>
</body>
</html>