<?php

include '../Modelos/TABLA_Modelo.php';
include '../Vistas/TABLA_Show_Vista.php';
include '../Vistas/TABLA_Consultar_Vista.php';
include '../Vistas/TABLA_Insertar_Vista.php';
include '../Vistas/TABLA_Modificar_Vista.php';
include '../Vistas/TABLA_Borrar_Vista.php';
include '../Vistas/TABLA_Buscar_Vista.php';
include '../Vistas/Mensaje_Vista.php';
include '../Functions/LibraryFunctions.php';

function get_data_form(){
	$id_Tabla = $_REQUEST['id_Tabla'];
	$nombre = $_REQUEST['Nombre'];
	if (isset($_REQUEST["check"])) {
		$ejercicios = $_REQUEST["check"];
	}
	$tabla = new TABLA_Modelo($id_Tabla,$nombre,$ejercicios);
	return $tabla;
}

if (!isset($_REQUEST['accion'])){
	$_REQUEST['accion'] = '';
}

	Switch ($_REQUEST['accion']){
		case 'Insertar':
			if (!isset($_REQUEST['Nombre'])){
				new TABLA_Insertar();
			}
			else{
				$tabla = get_data_form();
				$respuesta = $tabla->Insertar();
				new Mensaje($respuesta, 'TABLA_Controller.php');
			}
			break;
		case 'Borrar':
			if (!isset($_REQUEST['Nombre'])){
				$tabla = new TABLA_Modelo($_REQUEST['id_Tabla'],"");
				$valores = $tabla->RellenaDatos($_REQUEST['id_Tabla']);
				new TABLA_Borrar($valores,'TABLA_Controller.php');
			}
			else{
				$tabla = get_data_form();
				$respuesta = $tabla->Borrar();
				new Mensaje($respuesta, 'TABLA_Controller.php');
			}
			break;
		case 'Modificar':
			if (!isset($_REQUEST['Nombre'])){
				$tabla = new TABLA_Modelo($_REQUEST['id_Tabla'],"");
				$valores = $tabla->RellenaDatos($_REQUEST['id_Tabla']);
				$ejercicios = $tabla->ListarEjerciciosConCheck($_REQUEST['id_Tabla']);
				new TABLA_Modificar($valores,$ejercicios,'TABLA_Controller.php');
			}
			else{
				$tabla = get_data_form();
				$respuesta = $tabla->Modificar();
				new Mensaje($respuesta, 'TABLA_Controller.php');
			}
			break;
		case 'Buscar':
			if (!isset($_REQUEST['Nombre'])){
				new TABLA_Buscar();
			}
			else{
				$tabla = get_data_form();
				$datos = $tabla->Consultar();
				new TABLA_Show($valores, 'TABLA_Controller.php');
			}
			break;
			case 'Consultar':
			if (!isset($_REQUEST['Nombre'])){
				$tabla = new TABLA_Modelo($_REQUEST['id_Tabla'],"");
				$valores = $tabla->RellenaDatos($_REQUEST['id_Tabla']);
				$ejercicios = $tabla->ListarEjercicios($_REQUEST['id_Tabla']);
				new TABLA_Consultar($valores,$ejercicios, 'TABLA_Controller.php');
			}
			else{
				$tabla = get_data_form();
				$ejercicios = $tabla->ListarEjercicios($_REQUEST['id_Tabla']);
				new TABLA_Consultar($respuesta,$ejercicios, 'TABLA_Controller.php');
			}
				break;
		default:
			if (!isset($_REQUEST['Nombre'])){
				$tabla = new TABLA_Modelo('','');
			}
			else{
				$tabla = get_data_form();
			}
				$datos = $tabla->Consultar();
				new TABLA_Show($datos, 'ControladorPrincipal.php?volver');

	}



?>
