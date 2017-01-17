<?php
session_start();
include("../Vistas/VistaPrincipalActividades.php");
include("../Modelos/ActividadModelo.php");
include("../Modelos/ASISTENCIA_Modelo.php");
include("../Idiomas/idiomas.php");
include("../Vistas/AltaActividad.php");
include("../Vistas/Mensaje_Vista.php");
include("../Vistas/ModificarActividad.php");
include("../Vistas/ASITENCIA_SHOW_Vista.php");




if(isset($_REQUEST['actividades']))
{
	$idiom=new idiomas();
	$actividad=new Actividad();				
	$actividad->creararrayActividades();
	$DatosActividad=$actividad->crearArrayGestionActividad();
	$NombreEntrenador=$actividad->getEntrenadores();
	$NombreDeportista=$actividad->crearArrayNombreDeportista();
	if(isset($NombreDeportista)){
	$actividad->RellenarArrayFinal($DatosActividad,$NombreEntrenador,$NombreDeportista);
	}
	//cargo el fichero final
	include("../Archivos/ArrayConsultarGestionActividad.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarGestionActividades();
	$vista=new actividadvista();
	$vista->crear($formfinal,$idiom);

}

if(isset($_REQUEST['Alta']) and !isset($_REQUEST['altaActividad']))
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
	//var_dump($idActividad);	
	//var_dump($entrenadorId);
	$model->asignarEntrenador($entrenadorId,$idActividad);
	$model->creararrayActividades();
	$DatosActividad=$model->crearArrayGestionActividad();
	$NombreEntrenador=$model->getEntrenadores();
    $NombreDeportista=$model->crearArrayNombreDeportista();
	$model->RellenarArrayFinal($DatosActividad,$NombreEntrenador,$NombreDeportista);
	include("../Archivos/ArrayConsultarGestionActividad.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarGestionActividades();
	$vista=new actividadvista();
	$vista->crear($formfinal,$idiom);
}

if (isset($_REQUEST['Modificar']))
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
	//Variable para menu despelgable entrenadores
	$actividad=new Actividad();
	$listaEntrenadores=$actividad->getEntrenadores();
	$modificar=new actividadModificar();
	$modificar->crear($idiom,$form1,$listaEntrenadores);
}
if(isset($_REQUEST['ModificarActividad']))
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
	$entrenadorId=$_POST['entrenador'];
	$model=new Actividad();
	$model->modificarActividad($id_actividad,$nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion);
	//$model->asignarEntrenador($entrenadorId,$idActividad);
	$model->asignarEntrenador($entrenadorId,$id_actividad);
	$model->creararrayActividades();
	$DatosActividad=$model->crearArrayGestionActividad();
	$NombreEntrenador=$model->getEntrenadores();
    $NombreDeportista=$model->crearArrayNombreDeportista();
	$model->RellenarArrayFinal($DatosActividad,$NombreEntrenador,$NombreDeportista);
	include("../Archivos/ArrayConsultarGestionActividad.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarGestionActividades();
	$vista=new actividadvista();
	$vista->crear($formfinal,$idiom);
}


if (isset($_REQUEST['eliminar']))
{
	$idiom=new idiomas();
	$id_actividad=$_POST['id_actividad'];		
	$model1=new Actividad();
	$model1->eliminarActividad($id_actividad);
	//$model1->asignarEntrenador($entrenadorId,$idActividad);
	$model1->creararrayActividades();
	$DatosActividad=$model1->crearArrayGestionActividad();
	$NombreEntrenador=$model1->getEntrenadores();
    $NombreDeportista=$model1->crearArrayNombreDeportista();
	$model1->RellenarArrayFinal($DatosActividad,$NombreEntrenador,$NombreDeportista);
	include("../Archivos/ArrayConsultarGestionActividad.php");
	$arra=new consult();
	$formfinal=$arra->array_consultarGestionActividades();
	$vista=new actividadvista();
	$vista->crear($formfinal,$idiom);
}

if (isset($_REQUEST['eliminarAlumno']))
{
	$idiom=new idiomas();
	$id_actividad=$_POST['id_actividad'];
	$id_alumno=$_POST['id_alumno'];
	var_dump($id_actividad);
	var_dump($id_alumno);
	$actividad=new Actividad();
	$actividad->eliminarAlumno($id_actividad,$id_alumno);
	$actividad->eliminarReserva($id_alumno,$id_actividad);
	$actividad->creararrayActividades();
	$DatosActividad=$actividad->crearArrayGestionActividad();
	$NombreEntrenador=$actividad->getEntrenadores();
	$NombreDeportista=$actividad->crearArrayNombreDeportista();
	if(isset($NombreDeportista)){
	$actividad->RellenarArrayFinal($DatosActividad,$NombreEntrenador,$NombreDeportista);
	}
	//cargo el fichero final
	include("../Archivos/ArrayConsultarGestionActividad.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarGestionActividades();
	$vista=new actividadvista();
	$vista->crear($formfinal,$idiom);
}
if (isset($_POST['Asistencia'])){
    if($_POST['Asistencia'] == "ida"){
        $actividad_id=$_POST['actividad_id'];
        $actividad_nom=$_POST['actividad_nom'];

        $model = new Asistencia();
        $fechas = $model->listarFechasDeReservas($actividad_id);
        $users =  $model->listarDeportisdasQueAsistenActividad($actividad_id);
        $datos =  $model->listarAsistenciasDeActividad($actividad_id);
        $vista = new ASISTENCIA_SHOW_Vista($actividad_id,$actividad_nom,$fechas,$users,$datos);
    }
    if($_POST['Asistencia'] == "vuelta") {
        $actividad_id = $_POST['actividad_id'];

        $model = new Asistencia();
        $fechas = $model->listarFechasDeReservas($actividad_id);
        $users = $model->listarDeportisdasQueAsistenActividad($actividad_id);
        $datos = $model->listarAsistenciasDeActividad($actividad_id);

        $asistencias = array();
        foreach ($users as $user) {
            foreach ($fechas as $fecha) {
                if(isset($_POST[$user . $fecha->format("Y-m-d_H:i:s")]))
                    array_push($asistencias, new Asistencia($actividad_id, $fecha, $user,1));
                else
                    array_push($asistencias, new Asistencia($actividad_id, $fecha, $user,0));
            }
        }

        $mensaje = 'Error en la consulta sobre la base de datos';
        foreach ($asistencias as $elem) {
            $mensaje = $elem->update();
        }
        new Mensaje($mensaje, "ControladorActividades.php?actividades");
    }

}

?>
