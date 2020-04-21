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
					window.location="ControladorPeliculas.php?operacion=eliminar&id_pelicula="+id;
			}
		}

	</script>

</head>
<body>
<center><a id="boton" href="../index.php">Inicio</a><br>
<table align="center">
<tr><th>Nro</th>
	<th>Nombre</th>
	<th>Director</th>
	<th>Compañia</th>
	<th>Estreno</th>
	<th>Tipo</th>
</tr>

<?php $num=1;
	for($i=0; $i < $filas; $i++){
		echo "<tr>";
	?>

	<td><?=$num?></td>
	<?php for ($j=1; $j < $campos; $j++) { ?>
	<td><?=$data[$i][$j]?></td>


	<?php 

}  ?>
 	
 	<td><a href="../Peli/ControladorPeliculas.php?operacion=modificar&id=<?=$data[$i][0]?>">Modificar</a>
 	
 	</td>
 	<?php 
 	echo "<th><a href='javascript:eliminar(".$data[$i][0].")'>Eliminar</th></a>";
 		$num++;

	} 
	?>

<a href="../Peli/ControladorPelicula.php?"></a>

</table>

<br>


</body>
</html>