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

function creararrayActividades()
{
	$idActividad=null;
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


	$query="SELECT * FROM `Actividad`";
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
			
			fwrite($file,"array(
				\"id_actividad\"=>'$id_actividad',
				\"nombre\"=>'$nombre',
				\"duracion\"=>'$duracion',
				\"hora\"=>'$hora',
				\"lugar\"=>'$lugar',
				\"plazas\"=>'$plazas',
				\"dificultad\"=>'$dificultad',				
				\"descripcion\"=>'$descripcion'				
				)," . PHP_EOL);

	 	}
	}
			 fwrite($file,");return \$form;}}?>". PHP_EOL);
			 fclose($file);
			 $resultado->free();
			 $mysqli->close();

}

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

			$fila_array=array("Entrenador_id_Usuario"=>$entrenadorId,"Actividad_id_Actividad"=>$actividadId,"identificador_deportista"=>$alumnoId,"fecha"=>$fecha);
			array_push($form,$fila_array);
		}
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

		$fila_array=array("DNI"=>$dni,"Nombre"=>$Nombre,"Apellidos"=>$Apellidos);
		array_push($form,$fila_array);
	}
	$resultado->free();
	$mysqli->close();
	return $form;
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


//Crea el array final con los datos de las actividades
function RellenarArrayFinal($DatosActividad,$NombreEntrenador,$NombreDeportista)
{
	include("../Archivos/ArrayConsultarActividad.php");
	$arra=new consultActividad();
	$form=$arra->array_consultarActividad();

	//Array con lo datos de Gestion actividad
	$file = fopen("../Archivos/ArrayConsultarGestionActividad.php", "w");
	fwrite($file,"<?php class consult { function array_consultarGestionActividades(){". PHP_EOL);
	fwrite($file,"\$form=array(" . PHP_EOL);
	
	for ($numarT=0;$numarT<count($form);$numarT++){
		
		$id_actividad=$form[$numarT]["id_actividad"];
		$nombre=$form[$numarT]["nombre"];
	    $duracion=$form[$numarT]["duracion"];
		$hora=$form[$numarT]["hora"];
		$lugar=$form[$numarT]["lugar"];
		$plazas=$form[$numarT]["plazas"];
		$dificultad=$form[$numarT]["dificultad"];
	    $descripcion=$form[$numarT]["descripcion"];
		
		fwrite($file,"array(
			\"id_actividad\"=>'$id_actividad',
			\"nombre\"=>'$nombre',
			\"duracion\"=>'$duracion',
			\"hora\"=>'$hora',
			\"lugar\"=>'$lugar',
			\"plazas\"=>'$plazas',
			\"dificultad\"=>'$dificultad',
			\"descripcion\"=>'$descripcion',". PHP_EOL);
		
		//Datos tabla Gestion Actividad
		if (isset($DatosActividad)){
			for ($numarC=0;$numarC<count($DatosActividad);$numarC++){
				//Si la id de la actividad existe en Gestion Actividades
				if($id_actividad==$DatosActividad[$numarC]["Actividad_id_Actividad"]){ 
				
				$entrenadorId=$DatosActividad[$numarC]["Entrenador_id_Usuario"];
				$actividadId=$DatosActividad[$numarC]["Actividad_id_Actividad"];
				$alumnoId=$DatosActividad[$numarC]["identificador_deportista"];
				$fecha=$DatosActividad[$numarC]["fecha"];
				fwrite($file,"
						\"Entrenador_id_Usuario\"=>'$entrenadorId',
						\"Actividad_id_Actividad".$numarC."\"=>'$actividadId',
						\"identificador_deportista".$numarC."\"=>'$alumnoId',
						\"fecha".$numarC."\"=>'$fecha'," . PHP_EOL);
				}
			
				//Añade el nombre de usuario del deportista
				if (isset($NombreDeportista)){
					//Datos tabla Entrenador Actividad
					for ($numarN=0;$numarN<count($NombreDeportista);$numarN++){
						if($alumnoId==$NombreDeportista[$numarN]["dni"]){
						
						$UsuarioDeportista=$NombreDeportista[$numarN]["usuario"];				
						fwrite($file,"
								\"UsuarioDeportista".$numarC."\"=>'$UsuarioDeportista'," . PHP_EOL);				
						}
					}
				}
			}
		}
		
		//Añade el nombre y apellisdos del entrenador
		if (isset($NombreEntrenador)){
			//Datos tabla Entrenador Actividad
			for ($numar=0;$numar<count($NombreEntrenador);$numar++){
				if($entrenadorId==$NombreEntrenador[$numar]["DNI"]){
				
				$NombreEntrenadorActividad=$NombreEntrenador[$numar]["Nombre"];
				$ApellidoEntrenadorActividad=$NombreEntrenador[$numar]["Apellidos"];
				fwrite($file,"
						\"NombreEntrenadorActividad\"=>'$NombreEntrenadorActividad',
						\"ApellidoEntrenadorActividad\"=>'$ApellidoEntrenadorActividad',
						" . PHP_EOL);

				//fwrite($file,"\"entrenadorId"."\"=>'$entrenadorId'," . PHP_EOL);
				}
			}
		}

		fwrite($file,")," . PHP_EOL);
		}
		fwrite($file,");return \$form;}}?>". PHP_EOL);
		fclose($file);				 				
}


//Alta de actividad
function CrearActividad($nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion)
{
	$mysqli=$this->conexionBD();
	
	
	if($mysqli->query("INSERT INTO `Actividad`(`Nombre`, `Duracion`, `Hora`, `Lugar`, `Plazas`, `Dificultad`, `Descripcion`)
		VALUES
		('$nombreAct','$duracion','$hora','$lugar','$plazas','$dificultad','$descripcion')")==TRUE)
	{
		$idActividad = $mysqli->insert_id;
	?>
		<script>
		alert("Actividad creada con éxito");
		</script>
		<?php
		return $idActividad;
		}else {
		?>
		<script>
		alert("Vuelva a Introducir los datos");
		</script>
	<?php }
		
}
//Añade un entrenador a una actividad y le añade un usuario por defecto ya que no puede ser null
function asignarEntrenador($entrenadorId,$idActividad)
{	
	$mysqli=$this->conexionBD();	

	if($mysqli->query("INSERT INTO `Gestion_actividad`(`Entrenador_id_Usuario`, `Actividad_id_Actividad`, `identificador_deportista`,`fecha`)
		VALUES
		('$entrenadorId','$idActividad','default',now())")==TRUE)
	{
	?>
		<script>
	//	alert("Exito");
		</script>
		<?php
		}else {
		?>
		<script>
	//	alert("Fail");
		</script>
	<?php }
		$mysqli->close();
}
//Añade alumnos a una actividad
function altaAlumno($id_actividad)
{
	$mysqli=$this->conexionBD();

	if($mysqli->query("INSERT INTO `Gestion_actividad`(`Entrenador_id_Usuario`, `Actividad_id_Actividad`, `identificador_deportista`,`fecha`)
		VALUES
		('$id_actividad',)")==TRUE)
	{
	?>
		<script>
		alert("Inserción realizada con Exito");
		</script>
		<?php
		}else {
		?>
		<script>
		alert("Vuelva a introducir los datos");
		</script>
	<?php }
		$mysqli->close();
}
function eliminarAlumno($id_actividad,$id_alumno)
{
	$mysqli=$this->conexionBD();

 	$query="DELETE FROM `Gestion_actividad` WHERE Actividad_id_Actividad='$id_actividad' && identificador_deportista='$id_alumno'";
 	if($mysqli->query($query)==TRUE){
	?>
		<script>
		alert("Alumno eliminado con éxito");
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
function eliminarReserva($id_alumno,$id_actividad){

 	$mysqli=$this->conexionBD();

 	$query="DELETE FROM `Deportista_reserva_actividad` WHERE Deportista_id_Usuario='$id_alumno' && Actividad_id_Actividad='$id_actividad'";
 	if($mysqli->query($query)==TRUE){
	?>
		<script>
		alert("Reserva eliminada con éxito");
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

 function eliminarActividad($id_actividad){

 	$mysqli=$this->conexionBD();

 	$query="DELETE FROM `Actividad` WHERE id_Actividad='$id_actividad'";
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
    $query= "UPDATE `Actividad` SET `Nombre`='$nombreAct',`Duracion`='$duracion',`Hora`='$hora',`Lugar`='$lugar',`Plazas`='$plazas',`Dificultad`='$dificultad',`Descripcion`='$descripcion'WHERE `id_Actividad`='$id'";

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
