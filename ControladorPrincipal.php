<?php 

include '../Vistas/VistapanelPrincipal.php';
include '../Idiomas/idiomas.php';
include "../Modelos/DeportistasModelo.php";
include "../Modelos/MonitorModelo.php";
session_start();

		//viene desde el vinculo de la imagen de la bandera
		if (isset($_REQUEST['idiomas']))
		{  			
				 $idiom=new idiomas();
				 $_SESSION['idioma']=$_REQUEST['idiomas'];
				 $menu=new panel();
				 $menu->constructor($idiom);
		}
		//viene desde el index.php al pinchar en login
 		if(isset($_POST['login']) and isset($_POST['usuario']) and isset($_POST['password']))
 		{
 					$user=$_POST['usuario'];
 					$pass=$_POST['password'];
 					$pass=md5($pass);
 					$modelodeportista=new Deportista();
 					$resultado=$modelodeportista->comprobarDeportista($user,$pass);
 					$modelomonitor=new Monitor();
 					$resultado1=$modelomonitor->comprobarMonitor($user,$pass);
 				if($resultado==true){
 				$_SESSION['usuario']=$user;
 				$idiom=new idiomas();
 				$menus=new panel(); 
 				$menus->constructor($idiom);
 			}if($resultado1==true){
 				$_SESSION['MONITOR']=$user;
 				$idiom=new idiomas();
 				$menus=new panel(); 
 				$menus->constructor($idiom);
 			}
 			
 			/*if(!isset($_SESSION['usuario']))
 			{
 			 echo "<script> window.location=\".././index.php\"</script>";
 			}*/
 			
 		}
 	//viene de acceder del boton menu principal 
 	 	if(isset($_REQUEST['principal']))
 	 		{
 	 			$idiom=new idiomas();
 	 			$menus=new panel();
 				$menus->constructor($idiom);
			}
			//viene de la imagen de la puerta para salir 
			if(isset($_REQUEST['salir'])){
				session_destroy();
				echo "<script> window.location=\".././index.php\"</script>";
			}
			if(isset($_REQUEST['acceso'])){

				$idiom=new idiomas();
 				$menus=new panel();
 				$menus->constructor($idiom);
				}
				if(isset($_REQUEST['volver\\'])){
				$idiom=new idiomas();
 				$menus=new panel();
 				$menus->constructor($idiom);
				}
	
?>