<?php
include('clasedb.php');

extract($_REQUEST);

//echo $nombres."-".$apellidos."-"$cedula;
$db=new clasedb();
$con=$db->conectar();
$sql="INSERT INTO pelicula VALUE(NULL,'".$nombre."','".$director."','".$compañia."','".$estreno."','".$tipo."')";
//echo $sql;
$resultado=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if ($resultado) {
	?>
	<b>Registro ingresado ---> <a href="index.php">Volver</a></b>
	<?php
}else{
	?>
	<b>Registro no ingresado ---> <a href="index.php">Volver</a></b>
	<?php
}
?>
</body>
</html>