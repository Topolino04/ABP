<?php 


	include("../Vistas/VistaPrincipalSesion.php");
	include("../Modelos/SesionModelo.php");
	include("../Idiomas/idiomas.php");
	include("../Vistas/AltaSesion.php");
	//include("../Vistas/ModificarSesion.php");
	session_start();

			if(isset($_REQUEST['sesiones']))
			{
				$idiom=new idiomas();
				$sesion=new Sesion();
				$sesion->contructor();
				$sesion->creararraySesiones();
				include("../Archivos/ArrayConsultarSesiones.php");
				$arra=new consultSesiones();
				$form=$arra->array_consultarSesiones();

				
				$vista=new Sesionvista();
				$vista->crear($form,$idiom);
			}

			if(isset($_POST['Alta']))
			{
				$idiom=new idiomas();

				$sesion=new Sesion();
				$sesion->creararrayDeportistas();
				include("../Archivos/ArrayConsultar.php");
				$arra=new consult();
				$formdeportistas=$arra->array_consultar();
				
				$sesion->creararrayMonitor();
				include("../Archivos/ArrayConsultarMonitor.php");
				$arra=new consultar();
				$formmonitores=$arra->array_consultar1();
				$clase=new actividadAlta();
				$clase->crear($formdeportistas,$formmonitores,$idiom);	
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
					$model=new Actividad();
					$model->modificarActividad($nombreAct,$duracion,$hora,$lugar,$plazas,$dificultad,$descripcion);
					$model->creararrayActividades();
					include("../Archivos/ArrayConsultarActividad.php");
					$arra=new consultactividad();
					$form=$arra->array_consultarActividad();
					$vista=new actividadvista();
					$vista->crear($form,$idiom);
			}


?>
