<?php
class Reserva{
				

private $deportistaId;
private $actividadId;
private $fecha;
private $asistencia;

function contructor(){

	$deportistaId=null;
	$actividadId=null;
	$fecha=null;
	$asistencia=null;
}

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


	function creararrayReservas()
	{
		$deportistaId=null;
		$actividadId=null;
		$fecha=null;
		$asistencia=null;

		$this->conexionBD();
		$file = fopen("../Archivos/ArrayConsultarReserva.php", "w");

		fwrite($file,"<?php class consultreserva { function array_consultarReserva(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();


		$query="SELECT * FROM `Deportista_reserva_actividad`";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

			while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{
				$deportistaId=$_POST['Deportista_id_Usuario'];
				$actividadId=$_POST['Actividad_id_Actividad'];
				$fecha=$_POST['Fecha'];
				$asistencia=$_POST['Asistencia'];
				fwrite($file,"array(\"deportistaId\"=>'$deportistaId',\"actividadId\"=>'$actividadId',
					\"fecha\"=>'$fecha',\"asistencia\"=>'$asistencia')," . PHP_EOL);

		 	}
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();

	}



function altaReserva($deportistaId,$actividadId,$fecha,$asistencia)
{
	$mysqli=$this->conexionBD();

	if($mysqli->query("INSERT INTO `Deportista_reserva_actividad`(`Deportista_id_Usuario`, `Actividad_id_Actividad`, `Fecha`, `Asistencia`)
		VALUES
		('$deportistaId','$actividadId','$fecha','$asistencia')")==TRUE)
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
 function eliminarReserva($deportistaId){

 	$mysqli=$this->conexionBD();

 	$query="DELETE FROM `Deportista_reserva_actividad` WHERE Deportista_id_Usuario='$deportistaId'";
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

 function modificarReserva($deportistaId,$actividadId,$fecha,$asistencia){

 	$mysqli=$this->conexionBD();
    $query= "UPDATE `Deportista_reserva_actividad` SET `Deportista_id_Usuario`='$deportistaId',`Actividad_id_Actividad`='$actividadId',`Fecha`='$fecha',`Asistencia`='$asistencia'WHERE `Deportista_id_Usuario`='$deportistaId'";

	if($mysqli->query($query)==TRUE){
		?>
		<script>
		alert("Modificado con Exito");
		</script>
		<?php
	}else{
		?>
		<script>
		alert("Problema al Modificar");
		</script>
	<?php }
	$mysqli->close();
}
}

?>
