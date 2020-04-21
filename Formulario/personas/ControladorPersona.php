<?php
include("../clasedb.php");
extract($_REQUEST);

class ControladorPersona
{
	public function index(){
		$db=new clasedb();//instanciando clasedb
		$conex=$db->conectar();//conectando con la base de datos
		$sql="SELECT * FROM datos_personales";//query
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
		$persona=new ControladorPersona();
	switch ($operacion) {
		case 'index':
			$persona->index();
			break;
		case 'registrar':
			//$persona->registrar();
			break;
		case 'guardar':
			$persona->guardar();
			break;
		case 'modificar':
			$persona->modificar();
			break;
		case 'actualizar':
			$persona->actualizar();
			break;
		case 'eliminar':
			$persona->eliminar();
			break;
		default:
			?>
				<script type="text/javascript">
					alert("No existe la ruta");
					window.location="ControladorPersona.php?operacion=index";
				</script>
			<?php
			break;
		}//cierre del switch
	}//cierre de la funcion controlador
	public function modificar(){
		extract($_REQUEST);//extrayendo valores url
		$db=new clasedb();
		$conex=$db->conectar();//conectando con la base de datos
		$sql="SELECT * FROM datos_personales WHERE id=".$id_persona."";
		$res=mysqli_query($conex,$sql);//ejecutando consulta
		$data=mysqli_fetch_array($res);//extrayendo datos en array
		header("Location: ../personas/editar.php?data=".serialize($data));
	}//cierre de la funcion modificar
	public function actualizar(){
		extract($_POST);//EXTRAYENDO VARIABLES DEL FORMULARIO
		$db=new clasedb();
		$conex=$db->conectar();//conectando con la base de datos
		$sql="SELECT * FROM datos_personales WHERE dni=".$dni." AND id<>".$id_persona;
		//echo $sql;
		$res=mysqli_query($conex,$sql);
		$cant=mysqli_num_rows($res);//cuantos registros trae la consulta
			if ($cant>0) {
				?>
					<script type="text/javascript">
						alert("CEDULA YA REGISTRADA");
						window.location="ControladorPersona.php?operacion=index";
					</script>
				<?php
			} else {
				$sql="UPDATE datos_personales SET first_name='".$first_name."',last_first_name='".$last_first_name."', dni=".$dni." WHERE id=".$id_persona;
				$res=mysqli_query($conex,$sql);
				if ($res) {
					?>
					<script type="text/javascript">
						alert("REGISTRO MODIFICADO");
						window.location="ControladorPersona.php?operacion=index";
					</script>
				<?php
				} else {
					?>
					<script type="text/javascript">
						alert("ERROR AL MODIFICAR EL REGISTRO");
						window.location="ControladorPersona.php?operacion=index";
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
		$sql="DELETE FROM datos_personales WHERE id=".$id_persona;

	$res=mysqli_query($conex, $sql);
	if ($res) {
	?>
	<script type="text/javascript">
			alert("REGISTRO ELIMNADO");
			window.location="ControladorPersona.php?operacion=index";
		</script>
		
	<?php

} else {
	?>
		<script type="text/javascript">
			alert("REGISTRO NO ELIMNADO");
			window.location="ControladorPersona.php?operacion=index";
		</script>
	<?php
}
	}//FIN DE LA FUNCION ELIMINAR
}//cierre de la clase ControladorPersona

ControladorPersona::controlador($operacion);