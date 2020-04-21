<?php
include("../clasedb.php");
extract($_REQUEST);

class ControladorPeliculas
{
	public function index(){
		$db=new clasedb();//instanciando clasedb
		$conex=$db->conectar();//conectando con la base de datos
		$sql="SELECT * FROM pelicula";//query
		$res=mysqli_query($conex,$sql);//ejecutando query
		$campos=mysqli_num_fields($res);//cuantos comandos trae la consulta
		$filas=mysqli_num_rows($res);//cuantos registros trae la consulta
		$i=0;
		$datos[]=array();//iniciando arrray
		//extrayendo datos
		while ($data=mysqli_fetch_array($res)) {
			for ($j=0; $j <$campos; $j++) { 
				$datos[$i][$j]=$data[$j];
			}
			$i++;
		}
		mysqli_close($conex);
			//enviando datos
			header("Location: index.php?filas=".$filas."&campos=".$campos."&data=".serialize($datos));
	}//fin de la funcion index
	static function controlador($operacion){
		$pelicula=new ControladorPeliculas();
	switch ($operacion) {
		case 'index':
			$pelicula->index();
			break;
		case 'registrar':
			//$persona->registrar();
			break;
		case 'guardar':
			$pelicula->guardar();
			break;
		case 'modificar':
			$pelicula->modificar();
			break;
		case 'actualizar':
			$pelicula->actualizar();
			break;
		case 'eliminar':
			$pelicula->eliminar();
			break;
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorPeliculas.php?operacion=index";
				</script>
			<?php
			break;
		}//cierre del switch
	}//cierre de la funcion controlador
	public function modificar(){
		extract($_REQUEST);//extrayendo valores url
		$db=new clasedb();
		$conex=$db->conectar();//conectando con la base de datos
		$sql="SELECT * FROM pelicula WHERE id=".$id_pelicula."";
		$res=mysqli_query($conex,$sql);//ejecutando consulta
		$data=mysqli_fetch_array($res);//extrayendo datos en array
		header("Location: ../Peli/editar.php?data=".serialize($data));
	}//cierre de la funcion modificar
	public function actualizar(){
		extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
		$db=new clasedb();
		$conex=$db->conectar();//conectando con la base de datos
		$sql="SELECT * FROM pelicula WHERE nombre=".$nombre." AND id<>".$id_pelicula;
		//echo $sql;
		$res=mysqli_query($conex,$sql);
		$cant=mysqli_num_rows($res);//cuantos registros trae la consulta
			if ($cant>0) {
				?>
					<script type="text/javascript">
						alert("NOMBRE YA REGISTRADA");
						window.location="ControladorPeliculas.php?operacion=index";
					</script>
				<?php
			} else {
				$sql="UPDATE pelicula SET nombre='".$nombre."',director='".$director."', compañia=".$compañia.", estreno=".$estreno.", tipo=".$tipo." WHERE id=".$id_pelicula;
				$res=mysqli_query($conex,$sql);
				if ($res) {
					?>
					<script type="text/javascript">
						alert("REGISTRO MODIFICADO");
						window.location="ControladorPeliculas.php?operacion=index";
					</script>
				<?php
				} else {
					?>
					<script type="text/javascript">
						alert("ERROR AL MODIFICAR EL REGISTRO");
						window.location="ControladorPeliculas.php?operacion=index";
					</script>
				<?php
				}
			}
	}//cierre de la funcion actualizar
	public function eliminar()
	{
		extract($_REQUEST);
		$db=new clasedb;
		$conex=$db->conectar();
		$sql="DELETE FROM pelicula WHERE id=".$id_pelicula;

	$res=mysqli_query($conex, $sql);
	if ($res) {
	?>
	<script type="text/javascript">
			alert("REGISTRO ELIMNADO");
			window.location="ControladorPeliculas.php?operacion=index";
		</script>
		
	<?php

} else {
	?>
		<script type="text/javascript">
			alert("REGISTRO NO ELIMNADO");
			window.location="ControladorPeliculas.php?operacion=index";
		</script>
	<?php
}
	}//FIN DE LA FUNCION ELIMINAR
}//cierre de la clase ControladorPersona

ControladorPeliculas::controlador($operacion);