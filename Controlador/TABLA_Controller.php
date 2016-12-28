<?php

include '../Modelos/TABLA_Modelo.php';
include '../Vistas/TABLA_Show_Vista.php';
include '../Vistas/TABLA_Consultar_Vista.php';
include '../Vistas/TABLA_Insertar_Vista.php';
include '../Vistas/TABLA_Modificar_Vista.php';
include '../Vistas/TABLA_Borrar_Vista.php';
include '../Vistas/Mensaje_Vista.php';
include '../Functions/LibraryFunctions.php';
session_start();

function get_data_form(){
	$id_Tabla = $_REQUEST['id_Tabla'];
	$nombre = $_REQUEST['Nombre'];
	if (isset($_REQUEST["check"])) {
		$ejercicios = $_REQUEST["check"];
	}else{
		$ejercicios = null;
	}
    if (isset($_REQUEST["check2"])) {
        $usuarios = $_REQUEST["check2"];
    }else{
        $usuarios = null;
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
				$valores = $tabla->RellenaDatos();
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
				$valores = $tabla->RellenaDatos();
				$ejercicios = $tabla->ListarEjerciciosConCheck();
                $usuarios = $tabla->ListarUsuariosConCheck();
				new TABLA_Modificar($valores,$ejercicios,$usuarios,'TABLA_Controller.php');
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
				new TABLA_Show($datos, 'TABLA_Controller.php');
			}
			break;
			case 'Consultar':
			if (!isset($_REQUEST['Nombre'])){
				$tabla = new TABLA_Modelo($_REQUEST['id_Tabla'],"");
				$valores = $tabla->RellenaDatos();
				$ejercicios = $tabla->ListarEjercicios();
                $usuarios = $tabla->ListarUsuarios();
				new TABLA_Consultar($valores,$ejercicios,$usuarios, 'TABLA_Controller.php');
			}
			else{
				$tabla = get_data_form();
				$ejercicios = $tabla->ListarEjercicios();
                $usuarios = $tabla->ListarUsuarios();
				new TABLA_Consultar($respuesta,$ejercicios,$usuarios, 'TABLA_Controller.php');
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
