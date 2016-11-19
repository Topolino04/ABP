<?php
class Sesion{



function contructor(){

}
function conexionBD()
		{
				$host="127.0.0.1";
				$user="root";
				$pw ="";
				$db="gimnasio_bd";
				$mysqli=mysqli_connect("127.0.0.1","root","","gimnasio_bd");
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
				 $nombreAct=null;
				 $duracion=null;
				 $hora=null;
				 $lugar=null;
				 $plazas=null;
				 $dificultad=null;			
				 $id_actividad=null;
				 $descripcion=null;
		$this->conexionBD();
		$file = fopen("../Archivos/ArrayConsultarSesiones.php", "w");

		fwrite($file,"<?php class consultSesiones { function array_consultarSesiones(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();


		$query="SELECT * FROM `sesion`";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

			while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $entrenador=$fila['Entrenador_id_Usuario'];
				 $deportista=$fila['Deportista_id_Usuario'];
				 $Fecha=$fila['Fecha'];
				 $Comentario=$fila['Comentario'];
				fwrite($file,"array(\"entrenador\"=>'$entrenador',\"deportista\"=>'$deportista',
					\"Fecha\"=>'$Fecha',\"Comentario\"=>'$Comentario')," . PHP_EOL);
			
		 		}
			}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	
		}

		
function creararrayDeportistas()
	{
				 $nombre=null;
				 $apellido1=null;
				 $apellido2=null;
				 $dni=null;
				 $tipo=null;
				 $telefono=null;
				 $email=null;
				 $id_usuario=null;
				 $usuario=null;
				 $password=null;
				 $fechaNac=null;
		$this->conexionBD();
		$file = fopen("../Archivos/ArrayConsultar.php", "w");
	
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();

		$query="SELECT * FROM `deportista`";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){
			//$fila =$resultado->fetch_array(MYSQLI_ASSOC);
			while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 
				 $nombre=$fila['Nombre'];

				fwrite($file,"array(\"nombre\"=>'$nombre')," . PHP_EOL);	

		}
		}

				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	}

		

		function creararrayMonitor()
	{
		$file = fopen("../Archivos/ArrayConsultarMonitor.php", "w");
		fwrite($file,"<?php class consultar { function array_consultar1(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `entrenador`");
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

function altaSesion($monitor,$deportista,$fecha,$comentario)
{
	$mysqli=$this->conexionBD();

	if($mysqli->query("INSERT INTO `sesion`(`Entrenador_id_Usuario`, `Deportista_id_Usuario`, `Fecha`, `Comentario`) VALUES ('$monitor','$deportista','$fecha','$comentario')")==TRUE)
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

 function eliminarActividad($fecha){

 	$mysqli=$this->conexionBD();

 	$query="DELETE FROM `sesion` WHERE Fecha='$fecha'";
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
	 function modificarActividad($monitor,$deportista,$fecha,$comentario){

 	$mysqli=$this->conexionBD();
    $query= "UPDATE `sesion` SET `Entrenador_id_Usuario`='$monitor',`Deportista_id_Usuario`='$deportista',`Fecha`='$fecha',`Comentario`='$comentario' WHERE `Fecha`='$fecha'";
		
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