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

function comprobarSesion($deportista)
{
	$mysqli=$this->conexionBD();
	$query="SELECT * FROM `Sesion` WHERE `Deportista_id_Usuario`='$deportista'";
	$resultado=$mysqli->query($query);
	if(mysqli_num_rows($resultado)){
	    return TRUE;
	}else{
		return FALSE;
	}
}

//Carga el array inicial con con los atributos de la sesion (DNI de deportista, fecha de cuando se crea la sesion, comentario y numero de tabla)
function creararraySesiones()
{
	$deportista=null;
	$fecha=null;
	$comentario=null;
	$tabla=null;
	$idEjercicio=null;

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

			fwrite($file,"array(
				\"deportista\"=>'$deportista',
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

//Añade al array final el id de las tablas y los ejercicios que contiene cada una
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

//Añade al array final los datos de los ejercicios
function crearArrayDatosEjercicio(){

	$this->conexionBD();
	$form=array();

	$query="SELECT * FROM Ejercicio ";
	$mysqli=$this->conexionBD();
	$resultado=$mysqli->query($query);

	if(mysqli_num_rows($resultado)){

		while($fila = $resultado->fetch_array())
		{
			$filas[] = $fila;
		}
		foreach($filas as $fila)
		{
			$Id=$fila['id_Ejercicio'];
			$Nombre=$fila['Nombre'];
			$tipo=$fila['Tipo'];
			$tiempo=$fila['Tiempo'];	
			$repeticiones=$fila['Repeticiones'];
			$peso=$fila['Peso'];
			$series=$fila['Series'];	
			$descripcion=$fila['Descripcion'];	

			$fila_array=array("Id"=>$Id,"Nombre"=>$Nombre,"tipo"=>$tipo,"tiempo"=>$tiempo,"repeticiones"=>$repeticiones,"peso"=>$peso,"series"=>$series,"descripcion"=>$series);
			array_push($form,$fila_array);
		}
	}			$resultado->free();
	$mysqli->close();
	return $form;
}

//Añade al array final con el nombre de ususario de los deportistas
function crearArrayNombreDeportista($deportista){

	$this->conexionBD();
	$form=array();
	
	//&& `Usuario`='$nombreUsuarioLogueado' 
	$query="SELECT * FROM Deportista WHERE `DNI` = '$deportista' ";
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

//Lista los nombres de los deportistas al crear una nueva sesion Sesion
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

//Lista los nombres de las tablas al crear una nueva Sesion
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

function eliminarSesion($deportista,$tabla,$comentario){
	$mysqli=$this->conexionBD();
	$query="DELETE FROM `Sesion` WHERE Deportista_id_Usuario='$deportista' && Tabla_id = '$tabla' && Comentario = '$comentario'";
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
	$sql = "SELECT * FROM Sesion"; 
	$result = $mysqli->query($sql);
	if ($row = $result->fetch_array(MYSQLI_ASSOC)) 
	{
		if($row["Fecha"]=="$fecha") {

			$query= "UPDATE `Sesion` SET `Fecha`='$fecha',`Comentario`='$comentario',`Tabla_id`='$tabla' WHERE `Deportista_id_Usuario`='$deportista' && `Fecha`='".$row["Fecha"]."'";

			if($mysqli->query($query)==TRUE){
				?>
				<script>
					alert("BIEN<?php echo($deportista); echo($fecha); echo($comentario); echo($tabla);?>");
				</script>
				<?php
			}else {
				?>
				<script>
					alert("MAL<?php echo($deportista); echo($fecha); echo($comentario); echo($tabla);?>");
				</script>
				<?php }
				$result->free();
				$mysqli->close();
				
		}
	}else{
		?>
		<script>
			alert("No hay sesiones en la BD");
		</script>
		<?php } 
		$result->free();
		$mysqli->close();
		
		
}
/*function RellenaDatos()
{
    $this->ConectarBD();
    $sql = "SELECT * from Ejercicio where id_Ejercicio = '".$this->id_Ejercicio."'";
    if (!($resultado = $this->mysqli->query($sql))){
	    return 'Error en la consulta sobre la base de datos'; // sustituir por un try
	}
    else{
	       $result = $resultado->fetch_array();
		   return $result;
	}
}

function modificarSesion()
{
    $this->ConectarBD();
    $sql = "SELECT * from Sesion where Deportista_id_Usuario = '".$this->deportista."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
		$consulta = $this->mysqli->prepare("UPDATE Sesion SET Deportista_id_Usuario=?,Fecha=?,Comentario=?,Tabla_id=?");
		$consulta->bind_param('ssiiiisi',$this->deportista,$this->fecha,$this->comentario,$this->tabla);
	        if (!$consulta->execute()){
				return "Se ha producido un error en la modificación"; // sustituir por un try
		}
		else{
			return "La modificación se ha realizado con éxito";
		}
    }
    else
        return "El item no existe";
}*/



}
?>

