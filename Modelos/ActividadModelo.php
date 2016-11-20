<?php
class Actividad{

private $nombreAct;
private $duracion;
private $hora;
private $lugar;
private $plazas;
private $dificultad;
private $id_actividad;
private $descripcion;

function contructor(){

 $nombreAct=null;
 $duracion=null;
 $hora=null;
 $lugar=null;
 $plazas=null;
 $dificultad=null;
 $id_actividad=null;
 $descripcion=null;
}
function conexionBD()
		{
                include_once("../datos_BD.php");
				$mysqli=mysqli_connect($servername, $username, $password,'Gimnasio_BD');
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

	function creararrayActividades()
	{
				 $nombreAct=null;
				 $duracion=null;
				 $hora=null;
				 $lugar=null;
				 $plazas=null;
				 $dificultad=null;
				 $id_actividad=null;
				 $descripcion=null;
		$this->conexionBD();
		$file = fopen("../Archivos/ArrayConsultarActividad.php", "w");

		fwrite($file,"<?php class consultActividad { function array_consultarActividad(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();


		$query="SELECT * FROM `actividad`";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

			while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{
				 $id_actividad=$fila['id_Actividad'];
				 $nombre=$fila['Nombre'];
				 $duracion=$fila['Duracion'];
				 $hora=$fila['Hora'];
				 $lugar=$fila['Lugar'];
				 $plazas=$fila['Plazas'];
				 $dificultad=$fila['Dificultad'];
				 $descripcion=$fila['Descripcion'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"duracion\"=>'$duracion',
					\"hora\"=>'$hora',\"lugar\"=>'$lugar',
					\"plazas\"=>'$plazas',\"dificultad\"=>'$dificultad',
					\"id_actividad\"=>'$id_actividad',\"descripcion\"=>'$descripcion')," . PHP_EOL);

		 }
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

	}



function altaActividad($nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion)
{
	$mysqli=$this->conexionBD();

	if($mysqli->query("INSERT INTO `actividad`(`Nombre`, `Duracion`, `Hora`, `Lugar`, `Plazas`, `Dificultad`, `Descripcion`)
		VALUES
		('$nombreAct','$duracion','$hora','$lugar','$plazas','$dificultad','$descripcion')")==TRUE)
	{
	?>
		<script>
		alert("Insercción Realizada con Exito");
		</script>
		<?php
		}else {
		?>
		<script>
		alert("Vuelva a Introducir los datos");
		</script>
	<?php }
		$mysqli->close();

}

 function eliminarActividad($id_actividad){

 	$mysqli=$this->conexionBD();

 	$query="DELETE FROM `actividad` WHERE id_Actividad='$id_actividad'";
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
 function modificarActividad($id,$nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion){

 	$mysqli=$this->conexionBD();
    $query= "UPDATE `actividad` SET `Nombre`='$nombreAct',`Duracion`='$duracion',`Hora`='$hora',`Lugar`='$lugar',`Plazas`='$plazas',`Dificultad`='$dificultad',`Descripcion`='$descripcion' WHERE `id_Actividad`='$id'";

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
