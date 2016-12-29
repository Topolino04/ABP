<?php
class Sesion{


	private $deportista;
	private $fecha;
	private $comentario;
	private $tabla;

	function conexionBD()
	{
		include "../DataBase/datos_BD.php";
		$mysqli=mysqli_connect($host,$user,$pass,$name);
		if(!$mysqli){

			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
			echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}

		return $mysqli;
	}


/*	function devolveridactividad($id_actividad)
	{

	$query="SELECT id_Actividad FROM actividad WHERE id_Actividad=$id_actividad";
	$resultado=mysql_query($query)or die (mysql_error());
	return $resultado;
}*/

function creararraySesiones()
{
	
	$deportista=null;
	$fecha=null;
	$comentario=null;
	$tabla=null;



	$file = fopen("../Archivos/ArrayConsultarSesiones.php", "w");

	fwrite($file,"<?php class consultSesion { function array_consultarSesiones(){". PHP_EOL);
	fwrite($file,"\$form=array(" . PHP_EOL);


	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query("SELECT * FROM `Sesion`");
	if(mysqli_num_rows($resultado)){

		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{				 
			$deportista=$fila['Deportista_id_Usuario'];
			$fecha=$fila['Fecha'];
			$comentario=$fila['Comentario'];
			$tabla=$fila['Tabla_id'];

			fwrite($file,"array(\"deportista\"=>'$deportista',
				\"fecha\"=>'$fecha',
				\"comentario\"=>'$comentario',
				\"tabla\"=>'$tabla')," . PHP_EOL);

		}
	}
	fwrite($file,");return \$form;}}?>". PHP_EOL);
	fclose($file);
	$resultado->free();
	$mysqli->close();

}

function gettablas(){

	$this->conexionBD();

	$form=array();

	$query="SELECT * FROM Tabla";
	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query($query);

	if(mysqli_num_rows($resultado)){

		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{
			$idtabla=$fila['id_Tabla'];
			$nombre=$fila['Nombre'];

			$fila_array=array("idtabla"=>$idtabla,"nombre"=>$nombre);
			array_push($form,$fila_array);
		}
	}			$resultado->free();
	$mysqli->close();
	return $form;


}
/*
function creararraySesionesDeportista($deportista)
{
	
	$deportista=null;
	$fecha=null;
	$comentario=null;
	$tabla=null;

	$this->conexionBD();

	$file = fopen("../Archivos/ArrayConsultarSesiones.php", "w");

	fwrite($file,"<?php class consultSesion { function array_consultarSesiones(){". PHP_EOL);
	fwrite($file,"\$form=array(" . PHP_EOL);
	$mysqli=$this->conexionBD();


	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query("SELECT * FROM `Sesion` where $='deportista'");
	if(mysqli_num_rows($resultado)){

		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{				 
			$deportista=$fila['Deportista_id_Usuario'];
			$fecha=$fila['Fecha'];
			$comentario=$fila['Comentario'];
			$tabla=$fila['Tabla_id'];

			fwrite($file,"array(\"deportista\"=>'$deportista',
				\"fecha\"=>'$fecha',
				\"comentario\"=>'$comentario',
				\"tabla\"=>'$tabla')," . PHP_EOL);

		}
	}
	fwrite($file,");return \$form;}}?>". PHP_EOL);
	fclose($file);
	$resultado->free();
	$mysqli->close();

}*/


function creararrayTabla($tabla)
{


	$this->conexionBD();
	$mysqli=$this->conexionBD();

	$form=array();

	$query="SELECT * FROM `Tabla_contiene_ejercicios` WHERE `Tabla_id_Tabla` = '$tabla'";
	$resultado=$mysqli->query($query);
	if(mysqli_num_rows($resultado)){
			//$fila =$resultado->fetch_array(MYSQLI_ASSOC);
		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{
			$IdTabla=$fila['Tabla_id_Tabla'];
			$IdEjercicio=$fila['Ejercicio_id_Ejercicio'];

			$fila_array=array("IdTabla"=>$IdTabla,"IdEjercicio"=>$IdEjercicio);
			array_push($form,$fila_array);
		}
	}			 $resultado->free();
	$mysqli->close();
	return $form;

}

function crearArrayDeportista($deportista){

	$this->conexionBD();
	$form=array();

	$query="SELECT * FROM Deportista WHERE `DNI` = '$deportista'";
	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query($query);

	if(mysqli_num_rows($resultado)){

		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{
			$Usuario=$fila['Usuario'];
			$dni=$fila['DNI'];

			$fila_array=array("usuario"=>$Usuario,"dni"=>$dni);
			array_push($form,$fila_array);
		}
	}			$resultado->free();
	$mysqli->close();
	return $form;
}

/*
function creararrayMonitor()
{

	$file = fopen("../Archivos/ArrayConsultarMonitor.php", "w");
	fwrite($file,"<?php class consult { function array_consultar1(){". PHP_EOL);
	fwrite($file,"\$form=array(" . PHP_EOL);
	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query("SELECT * FROM `Entrenador`");
	if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
			{ 	 $nombre=$fila['Nombre'];

		fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);
	}
}
fwrite($file,");return \$form;}}?>". PHP_EOL);
fclose($file);
$resultado->free();
$mysqli->close();
}
*/

//Indica el nombre del deportista en cada Sesion
function getDeportistas(){

	$this->conexionBD();
	$mysqli=$this->conexionBD();

	$form=array();
	$query="SELECT * FROM Deportista";		
	$resultado=$mysqli->query($query);
	while($fila = $resultado->fetch_array())
	{
		$filas[] = $fila;
	}
	foreach($filas as $fila)
	{
		$dni=$fila['DNI'];
		$usuario=$fila['Usuario'];

		$fila_array=array("DNI"=>$dni,"Usuario"=>$usuario);
		array_push($form,$fila_array);
	}
	$resultado->free();
	$mysqli->close();
	return $form;
}


function altaSesion($deportista,$comentario,$tabla)
{
	$mysqli=$this->conexionBD();	
	
	if($mysqli->query("INSERT INTO `Sesion`(`Deportista_id_Usuario`, `Fecha`, `Comentario`, `Tabla_id`)
		VALUES
		('$deportista',now(),'$comentario','$tabla')")==TRUE)
	{
		?>
		<script>
			alert("Insercción Realizada con Exito");
		</script>
		<?php
	}else {
		?>
		<script>
			alert("Error al insertar");

		</script>
		<?php }
		$mysqli->close();

	}

	function eliminarSesion($deportista,$tabla){
		$mysqli=$this->conexionBD();
		$query="DELETE FROM `Sesion` WHERE Deportista_id_Usuario='$deportista' && Tabla_id = '$tabla'";
		if($mysqli->query($query)==TRUE){
			?>
			<script>

				alert("Eliminado con Exito");
			</script>
			<?php
		}else {
			?>
			<script>
				alert("Problema al Borrar");
			</script>
			<?php }
			$mysqli->close();
		}


		function modificarSesion($deportista,$fecha,$comentario,$tabla){
			$mysqli=$this->conexionBD();
			$query= "UPDATE `Sesion` SET `Deportista_id_Usuario`='$deportista',`Fecha`='$fecha',`Comentario`='$comentario',`Tabla`='$tabla'  WHERE `Deportista_id_Usuario`='$deportista'";
			if($mysqli->query($query)==TRUE){
				?>
				<script>
					alert("Modificado con Exito");
				</script>
				<?php
			}else {
				?>
				<script>
					alert("Problema al Modificar");
				</script>
				<?php }
				$mysqli->close();
			}
		}
		?>
		?>
