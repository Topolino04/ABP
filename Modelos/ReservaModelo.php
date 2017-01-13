<?php
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
	 	
	 	fwrite($file,");return \$form;}}?>". PHP_EOL);
	 	fclose($file);
	 	$resultado->free();
		$mysqli->close();
	}else{
	fwrite($file,")" . PHP_EOL);
	fwrite($file,";return \$form;}}?>". PHP_EOL);	
	fclose($file);
	}
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
	}			 
	$resultado->free();
	$mysqli->close();
	return $form;
}
function getReservasActuales()
{
	$deportistaId=null;
	$actividadId=null;
	$fecha=null;
	$asistencia=null;
	
	$file = fopen("../Archivos/ArrayConsultarReservasActuales.php", "w");

	fwrite($file,"<?php class consultReservaActuales { function array_consultarReservasActuales(){". PHP_EOL);
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
	 	
	 	fwrite($file,");return \$form;}}?>". PHP_EOL);
	 	fclose($file);
	 	$resultado->free();
		$mysqli->close();
	}else{
	fwrite($file,")" . PHP_EOL);
	fwrite($file,";return \$form;}}?>". PHP_EOL);	
	fclose($file);
	}
}

//Añade al array final con el nombre de ususario de los deportistas
function crearArrayNombreDeportista(){

	$this->conexionBD();
	$form=array();

	$query="SELECT * FROM Deportista";// WHERE `DNI` = '$deportistaId'";
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
	}			
	$resultado->free();
	$mysqli->close();
	return $form;
	
}

function RellenarArrayFinal($NombreDeportista,$formActividad,$DatosEntrenadores,$ObtenerEntrenadorActividad)
{
	include("../Archivos/ArrayConsultarReservas.php");
	$arra=new consultReserva();
	$form=$arra->array_consultarReservas();

	//creo el array con las sesiones y las tablas de ejercicios.
	$file = fopen("../Archivos/ArrayConsultarActividadesDeReserva.php", "w");
	fwrite($file,"<?php class consult { function array_consultarActividades(){". PHP_EOL);
	fwrite($file,"\$form=array(" . PHP_EOL);
	
	//Tala Deportista_reserva_actividad
	for ($numarT=0;$numarT<count($form);$numarT++){
		$deportistaId=$form[$numarT]["deportistaId"];
		$actividadId=$form[$numarT]["actividadId"];
		$fecha=$form[$numarT]["fecha"];		
		$AñoMesDiaHoraMinutos = explode(" ", $fecha);
		$AñoMesDia=$AñoMesDiaHoraMinutos[0];
		$HoraMinutos=$AñoMesDiaHoraMinutos[1];
		$asistencia=$form[$numarT]["asistencia"];
		
		//cargamos el fichero de ejerciciosde la tabla.				
		fwrite($file,"array(\"deportistaId\"=>'$deportistaId',\"actividadId\"=>'$actividadId',\"fecha\"=>'$fecha',\"AñoMesDia\"=>'$AñoMesDia',\"HoraMinutos\"=>'$HoraMinutos',\"asistencia\"=>'$asistencia'," . PHP_EOL);
		//Datos Gestion Actividad
		//Obtengo el dni del entrenador de esa actividad
		for ($numarO=0;$numarO<count($ObtenerEntrenadorActividad);$numarO++){
			if($actividadId==$ObtenerEntrenadorActividad[$numarO]["actividadId"]){
			
			$entrenadorId=$ObtenerEntrenadorActividad[$numarO]["entrenadorId"];
			//$actividadId=$DatosActividad[$numarC]["actividadId"];
			//$alumnoId=$DatosActividad[$numarO]["alumnoId"];
			//$fecha=$DatosActividad[$numarC]["fecha"];
			fwrite($file,"
					\"entrenadorId\"=>'$entrenadorId'," . PHP_EOL);
			}
		}
		//Tabla Entrenador
		//Obtengo el nombre del entrenador
		if(isset($DatosEntrenadores)){
		for ($numarE=0;$numarE<count($DatosEntrenadores);$numarE++){
				if($entrenadorId==$DatosEntrenadores[$numarE]["dni"]){
				$usuario=$DatosEntrenadores[$numarE]["Nombre"];
				fwrite($file,"
					\"NombreEntrenador"."\"=>'$usuario'," . PHP_EOL);
				}
			}
		}
		//Tabla Deportista
		//Nombre de ususario
		if(isset($NombreDeportista)){
			for ($numarC=0;$numarC<count($NombreDeportista);$numarC++){
				if($deportistaId==$NombreDeportista[$numarC]["dni"]){
				$usuario=$NombreDeportista[$numarC]["usuario"];
				fwrite($file,"
					\"usuario"."\"=>'$usuario'," . PHP_EOL);
				}
			}
		}
		//Tabla actividad
		//Lista de ejercicios con su nombre
		if(isset($formActividad)){ 
			for ($numar =0;$numar<count($formActividad);$numar++){	
				if($actividadId==$formActividad[$numar]["actividadId"]){
					$actividadId=$formActividad[$numar]["actividadId"];
					$nombre=$formActividad[$numar]["nombre"];
					$plazas=$formActividad[$numar]["plazas"];

					fwrite($file,"
						\"actividadId\"=>'$actividadId',
						\"nombre\"=>'$nombre',
						\"plazas\"=>'$plazas'," . PHP_EOL);	
				}
		 	}							
		}
			fwrite($file,")," . PHP_EOL);
	}
	fwrite($file,");return \$form;}}?>". PHP_EOL);
	fclose($file);				 				
}
//Lista los nombres de los deportistas al crear una nueva Reserva
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

//Lista los nombres de los entrenadores
function getEntrenadores(){

	$this->conexionBD();
	$mysqli=$this->conexionBD();

	$form=array();
	$query="SELECT * FROM Entrenador";		
	$resultado=$mysqli->query($query);
	while($fila = $resultado->fetch_array())
	{
		$filas[] = $fila;
	}
	foreach($filas as $fila)
	{
		$dni=$fila['DNI'];
		$Nombre=$fila['Nombre'];
		$Apellidos=$fila['Apellidos'];

		$fila_array=array("dni"=>$dni,"Nombre"=>$Nombre,"Apellidos"=>$Apellidos);
		array_push($form,$fila_array);
	}
	$resultado->free();
	$mysqli->close();
	return $form;
}

//Lista los nombres de las actividades al crear una nueva Reserva
function getActividades(){

	$this->conexionBD();
	$mysqli=$this->conexionBD();

	$form=array();
	$query="SELECT * FROM Actividad";		
	$resultado=$mysqli->query($query);
	while($fila = $resultado->fetch_array())
	{
		$filas[] = $fila;
	}
	foreach($filas as $fila)
	{
		$id=$fila['id_Actividad'];
		$nombre=$fila['Nombre'];

		$fila_array=array("id_Actividad"=>$id,"Nombre"=>$nombre);
		array_push($form,$fila_array);
	}
	$resultado->free();
	$mysqli->close();
	return $form;
}
//Convierte en array la tabla Gestion_actividad
//Crea un array con los datos de gestion de las actividades
function crearArrayGestionActividad()
{
	$this->conexionBD();
	$form=array();

	$query="SELECT * FROM Gestion_actividad"; //WHERE `id_Actividad` = '$actividadId'";
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
			$entrenadorId=$fila['Entrenador_id_Usuario'];
			$actividadId=$fila['Actividad_id_Actividad'];
			$alumnoId=$fila['identificador_deportista'];
			$fecha=$fila['fecha'];

			$fila_array=array("entrenadorId"=>$entrenadorId,"actividadId"=>$actividadId,"alumnoId"=>$alumnoId,"fecha"=>$fecha);
			array_push($form,$fila_array);
		}
	}			 
	$resultado->free();
	$mysqli->close();
	return $form;
}

//Crea la reserva
function altaReserva($deportistaId,$actividadId,$fecha)
{
	$mysqli=$this->conexionBD();
	
		$date = getdate();
		$hora=$date["hours"];
		$minutos=$date["minutes"];
		$segundos=$date["seconds"];
		$fechatotal = $fecha." ".$hora.":".$minutos.":".$segundos."";
		
		if($mysqli->query("INSERT INTO `Deportista_reserva_actividad`(`Deportista_id_Usuario`,`Actividad_id_Actividad`,`Fecha`,`Asistencia`)
			VALUES
			('$deportistaId','$actividadId','$fechatotal','1')")==TRUE)
		{
			
			?>
			<script>
				alert("Reserva Realizada con Exito");
			</script>
			<?php
		}else{
			
			?>
			<script>
				alert("Error al insertar");
			</script>
			<?php 
		}
		$mysqli->close();
	
}
//Añade la reserva a una actividad existente
function altaAlumno($deportistaId,$actividadId,$entrenadorId,$fecha)
{
	$mysqli=$this->conexionBD();
	$date = getdate();
	$hora=$date["hours"];
	$minutos=$date["minutes"];
	$segundos=$date["seconds"];
	$fechatotal = $fecha." ".$hora.":".$minutos.":".$segundos."";

	if($mysqli->query("INSERT INTO `Gestion_actividad`(`Entrenador_id_Usuario`, `Actividad_id_Actividad`, `identificador_deportista`,`fecha`)
		VALUES
		('$entrenadorId','$actividadId','$deportistaId','$fechatotal')")==TRUE)
	{
		?>
		<script>
			alert("Deportista agregado a actividad");
		</script>
		<?php
	}else{
		?>
		<script>
			alert("Problema al agregar alumno a actividad");
		</script>
		<?php 
	}
	$mysqli->close();
}

function eliminarReserva($deportistaId,$actividadId,$fecha){

 	$mysqli=$this->conexionBD();
 	//$datetime = $_POST['date'] . ' ' . $_POST['time'];
	//$datetime = mysql_real_escape_string($fecha);
	//$datetime = strtotime($fecha);
	//$datetime = date('Y-m-d H:i:s',$fecha);

 	$query="DELETE FROM `Deportista_reserva_actividad` WHERE Deportista_id_Usuario='$deportistaId' && Actividad_id_Actividad='$actividadId' && Fecha='$fecha'";
 	if($mysqli->query($query)==TRUE){
	?>
		<script>
		alert("<?php echo $fecha; ?>");
		</script>
		<?php
 	}else {
		?>
		<script>
		alert("Problema al Borrar. Ya existe un usuario con ese nombre en esa actividad ");
		</script>
	<?php }
	$mysqli->close();
}

function eliminarAlumnodeActividad($deportistaId,$actividadId){

 	$mysqli=$this->conexionBD();

 	$query="DELETE FROM `Gestion_actividad` WHERE Actividad_id_Actividad='$actividadId' && identificador_deportista='$deportistaId'";
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
