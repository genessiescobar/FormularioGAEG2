<?php
extract($_REQUEST);
$data=unserialize($data);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editando Personas</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<br>
	<form action="ControladorPersona.php" method="post" name="formulario">
		<table>
			<tr>
				<td colspan="2">Editar Personas:</td>
			</tr>
			<tr>
				<td>Nombres:</td>
				<td><input type="text" name="first_name" id="first_name" placeholder="Ej: Martin José" title="Ingrese sus nombres" value="<?=$data[1]?>"></td>
			</tr>
			<tr>
				<td>Apellidos:</td>
				<td><input type="text" name="last_first_name" id="last_first_name" placeholder="Ej: Perez Salcedo" title="Ingrese sus apellidos" value="<?=$data[2]?>"></td>
			</tr>
			<tr>
				<td>Cédula:</td>
				<td><input type="number" name="dni" id="dni" placeholder="Ej: Martin José" title="Ingrese sus cédula" value="<?=$data[3]?>"></td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="id_persona" value="<?=$data[0]?>">
					<input type="hidden" name="operacion" value="actualizar">
					<input type="submit" name="enviar" value="Enviar">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>