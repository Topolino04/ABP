<?php
class Monitor{

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
function conexionBD(){
				$mysqli=mysqli_connect($host, $user , $pass, $name);
				if(!$mysqli){
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    				exit;
				}
				/*$con=mysql_connect($host ,$user,$pw) or die ("No se puede conectar a la base de datos");
				mysql_select_db($db,$con) or die ("no se encontro la base de datos");*/
			return $mysqli;
		 }


	function comprobarMonitor($user,$pass)
	{
		$mysqli=$this->conexionBD();
		$query="SELECT * FROM Entrenador  WHERE Usuario='$user' AND Password='$pass'";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

		return true;
		}else{
			return false;
		}
	}

	function creararrayMonitor()
	{
		$file = fopen("../Archivos/ArrayConsultarMonitor.php", "w");
		fwrite($file,"<?php class consult { function array_consultar(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);
		$mysqli=$this->conexionBD();
		$resultado=$mysqli->query("SELECT * FROM `Entrenador`");
		if($resultado!=null){
		if(mysqli_num_rows($resultado)){
		while($fila = $resultado->fetch_array())
			{
				$filas[] = $fila;
			}
			foreach($filas as $fila)
			{ 	 $nombre=$fila['Nombre'];
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
					\"usuario\"=>'$usuario',
					\"password\"=>'$password',\"telefono\"=>'$telefono',)," . PHP_EOL);
			 }
		}
		}
				 fwrite($file,");return \$form;}}?>". PHP_EOL);
				 fclose($file);
				 //$resultado->free();
				 $mysqli->close();
	}



function altaMonitor($nombre,$dni,$fecha,$email,$apell1,$usuario,$telefono,$pass,$tipo)
{
	$mysqli=$this->conexionBD();

	//$mysqli->query("INSERT INTO `entrenador`(`Nombre`, `Password`, `Tipo`, `Usuario`, ` Apellido_1`, `Apellido_2`, `DNI`, `emailgit`, `FechaNac`, `Telefono`) VALUES ('$nombre','$pass','$tipo','$usuario','$apell','$apell1','$dni','$email','$fecha','$telefono')")or die("no funciona");
	if ($mysqli->query("INSERT INTO `Entrenador`(`Usuario`, `Password`, `Nombre`, `Apellidos`, `DNI`, `Email`, `FechaNac`, `Telefono`, `Tipo`) VALUES ('$usuario','$pass','$nombre','$apell1','$dni','$email','$fecha','$telefono','$tipo')")==TRUE)
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
 function eliminarMonitor($dni){

 	$mysqli=$this->conexionBD();
 	$query="DELETE FROM `Entrenador` WHERE DNI='$dni'";
 	//$resultado=mysql_query($query) or die("problema al eliminar");
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
 function modificarMonitor($nombre,$dni,$fecha,$email,$apell1,$usuario,$telefono,$pass,$tipo){

 	$mysqli=$this->conexionBD();
 	$query="UPDATE `Entrenador` SET `Usuario`='$usuario',`Password`='$pass',`Nombre`='$nombre',`Apellidos`='$apell1',`DNI`='$dni',`Email`='$email',`FechaNac`='$fecha',`Telefono`='$telefono',`Tipo`='$tipo' WHERE DNI='$dni'";
 	//$query="UPDATE `entrenador` SET `Tipo`='$tipo',`Nombre`='$nombre',`Apellido_1`='$apell',`Apellido_2`='$apell1',`DNI`='$dni',`Telefono`='$telefono',`Usuario`='$usuario',`Password`='$pass',`emailgit`='$email',`FechaNac`='$fecha' WHERE DNI='$dni'";

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
