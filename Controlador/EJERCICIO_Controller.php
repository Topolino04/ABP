<?php

include '../Modelos/EJERCICIO_Modelo.php';
include '../Vistas/EJERCICIO_Show_Vista.php';
include '../Vistas/EJERCICIO_Consultar_Vista.php';
include '../Vistas/EJERCICIO_Insertar_Vista.php';
include '../Vistas/EJERCICIO_Modificar_Vista.php';
include '../Vistas/EJERCICIO_Borrar_Vista.php';
include '../Vistas/Mensaje_Vista.php';
include '../Functions/LibraryFunctions.php';
include("../datos_BD.php");

function get_data_form(){
	$id_Ejercicio = $_REQUEST['id_Ejercicio'];
	if($_REQUEST['Tipo'] <> '')				$tipo = 		$_REQUEST['Tipo'];			else $tipo = 		 NULL;
	if($_REQUEST['Nombre'] <> '')			$nombre = 		$_REQUEST['Nombre'];		else $nombre = 		 NULL;
	if($_REQUEST['Tiempo'] <> '')			$tiempo = 		$_REQUEST['Tiempo'];		else $tiempo = 		 NULL;
	if($_REQUEST['Repeticiones'] <> '')		$repeticiones = $_REQUEST['Repeticiones'];	else $repeticiones = NULL;
	if($_REQUEST['Peso'] <> '')				$peso = 		$_REQUEST['Peso'];			else $peso = 		 NULL;
	if($_REQUEST['Series'] <> '')			$series = 		$_REQUEST['Series'];		else $series = 		 NULL;
	if($_REQUEST['Descripcion'] <> '')		$descripcion = 	$_REQUEST['Descripcion'];	else $descripcion =  NULL;
	$tabla = new EJERCICIO_Modelo($id_Ejercicio,$tipo,$nombre,$tiempo,$repeticiones,$peso,$series,$descripcion);
	return $tabla;
}

if (!isset($_REQUEST['accion'])){
	$_REQUEST['accion'] = '';
}

	Switch ($_REQUEST['accion']){
		case 'Insertar':
			if (!isset($_REQUEST['Nombre'])){
				new EJERCICIO_Insertar();
			}
			else{
				$tabla = get_data_form();
				$respuesta = $tabla->Insertar();
				new Mensaje($respuesta, 'EJERCICIO_Controller.php');
			}
			break;
		case 'Borrar':
			if (!isset($_REQUEST['Nombre'])){
				$tabla = new EJERCICIO_Modelo($_REQUEST['id_Ejercicio'],'','','','','','','','','');
				$valores = $tabla->RellenaDatos($_REQUEST['id_Ejercicio']);
				new EJERCICIO_Borrar($valores,'EJERCICIO_Controller.php');
			}
			else{
				$tabla = get_data_form();
				$respuesta = $tabla->Borrar();
				new Mensaje($respuesta, 'EJERCICIO_Controller.php');
			}
			break;
		case 'Modificar':
			if (!isset($_REQUEST['Nombre'])){
				$tabla = new EJERCICIO_Modelo($_REQUEST['id_Ejercicio'],'','','','','','','','','');
				$valores = $tabla->RellenaDatos($_REQUEST['id_Ejercicio']);
				new EJERCICIO_Modificar($valores,'EJERCICIO_Controller.php');
			}
			else{
				$tabla = get_data_form();
				$respuesta = $tabla->Modificar();
				new Mensaje($respuesta, 'EJERCICIO_Controller.php');
			}
			break;
		case 'Consultar':
			if (!isset($_REQUEST['Nombre'])){
				new EJERCICIO_Consultar();
			}
			else{
				$tabla = get_data_form();
				$datos = $tabla->Consultar();
				new EJERCICIO_Show($valores, 'EJERCICIO_Controller.php');
			}
			break;
		default:
			if (!isset($_REQUEST['Nombre'])){
				$tabla = new EJERCICIO_Modelo('','','','','','','','','','');
			}
			else{
				$tabla = get_data_form();
			}
				$datos = $tabla->Consultar();
				new EJERCICIO_Show($datos, 'ControladorPrincipal.php?volver');
	}
?>
