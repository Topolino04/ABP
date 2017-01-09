<?php
session_start();
include("../Vistas/VistaPrincipalReserva.php");
include("../Modelos/ReservaModelo.php");
include("../Idiomas/idiomas.php");
include("../Vistas/AltaReserva.php");
//include("../Vistas/ModificarReserva.php");
	

if( isset($_REQUEST['reservas']) or isset($_REQUEST['Volver']) ) 
{	
	$idiom=new idiomas();
	$reserva=new Reserva();		
	$reserva->creararrayReservas();
	$NombreDeportista=$reserva->crearArrayNombreDeportista();
	$formActividad=$reserva->creararrayActividades();
	$DatosEntrenadores=$reserva->getEntrenadores();
	$ObtenerEntrenadorActividad=$reserva->crearArrayGestionActividad();
	$reserva->RellenarArrayFinal($NombreDeportista,$formActividad,$DatosEntrenadores,$ObtenerEntrenadorActividad);
	//cargo el fichero final
    include("../Archivos/ArrayConsultarActividadesDeReserva.php");
    $datos=new consult();
    $formfinal=$datos->array_consultarActividades();
	$vista=new reservaVista();
	$vista->crear($formfinal,$idiom);
}
if(isset($_POST['Alta'])) //Al hacer click en Crear Reserva
{
	$idiom=new idiomas();
	$vista=new reservaAlta(); //Llamada a la vista de alta
	$reserva=new Reserva();
	//Menus despelgables
	$listaDeportistas=$reserva->getDeportistas();
	$listActividades=$reserva->getActividades();
	$vista->crear($idiom,$listaDeportistas,$listActividades);
}
//Cuando se introducen los datos de la nueva reserva, al enviar el alta carga todas las reservas
if(isset($_POST['altaReserva'])){
	$idiom=new idiomas();
	$deportistaId=$_POST['deportistaId'];
	$actividadId=$_POST['actividadId'];
	//$asistencia=$_POST['asistencia'];
	$model=new Reserva();
	$model->altaReserva($deportistaId,$actividadId);
	$model->altaAlumno($deportistaId,$actividadId,$entrenadorId);
	$model->creararrayReservas();
	$NombreDeportista=$model->crearArrayNombreDeportista();
	$formActividad=$model->creararrayActividades();
	$model->RellenarArrayFinal($NombreDeportista,$formActividad);
	include("../Archivos/ArrayConsultarActividadesDeReserva.php");
	$datos=new consult();
		$formfinal=$datos->array_consultarActividades();
	$vista=new reservaVista();
	$vista->crear($formfinal,$idiom);
}
if (isset($_POST['Modificar']))
{
	$idiom=new idiomas();			
	$deportistaId=$_POST['deportistaId'];
	$actividadId=$_POST['actividadId'];
	$fecha=$_POST['fecha'];
	$asistencia=$_POST['asistencia'];
	$modificar=new ReservaModificar();
	$modificar->crear($idiom,$deportistaId,$actividadId,$fecha,$asistencia);
}
if (isset($_POST['Eliminar']))
{
	$idiom=new idiomas();
	$deportistaId=$_POST['deportistaId'];
	$actividadId=$_POST['actividadId'];
	//$asistencia=$_POST['asistencia'];
	$model=new Reserva();
	$model->eliminarReserva($deportistaId,$actividadId);
	$model->creararrayReservas();
	$NombreDeportista=$model->crearArrayNombreDeportista();
	$formActividad=$model->creararrayActividades();
	$model->RellenarArrayFinal($NombreDeportista,$formActividad);
	include("../Archivos/ArrayConsultarActividadesDeReserva.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarActividades();
	$vista=new reservaVista();
	$vista->crear($formfinal,$idiom);
}

if(isset($_POST['ModificarReserva']))
{
	$idiom=new idiomas();
	$deportistaId=$_POST['deportistaId'];
	$actividadId=$_POST['actividadId'];
	$fecha=$_POST['fecha'];
	$asistencia=$_POST['asistencia'];
	$model=new Reserva();
	$model->modificarReserva($deportistaId,$actividadId,$fecha,$asistencia);
	$model->creararrayReservas();
	include("../Archivos/ArrayConsultarReserva.php");
	$arra=new consultreserva();
	$form=$arra->array_consultarReserva();
	$vista=new reservavista();
	$vista->crear($form,$idiom);
}
?>