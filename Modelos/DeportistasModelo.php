<?php
class Deportista{

private $nombre;
private $apellido1;
private $apellido2;
private $dni;
private $tipo;
private $telefono;
private $email;
private $id_usuario;
private $usuario;
private $password;
private $fechaNac;

function contructor(){

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

	function comprobarDeportista($user,$pass)
	{
		$mysqli=$this->conexionBD();
		$query="SELECT * FROM `Deportista` WHERE `Usuario`='$user' AND `Password`='$pass' ";
		$resultado=$mysqli->query($query);

		if(mysqli_num_rows($resultado)){

		return TRUE;

		}else{
			return FALSE;
		}

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

		$query="SELECT * FROM `Deportista`";
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
				 $apellido2=$fila['Apellidos'];
				 $dni=$fila['DNI'];
				 $tipo=$fila['Tipo'];
				 $telefono=$fila['Telefono'];
				 $email=$fila['Email'];
				 $usuario=$fila['Usuario'];
				 $password=$fila['Password'];
				 $fechaNac=$fila['FechaNac'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"email\"=>'$email',
					\"fecha\"=>'$fechaNac',
					\"apellido2\"=>'$apellido2',\"dni\"=>'$dni',\"tipo\"=>'$tipo',
					\"idusuario\"=>'$id_usuario',\"usuario\"=>'$usuario',
					\"password\"=>'$password',\"telefono\"=>'$telefono')," . PHP_EOL);

		}
		}/*else{

		 	fwrite($file,"array(\"nombre\"=>'$nombre',\"email\"=>'$email',
		 		\"fecha\"=>'$fechaNac',\"apellido1\"=>'$apellido1',
		 		\"apellido2\"=>'$apellido2',\"dni\"=>'$dni',\"tipo\"=>'$tipo',
		 		\"idusuario\"=>'$id_usuario',\"usuario\"=>'$usuario',\"password\"=>'$password',
		 		\"telefono\"=>'$telefono')," . PHP_EOL);
		 }*/

				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 $resultado->free();
				 $mysqli->close();
	}



function altaDeportista($nombre,$dni,$fecha,$email,$apell1,$usuario,$telefono,$pass,$tipo)
{
	$mysqli=$this->conexionBD();

	//$query="INSERT INTO `deportista`( `Tipo`, `Nombre`,  `Apellidos`, `DNI`, `Telefono`, `Usuario`, `Password`, `emailgit`, `FechaNac`) VALUES ('$tipo','$nombre','$apell1','$dni','$telefono','$usuario','$pass','$telefono','$fecha')";
	//$resultado=$mysqli->query("INSERT INTO `deportista`( `Tipo`, `Nombre`, `Apellido_1`, `Apellidoss`, `DNI`, `Telefono`, `Usuario`, `Password`, `emailgit`, `FechaNac`) VALUES ('$tipo','$nombre','$apell','$apell1','$dni','$telefono','$usuario','$pass','$telefono','$fecha')");
		if($mysqli->query("INSERT INTO `Deportista`(`Usuario`, `Password`, `Nombre`, `Apellidos`, `DNI`, `Email`, `FechaNac`, `Telefono`, `Tipo`) VALUES ('$usuario','$pass','$nombre','$apell1','$dni','$email','$fecha','$telefono','$tipo')")==TRUE)
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
 function eliminarDeportista($dni){

 	$mysqli=$this->conexionBD();

 	$query="DELETE FROM `Deportista` WHERE DNI='$dni'";
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
 function modificarDeportista($nombre,$dni,$fecha,$email,$apell1,$usuario,$telefono,$pass,$tipo){

 	$mysqli=$this->conexionBD();
 	$query="UPDATE `Deportista` SET `Usuario`='$usuario',`Password`='$pass',`Nombre`='$nombre',`Apellidos`='$apell1',`DNI`='$dni',`Email`='$email',`FechaNac`='$fecha',`Telefono`='$telefono',`Tipo`='$tipo' WHERE DNI='$dni'";
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
