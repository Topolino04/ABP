<?php
session_start();
include("../Vistas/VistaPrincipalActividades.php");
include("../Modelos/ActividadModelo.php");
include("../Idiomas/idiomas.php");
include("../Vistas/AltaActividad.php");
include("../Vistas/ModificarActividad.php");


if(isset($_REQUEST['actividades']))
{
	$idiom=new idiomas();
	$actividad=new Actividad();				
	$actividad->creararrayActividades();
	$DatosActividad=$actividad->crearArrayGestionActividad();
	$NombreEntrenador=$actividad->getEntrenadores();
	$actividad->RellenarArrayFinal($DatosActividad,$NombreEntrenador);
	//cargo el fichero final
	include("../Archivos/ArrayConsultarGestionActividad.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarGestionActividades();
	$vista=new actividadvista();
	$vista->crear($formfinal,$idiom);

}

if(isset($_POST['Alta']))
{
	$idiom=new idiomas();
	$vista=new actividadAlta();
	$actividad=new Actividad();
	//Variable para menu despelgable entrenadores
	$listaEntrenadores=$actividad->getEntrenadores();
	$vista->crear($idiom,$listaEntrenadores);
}

if(isset($_POST['altaActividad'])){
	
		$idiom=new idiomas();
		//$idActividad=$POST_['id_actividad'];
		$nombreAct=$_POST['nombre'];
		$duracion=$_POST['duracion'];
		$hora=$_POST['hora'];
		$lugar=$_POST['lugar'];
		$plazas=$_POST['plazas'];
		$dificultad=$_POST['dificultad'];			
		$descripcion=$_POST['descripcion'];
		$entrenadorId=$_POST['entrenador'];
			
		$model=new Actividad();
		$idActividad=$model->altaActividad($nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion,$entrenadorId);	
		$model->asignarEntrenador($entrenadorId,$idActividad);
		$model->creararrayActividades();
		$DatosActividad=$model->crearArrayGestionActividad();
		$NombreEntrenador=$model->getEntrenadores();
		$model->RellenarArrayFinal($DatosActividad,$NombreEntrenador);
		include("../Archivos/ArrayConsultarGestionActividad.php");
		$datos=new consult();
		$formfinal=$datos->array_consultarGestionActividades();
		$vista=new actividadvista();
		$vista->crear($formfinal,$idiom);

}
if (isset($_POST['Modificar']))
{
	$idiom=new idiomas();
	$id_actividad=$_POST['id_actividad'];
	$modificar=new actividadModificar();
	$modificar->crear($idiom,$id_actividad);
}

if (isset($_POST['Eliminar']))
{
	$idiom=new idiomas();
	$id_actividad=$_POST['id_actividad'];
	$model1=new Actividad();
	$model1->eliminarActividad($id_actividad);
	//$model1->asignarEntrenador($entrenadorId,$idActividad);
	$model1->creararrayActividades();
	$DatosActividad=$model1->crearArrayGestionActividad();
	$NombreEntrenador=$model1->getEntrenadores();
	$model1->RellenarArrayFinal($DatosActividad,$NombreEntrenador);
	include("../Archivos/ArrayConsultarGestionActividad.php");
	$arra=new consult();
	$formfinal=$arra->array_consultarGestionActividades();
	$vista=new actividadvista();
	$vista->crear($formfinal,$idiom);
}

if (isset($_POST['eliminarAlumno']))
{
	$idiom=new idiomas();
	$id_actividad=$_POST['id_actividad'];
	$id_alumno=$_POST['id_alumno'];
	$actividad=new Actividad();
	$actividad->eliminarAlumno($id_actividad,$id_alumno);
	$actividad->creararrayActividades();
	$DatosActividad=$actividad->crearArrayGestionActividad();
	$NombreEntrenador=$actividad->getEntrenadores();
	$actividad->RellenarArrayFinal($DatosActividad,$NombreEntrenador);
	//cargo el fichero final
	include("../Archivos/ArrayConsultarGestionActividad.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarGestionActividades();
	$vista=new actividadvista();
	$vista->crear($formfinal,$idiom);

}
if(isset($_POST['ModificarActividad']))
{
		$idiom=new idiomas();
		$nombreAct=$_POST['nombre'];
		$duracion=$_POST['duracion'];
		$hora=$_POST['hora'];
		$lugar=$_POST['lugar'];
		$plazas=$_POST['plazas'];
		$dificultad=$_POST['dificultad'];							
		$descripcion=$_POST['descripcion'];
		$id=$_POST['id'];
		$model=new Actividad();
		$model->modificarActividad($id,$nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion);
		$model->creararrayActividades();
		include("../Archivos/ArrayConsultarActividad.php");
		$arra=new consultactividad();
		$form=$arra->array_consultarActividad();
		$vista=new actividadvista();
		$vista->crear($form,$idiom);
}


?>