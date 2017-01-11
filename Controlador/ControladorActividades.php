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

if(isset($_POST['Alta']) and !isset($_REQUEST['altaActividad']))
{
	$idiom=new idiomas();
	$vista=new actividadAlta();
	$actividad=new Actividad();
	//Variable para menu despelgable entrenadores
	$listaEntrenadores=$actividad->getEntrenadores();
	$vista->crear($idiom,$listaEntrenadores);
}

if(isset($_REQUEST['altaActividad']))
{
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
	$idActividad=$model->CrearActividad($nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion);
	
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
	$nombreAct=$_POST['nombre'];
	$duracion=$_POST['duracion'];
	$hora=$_POST['hora'];
	$lugar=$_POST['lugar'];
	$plazas=$_POST['plazas'];
	$dificultad=$_POST['dificultad'];			
	$descripcion=$_POST['descripcion'];
	//$entrenadorId=$_POST['entrenador'];
	$form1=array("id_actividad"=>"$id_actividad","nombreAct"=>"$nombreAct","duracion"=>"$duracion","hora"=>"$hora","lugar"=>"$lugar","plazas"=>"$plazas","dificultad"=>"$dificultad","descripcion"=>"$descripcion");
	$modificar=new actividadModificar();
	$modificar->crear($idiom,$form1);
}
if(isset($_POST['ModificarActividad']))
{
	$idiom=new idiomas();
	$id_actividad=$_POST['id_actividad'];
	$nombreAct=$_POST['nombre'];
	$duracion=$_POST['duracion'];
	$hora=$_POST['hora'];
	$lugar=$_POST['lugar'];
	$plazas=$_POST['plazas'];
	$dificultad=$_POST['dificultad'];							
	$descripcion=$_POST['descripcion'];
	//$entrenadorId=$_POST['entrenador'];	
	$model=new Actividad();
	$model->modificarActividad($id_actividad,$nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion);
	//$model->asignarEntrenador($entrenadorId,$idActividad);
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


if (isset($_POST['eliminar']))
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


?>