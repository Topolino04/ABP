<?php 

include '../Vistas/VistapanelPrincipal.php';
include '../Idiomas/idiomas.php';
session_start();

		//viene desde el vinculo de la imagen de la bandera
		if (isset($_POST['idiomas']))
		{  			
				 $idiom=new idiomas();
				 $_SESSION['idioma']=$_POST['idiomas'];
				 $menu=new panel();
				 $menu->constructor($idiom);
		}
		//viene desde el index.php al pinchar en login
 		if(isset($_POST['login']) and isset($_POST['usuario']) and isset($_POST['password']))
 		{
 					$user=$_POST['usuario'];
 					$pass=$_POST['password'];

 				$idiom=new idiomas();
 				$menus=new panel();
 				$menus->constructor($idiom);
 		}

 	//viene de acceder del boton menu principal 
 	 	if(isset($_POST['principal']))
 	 		{
 	 			$idiom=new idiomas();
 	 			$menus=new panel();
 				$menus->constructor($idiom);
			}
			//viene de la imagen de la puerta para salir 
			if(isset($_POST['salir'])){
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