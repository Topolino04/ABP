<?php 

include("../Vistas/Notificacion_ADD_Vista.php");
include("../Idiomas/idiomas.php");
include("../Modelos/Notificacion_Modelo.php");
include("../Modelos/MonitorModelo.php");
include("../Modelos/DeportistasModelo.php");
include("../Vistas/Notificacion_VIEW_Vista.php");
session_start();
date_default_timezone_set('Europe/Madrid');

 	if(isset($_REQUEST['notificacion']))
 	{		
 			$idioma=new idiomas();
 			$notificacion=new notificacionVista();
 			$model=new Notificacion();
 			$model->creararrayEmailDeportistas();
 			include("../Archivos/ArrayEmailDeportistas.php");
 			$datos=new consultar();
 			$form=$datos->array_consultar();
 			$notificacion->crear($idioma,NULL,$form,null);
 	}

 		if(isset($_REQUEST['enviarnoti']))
 		{
 			  $aviso="aviso";
 			  $idioma=new idiomas();
 			  $model=new Notificacion();
 			  $hoy=getdate();
        		$d = $hoy['mday'];
				$m = $hoy['mon'];
				$y = $hoy['year'];
				$hour = $hoy['hours'];
				$minute = $hoy['minutes'];
				$seconds = $hoy['seconds'];
				if(isset($_SESSION['MONITOR'])){
					$user=$_SESSION['MONITOR'];
				}else{
					$user=$_SESSION['usuario'];
				}
				
				$date= $y."-".$m."-".$d." ".$hour.":".$minute.":".$seconds;
				//echo $date;
 			  if(isset($_POST['usuario']) and isset($_POST['mensaje']))
 			  {
 			  	$insertado="insertado";
 			  	$usuarios=$_POST['usuario'];
 			  	$mensaje=$_POST['mensaje'];
 			  	
 			  	if(isset($_SESSION['usuario'])){

 			  	$modelusuario=new Deportista();
 			  	$foto=$modelusuario->devolverfoto($user);
 			  }else{
 			  	$modelusuario=new Monitor();
 			  	$foto=$modelusuario->devolverfoto($user);
 			  }
 			  	$model->altaNotificacion($usuarios,$mensaje,$date,$user,$foto);
 				$modelnotificacion=new Notificacion();
 				$notificacion=new notificacionVista();
 				$modelnotificacion->creararrayEmailDeportistas();
 				include("../Archivos/ArrayEmailDeportistas.php");
 				$datos=new consultar();
 				$form=$datos->array_consultar();
 				$modelnotificacion->arrayNotificacionesusuario($user);
 				$notificacion->crear($idioma,NULL,$form,$insertado);

 			  }else{

 			$notificacion=new notificacionVista();
 			$model->creararrayEmailusuarios();
 			include("../Archivos/ArrayEmailUsuarios.php");
 			$datos=new consultar();
 			$form=$datos->array_consultar();

 			$notificacion->crear($idioma,$aviso,$form,null);
 			  }
 			  
 			  }

 			  if(isset($_REQUEST['noti']))
 			  {

 			  	$idioma=new idiomas();
 			    $idnotificacion=$_REQUEST['noti'];
 			  	$model=new Notificacion();
 			  	$model->arraynotificiacionporid($idnotificacion);
 			  	include("../Archivos/ArrayNotificacionid.php");
 			  	$datos=new arrays();
 			  	$form=$datos->array_consultar();
 			  	$clase=new Notificacion_VIEW();
 			  	$clase->crear($idioma,$form);

 			  }

 			   if(isset($_REQUEST['Baja']))
 			  {
 			  $origen="Baja";
 			  $idioma=new idiomas();
 			  $id=$_REQUEST['Baja'];
 			  $model=new Notificacion();
 			  $model->eliminarnotificacion($id);
 			  if(isset($_SESSION['MONITOR'])){
 			  	$usuario=$_SESSION['MONITOR'];
 			  }else {
 			  	$usuario=$_SESSION['usuario'];
 			  }
 				$model->arrayNotificacionesusuario($usuario);
 				$model->arraynotificiacionporusuario($usuario);
 				include("../Archivos/ArrayNotificaciousuario.php");
 				$datos=new arrays();
 			  	$form=$datos->array_consultar();
 			  	$clase=new Notificacion_VIEW();
 			  	$clase->crear($idioma,$form);

 			  }

 			   if(isset($_REQUEST['mostrar']))
 			  {
 			  	
 			  	$idioma=new idiomas();
 			  	$model=new Notificacion();
 			  	if(isset($_SESSION['usuario']))
 			  	{
 			  		$usuario=$_SESSION['usuario'];
 				}else{
 					$usuario=$_SESSION['MONITOR'];
 				} 
 			  	$model->arraynotificiacionporusuario($usuario);
 			  	$model->arrayNotificacionesusuario($usuario);
 			  	include("../Archivos/ArrayNotificaciousuario.php");
 			  	$datos=new arrays();
 			  	$form=$datos->array_consultar();
 			  	$clase=new Notificacion_VIEW();
 			  	$clase->crear($idioma,$form);

 			  }

 			  if(isset($_REQUEST['borrartodo'])){

 			  	 $origen="Baja";
 			  	$idioma=new idiomas();
 			  	$model=new Notificacion();
 			  	$usuario="";
 			  	if(isset($_SESSION['usuario']))
 			  	{
 			  		$usuario=$_SESSION['usuario'];
 				}else{
 					$usuario=$_SESSION['MONITOR'];
 				} 
 			  	$model->eliminartodaslasnotificacionesUsuario($usuario);
 			  	$model->arraynotificiacionporusuario($usuario);
 			  	$model->arrayNotificacionesusuario($usuario);
 			  	include("../Archivos/ArrayNotificaciousuario.php");
 			  	$datos=new arrays();
 			  	$form=$datos->array_consultar();
 			 	$clase=new Notificacion_VIEW();
 			  	$clase->crear($idioma,$form);
 			  }

 			  
 		
?>