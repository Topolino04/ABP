<?php
//include("../Controlador/ControladorReservas.php");
class Reserva{			

private $deportistaId;
private $actividadId;
private $fecha;
private $asistencia;

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

//Carga el array inicial con con los atributos de la reserva (DNI de deportista, id, actividad,fecha de cuando se crea la sesion y asistencia)
function creararrayReservas()
{
	$deportistaId=null;
	$actividadId=null;
	$fecha=null;
	$asistencia=null;
	
	$file = fopen("../Archivos/ArrayConsultarReservas.php", "w");

	fwrite($file,"<?php class consultReserva { function array_consultarReservas(){". PHP_EOL);
	fwrite($file,"\$form=array(" . PHP_EOL);

	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query("SELECT * FROM `Deportista_reserva_actividad`");
	if(mysqli_num_rows($resultado)){

		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{
			$deportistaId=$fila['Deportista_id_Usuario'];
			$actividadId=$fila['Actividad_id_Actividad'];
			$fecha=$fila['Fecha'];
			$asistencia=$fila['Asistencia'];

			fwrite($file,"array(
				\"deportistaId\"=>'$deportistaId',
				\"actividadId\"=>'$actividadId',
				\"fecha\"=>'$fecha',
				\"asistencia\"=>'$asistencia')," . PHP_EOL);

	 	}
	}
	fwrite($file,");return \$form;}}?>". PHP_EOL);
	fclose($file);
	$resultado->free();
	$mysqli->close();

}

//Añade al array final el id de las tablas y los ejercicios que contiene cada una
function creararrayActividades()
{
	$this->conexionBD();
	$form=array();

	$query="SELECT * FROM Actividad"; //WHERE `id_Actividad` = '$actividadId'";
	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query($query);

	if(mysqli_num_rows($resultado)){
			//$fila =$resultado->fetch_array(MYSQLI_ASSOC);
		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{
			$actividadId=$fila['id_Actividad'];
			$nombre=$fila['Nombre'];
			$plazas=$fila['Plazas'];

			$fila_array=array("actividadId"=>$actividadId,"nombre"=>$nombre,"plazas"=>$plazas);
			array_push($form,$fila_array);
		}
	}			 $resultado->free();
	$mysqli->close();
	return $form;
}

//Añade al array final con el nombre de ususario de los deportistas
function crearArrayNombreDeportista(){

	$this->conexionBD();
	$form=array();

	$query="SELECT * FROM Deportista"; // WHERE `DNI` = '$deportistaId'";
	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query($query);

	if(mysqli_num_rows($resultado)){

		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{
			$usuario=$fila['Usuario'];
			$dni=$fila['DNI'];

			$fila_array=array("usuario"=>$usuario,"dni"=>$dni);
			array_push($form,$fila_array);
		}
	}			$resultado->free();
	$mysqli->close();
	return $form;
	
}

function RellenarArrayFinal($NombreDeportista,$formActividad){
	include("../Archivos/ArrayConsultarReservas.php");
				$arra=new consultReserva();
				$form=$arra->array_consultarReservas();

				//creo el array con las sesiones y las tablas de ejercicios.
				$file = fopen("../Archivos/ArrayConsultarActividadesDeReserva.php", "w");
				fwrite($file,"<?php class consult { function array_consultarActividades(){". PHP_EOL);
				fwrite($file,"\$form=array(" . PHP_EOL);

				for ($numarT=0;$numarT<count($form);$numarT++){

						$deportistaId=$form[$numarT]["deportistaId"];
						$actividadId=$form[$numarT]["actividadId"];
						$fecha=$form[$numarT]["fecha"];
						$asistencia=$form[$numarT]["asistencia"];
						//Variables para mostrar el nombre del deportista y los ejercicios
						//$NombreDeportista=$reserva->crearArrayNombreDeportista();
						//$formActividad->creararrayActividades();
						
						//cargamos el fichero de ejerciciosde la tabla.				
					
						fwrite($file,"array(\"deportistaId\"=>'$deportistaId',\"actividadId\"=>'$actividadId',\"fecha\"=>'$fecha',\"asistencia\"=>'$asistencia'," . PHP_EOL);

						//Nombre de ususario
						
						$usuario=$NombreDeportista[0]["usuario"];
						fwrite($file,"\"usuario"."\"=>'$usuario'," . PHP_EOL);

						//Lista de ejercicios con su nombre
						if($formActividad!=null){ 

							for ($numar =0;$numar<count($formActividad);$numar++){	
								
								$actividadId=$formActividad[$numar]["actividadId"];
								$nombre=$formActividad[$numar]["nombre"];
								$plazas=$formActividad[$numar]["plazas"];

								fwrite($file,"
									\"actividadId".$numar."\"=>'$actividadId',
									\"nombre".$numar."\"=>'$nombre',
									\"plazas".$numar."\"=>'$plazas'," . PHP_EOL);	
								}							
							
						}
						fwrite($file,")," . PHP_EOL);


		 		}
		 		fwrite($file,");return \$form;}}?>". PHP_EOL);
				fclose($file);
				 //fichero creado

				 				
}

function altaReserva($deportistaId,$actividadId,$fecha,$asistencia)
{
	$mysqli=$this->conexionBD();

	if($mysqli->query("INSERT INTO `Deportista_reserva_actividad`(`Deportista_id_Usuario`, `Actividad_id_Actividad`, `Fecha`, `Asistencia`)
		VALUES
		('$deportistaId','$actividadId','$fecha','$asistencia')")==TRUE)
	{
	
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
