<?php
//Clase : USUARIOS_Modelo
//Creado el : 6/11/2016
//Creado por: ismael
//-------------------------------------------------------

class EJERCICIO_Modelo
{
	var $id_Ejercicio;
	var $tipo;
	var $nombre;
	var $tiempo;
	var $repeticiones;
	var $peso;
	var $series;
	var $descripcion;

//Constructor de la clase
//parametros: nombre de ejercicio
function __construct($id_Ejercicio,$tipo,$nombre,$tiempo,$repeticiones,$peso,$series,$descripcion){
	$this->id_Ejercicio = $id_Ejercicio;
	$this->tipo = $tipo;
    $this->nombre = $nombre;
	$this->tiempo = $tiempo;
	$this->repeticiones = $repeticiones;
	$this->peso = $peso;
	$this->series = $series;
	$this->descripcion = $descripcion;
}

//Metodo (invocable estático) que conecta contra la BD y el ejercicio EJERCICIOS
function ConectarBD(){
    $this->mysqli = new mysqli($host, $user , $pass, $name);
	if ($this->mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
	}
}

//Metodo Insertar
//Inserta en el Ejercicio EJERCICIOS de la bd gimnaio_BD los valores
// de los atributos del objeto. Comprueba si nombre esta vacio y si
//existe ya el nombre en el Ejercicio
function Insertar(){
    $this->ConectarBD();
    if ($this->nombre <> '' ){
		$consulta = $this->mysqli->prepare("INSERT INTO EJERCICIO (Nombre,Tipo,Tiempo,Peso,Series,Repeticiones,Descripcion) VALUES (?,?,?,?,?,?,?)");
		$consulta->bind_param('ssiiiis',$this->nombre,$this->tipo,$this->tiempo,$this->peso,$this->series,$this->repeticiones,$this->descripcion);
		$consulta->execute();
		return 'Inserción realizada con éxito'; //operacion de insertado correcta
    }
    else{
        //echo "Introduzca un valor para el nombre<br>";
		return 'Introduzca un valor para el nombre'; // introduzca un valor para el Ejercicio
	}
}

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct(){
}

//funcion Consultar: hace una búsqueda en el Ejercicio EJERCICIO con
//el nombre. Si van vacios devuelve todos
function Consultar()
{
    $this->ConectarBD();
    $sql = "SELECT * from ejercicio where nombre LIKE '%".$this->nombre."%'";
    if (!($resultado = $this->mysqli->query($sql))){
	    return 'Error en la consulta sobre la base de datos';
	}
    else{
	       return $resultado;
	}
}

function Borrar()
{
    $this->ConectarBD();
    $sql = "SELECT * from EJERCICIO where id_Ejercicio = '".$this->id_Ejercicio."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
        $sql = "DELETE from EJERCICIO where id_Ejercicio = '".$this->id_Ejercicio."'";
		echo $sql;
        $this->mysqli->query($sql);
    	return "El borrado se ha realizado con éxito";
    }
    else
        return "El item no existe";
}

function RellenaDatos()
{
    $this->ConectarBD();
    $sql = "SELECT * from EJERCICIO where id_Ejercicio = '".$this->id_Ejercicio."'";
    if (!($resultado = $this->mysqli->query($sql))){
	    return 'Error en la consulta sobre la base de datos'; // sustituir por un try
	}
    else{
	       $result = $resultado->fetch_array();
		   return $result;
	}
}

function Modificar()
{
    $this->ConectarBD();
    $sql = "SELECT * from EJERCICIO where id_Ejercicio = '".$this->id_Ejercicio."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
		$consulta = $this->mysqli->prepare("UPDATE ejercicio SET Nombre=?,Tipo=?,Tiempo=?,Peso=?,Series=?,Repeticiones=?,Descripcion=? WHERE id_Ejercicio=?");
		$consulta->bind_param('ssiiiisi',$this->nombre,$this->tipo,$this->tiempo,$this->peso,$this->series,$this->repeticiones,$this->descripcion,$this->id_Ejercicio);
	        if (!$consulta->execute()){
				return "Se ha producido un error en la modificación"; // sustituir por un try
		}
		else{
			return "La modificación se ha realizado con éxito";
		}
    }
    else
        return "El item no existe";
}

}//fin de clase

?>
