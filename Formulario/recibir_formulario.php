<?php
include('clasedb.php');

extract($_REQUEST);

//echo $first_name."-".$$last_first_name."-"$dni;
$db=new clasedb();
$con=$db->conectar();
$sql="INSERT INTO datos_personales VALUE(NULL,'".$first_name."','".$last_first_name."',".$dni.")";
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