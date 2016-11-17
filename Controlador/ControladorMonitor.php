<?php 

include("../Idiomas/idiomas.php");
include("../Modelos/MonitorModelo.php");
include("../Vistas/VistaPrincipalMonitor.php");
include("../Vistas/VistaALtaMonitor.php");
include("../Vistas/VistaModificarMonitor.php");
	session_start();		


	if(isset($_POST['monitores']))
			{
				$idiom=new idiomas();
				$monitor=new Monitor();
				$monitor->contructor();
				$monitor->creararrayMonitor();
				include("../Archivos/ArrayConsultarMonitor.php");
				$arra=new consult();
				$form=$arra->array_consultar();
				$vista=new monitorvista();
				$vista->crear($form,$idiom);
			}


			if(isset($_POST['Alta']))
			{
				$idiom=new idiomas();
				$clase=new monitorAlta();
				$clase->crear($idiom);
			}
			if(isset($_POST['altaMonitor'])){
				
					$idiom=new idiomas();
					$nombre=$_POST['Nombre'];
					$Apellidos=$_POST['Apellidos'];
					$Telefono=$_POST['Telefono'];
					$FechaNac=$_POST['FechaNac'];
					$DNI=$_POST['DNI'];
					$email=$_POST['email'];
					$TIPO=$_POST['TIPO'];
					$Usuario=$_POST['Usuario'];
					$Password=$_POST['Password'];
					$model=new Monitor();
					$model->altaMonitor($nombre,$DNI,$FechaNac,$email,$Apellidos,$Usuario,$Telefono,$Password,$TIPO);
					$model->creararrayMonitor();
					include("../Archivos/ArrayConsultarMonitor.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new monitorvista();
					$vista->crear($form,$idiom);

			}
			if (isset($_POST['Modificar']))
			{
				
				$idiom=new idiomas();
				$DNI=$_POST['dni'];
				$modificar=new monitorModificar();
				$modificar->crear($idiom,$DNI);

			}
			if (isset($_POST['Eliminar']))
			{
				$idiom=new idiomas();
				$DNI=$_POST['dni'];
				$model=new Monitor();
				$model->eliminarMonitor($DNI);
				$model->creararrayMonitor();
				include("../Archivos/ArrayConsultarMonitor.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new monitorvista();
					$vista->crear($form,$idiom);


			}
			if(isset($_POST['ModificarMonitor']))
			{
					$idiom=new idiomas();
					$nombre=$_POST['Nombre'];
					$Apellidos=$_POST['Apellidos'];
					$Telefono=$_POST['Telefono'];
					$FechaNac=$_POST['FechaNac'];
					$DNI=$_POST['DNI'];
					$email=$_POST['email'];
					$TIPO=$_POST['TIPO'];
					$Usuario=$_POST['Usuario'];
					$Password=$_POST['Password'];
					$model=new Monitor();
					$model->modificarMonitor($nombre,$DNI,$FechaNac,$email,$Apellidos,$Usuario,$Telefono,$Password,$TIPO);
					$model->creararrayMonitor();
					include("../Archivos/ArrayConsultarMonitor.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new monitorvista();
					$vista->crear($form,$idiom);

			}