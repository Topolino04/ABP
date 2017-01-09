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
	$clase=new actividadAlta();
	$clase->crear($idiom);	
}

if(isset($_POST['altaActividad'])){
	
		$idiom=new idiomas();
		$nombreAct=$_POST['nombre'];
		$duracion=$_POST['duracion'];
		$hora=$_POST['hora'];
		$lugar=$_POST['lugar'];
		$plazas=$_POST['plazas'];
		$dificultad=$_POST['dificultad'];
				
		$descripcion=$_POST['descripcion'];
		$model=new Actividad();
		$model->altaActividad($nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion);
		$model->creararrayActividades();
		include("../Archivos/ArrayConsultarActividad.php");
		$arra=new consultactividad();
		$form=$arra->array_consultarActividad();
		$vista=new actividadvista();
		$vista->crear($form,$idiom);

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
	$model=new Actividad();
	$model->eliminarActividad($id_actividad);
	$model->creararrayActividades();
	include("../Archivos/ArrayConsultarActividad.php");
		$arra=new consultactividad();
		$form=$arra->array_consultarActividad();
		$vista=new actividadvista();
		$vista->crear($form,$idiom);
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
	$actividad->RellenarArrayFinal($DatosActividad);
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