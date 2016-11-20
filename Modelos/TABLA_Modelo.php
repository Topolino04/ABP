<?php
//Clase : TABLA_Modelo
//Creado el : 6/11/2016
//Creado por: ismael
//-------------------------------------------------------

class TABLA_Modelo
{
	var $id_Tabla;		// Clave de la tabla
	var $nombre;	// Nombre de la tabla

//Constructor de la clase
//parametros: nombre de tabla
function __construct($id_Tabla,$nombre,$arrayE = null){
	$this->id_Tabla = $id_Tabla;
	$this->ejercicios = $arrayE;
    $this->nombre = $nombre;  // Nombre de la tabla
}

//Metodo (invocable estático) que conecta contra la BD y la tabla TABLAS
function ConectarBD(){
    $this->mysqli = new mysqli('localhost', 'root', 'iu','Gimnasio_BD');
	if ($this->mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
	}
}

//Metodo Insertar
//Inserta en la tabla TABLAS de la bd gimnaio_BD los valores
// de los atributos del objeto. Comprueba si nombre esta vacio y si
//existe ya el nombre en la tabla
function Insertar(){
    $this->ConectarBD();
    if ($this->nombre <> '' ){
		$sql = "INSERT INTO Tabla (Nombre) VALUES ('".$this->nombre."')";
		$this->mysqli->query($sql);
		return 'Inserción realizada con éxito'; //operacion de insertado correcta
    }
    else{
        //echo "Introduzca un valor para el nombre<br>";
		return 'Introduzca un valor para el nombre'; // introduzca un valor para la tabla
	}
}

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct(){
}

//funcion Consultar: hace una búsqueda en la tabla TABLA con
//el nombre. Si van vacios devuelve todos
function Consultar(){
    $this->ConectarBD();
    $sql = "SELECT * from Tabla where Nombre LIKE '%".$this->nombre."%'";
    if (!($resultado = $this->mysqli->query($sql))){
	    return 'Error en la consulta sobre la base de datos';
	}
    else{
	       return $resultado;
	}
}

function Borrar(){
    $this->ConectarBD();
    $sql = "SELECT * from Tabla where id_Tabla = '".$this->id_Tabla."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
        $sql = "DELETE from Tabla where id_Tabla = '".$this->id_Tabla."'";
        $this->mysqli->query($sql);
    	return "El borrado se ha realizado con éxito";
    }
    else
        return "El item no existe";
}

function RellenaDatos(){
    $this->ConectarBD();
    $sql = "SELECT * from Tabla where id_Tabla = '".$this->id_Tabla."'";
    if (!($resultado = $this->mysqli->query($sql))){
	    return 'Error en la consulta sobre la base de datos'; // sustituir por un try
	}
    else{
	       $result = $resultado->fetch_array();
		   return $result;
	}
}

function Modificar(){
    $this->ConectarBD();
    $sql = "SELECT * from Tabla where id_Tabla = '".$this->id_Tabla."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
		$consulta = $this->mysqli->prepare("UPDATE Tabla SET id_Tabla=?, Nombre=? WHERE id_Tabla=?");
		$consulta->bind_param('isi',$this->id_Tabla,$this->nombre,$this->id_Tabla);
	    if (!$consulta->execute()){
			return "Se ha producido un error en la modificación"; // sustituir por un try
		}
		else{
			$sql = 	"DELETE FROM Tabla_contiene_Ejercicios WHERE Tabla_id_Tabla=".$this->id_Tabla."; ";
			if(sizeof($this->ejercicios)>1)
				$sql = $sql."INSERT INTO Tabla_contiene_Ejercicios VALUES ";
			for($i=0;$i<count($this->ejercicios)-1;$i++)
				$sql = $sql."(".$this->id_Tabla.",".$this->ejercicios[$i]."),";
			$sql = rtrim($sql,',');
			$sql = $sql.";";
			echo $sql."<br>";
			if (!$this->mysqli->multi_query($sql)){
				return "Se ha producido un error en la modificación ejercicios";
			}
			return "La modificación se ha realizado con éxito";
		}
    }
    else
        return "El item no existe";
}
function ListarEjercicios(){
	$this->ConectarBD();
	if($result = $this->mysqli->prepare("SELECT * FROM Tabla_contiene_Ejercicios, Ejercicio WHERE Ejercicio_id_Ejercicio = id_Ejercicio AND Tabla_id_Tabla = ?")){
		$result->bind_param("i",$this->id_Tabla);
		$result->execute();
		$result = $result->get_result();
		if($result->num_rows <= 0){
			$result = "Tabla vacia";
		}
	}
	else {
		$result = "Error en la consulta";
	}
	return $result;
}
function ListarEjerciciosConCheck(){
	$this->ConectarBD();
	if($result = $this->mysqli->prepare("	SELECT Ejercicio.*, true FROM Tabla_contiene_Ejercicios, Ejercicio WHERE Ejercicio_id_Ejercicio = id_Ejercicio AND Tabla_id_Tabla = ?
											UNION
											SELECT *, false
											FROM Ejercicio
											WHERE id_Ejercicio not in (	SELECT id_Ejercicio
																		FROM Tabla_contiene_Ejercicios, Ejercicio
																		WHERE Ejercicio_id_Ejercicio = id_Ejercicio AND Tabla_id_Tabla = ?)")){
		$result->bind_param("ii",$this->id_Tabla,$this->id_Tabla);
		$result->execute();
		var_dump($result);
		$result = $result->get_result();
		if($result->num_rows <= 0){
			$result = "Tabla vacia";
		}
	}
	else {
		$result = "Error en la consulta";
	}
	return $result;
}
}//fin de clase

?>
