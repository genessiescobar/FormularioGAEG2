<?php
extract($_REQUEST);
$data=unserialize($data);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css">

	<title>Mostrar</title>

	<script type="text/javascript">
		function eliminar(id) {
			if (confirm("Seguro que desea eliminar el registro?")) {
					window.location="ControladorPersona.php?operacion=eliminar&id_persona="+id;
			}
		}

	</script>
</head>
<body>
<table align="center">
	<a href="../index.php">Inicio</a>
	<tr><th>Nro</th><th>Nombre</th><th>Apellido</th><th>Cedula</th><th>Opciones</th></tr>
	<?php $num=1;
		for ($i=0; $i < $filas; $i++) { 
			echo "<tr>";
	?>
	<td><?=$num?></td>
		<?php for ($j=1; $j < $campos; $j++) { ?>
			<td><?=$data[$i][$j]?></td>
		<?php } ?>
<td>
	<a href="ControladorPersona.php?operacion=modificar&id_persona=<?=$data[$i][0]?>">Modificar</a>
	<a href="javascript:eliminar(<?=$data[$i][0]?>)">Eliminar</a>
</td>
<?php
		$num++;
		}	?>
</table>
</body>
</html>