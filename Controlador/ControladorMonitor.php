<?php 
session_start();	
include("../Idiomas/idiomas.php");
include("../Modelos/MonitorModelo.php");
include("../Vistas/VistaPrincipalMonitor.php");
include("../Vistas/VistaAltaMonitor.php");
include("../Vistas/VistaModificarMonitor.php");
	


	if(isset($_REQUEST['monitores']))
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

			{	$alertadni="";
				$idiom=new idiomas();
				$clase=new monitorAlta();
				$clase->crear($idiom,null,null,$alertadni);
			}

			if(isset($_POST['altaMonitor'])){
							
					$idiom=new idiomas();
					$nombre=$_POST['Nombre'];
					$apellidos=$_POST['Apellidos'];
					$telefono=$_POST['Telefono'];
					$fechaNac=$_POST['FechaNac'];
					$dni=$_POST['DNI'];
					$email=$_POST['email'];
					$tipo=$_POST['TIPO'];
					$usuario=$_POST['Usuario'];
					$password=$_POST['Password'];
					$formatocorrecto="true";
       				$msg="";
       				$form1=array("nombre"=>"$nombre","apellidos"=>"$apellidos","telefono"=>"$telefono","dni"=>"$dni","email"=>"$email","usuario"=>"$usuario","password"=>"$password","fechaNac"=>"$fechaNac","tipo"=>"$tipo");
       				$model=new Monitor();
       				if(FALSE==$model->comprobardnimonitor($dni)){
       				if ($_FILES['foto']['size']>200000)
			        {$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo";
			        $formatocorrecto="false";}

			        if (!($_FILES['foto']['type'] =="image/jpeg" OR $_FILES['foto']['type'] =="image/gif"))
			        {
			        $msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos";
			        $formatocorrecto="false";}

			        if($formatocorrecto=="true"){

			        $foto=$_FILES['foto']['name'];
			        $ruta=$_FILES["foto"]["tmp_name"];
			        $destino="../Archivos/".$foto;
			        copy($ruta,$destino);
					$Password=md5($password);
					$model=new Monitor();
					$model->altaMonitor($nombre,$dni,$fechaNac,$email,$apellidos,$foto,$usuario,$telefono,$password,$tipo);
					//al hacer la inserccion volvemos a la vista principal.
					$model->creararrayMonitor();
					include("../Archivos/ArrayConsultarMonitor.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new monitorvista();
					$vista->crear($form,$idiom);
					}else{
						$alertadni="";
				$idiom=new idiomas();
				$clase=new monitorAlta();
				$clase->crear($idiom,$msg,$form1,$alertadni);
					}}else{
						$alertadni="dentro";
						$idiom=new idiomas();
						$clase=new monitorAlta();
						$clase->crear($idiom,$msg,$form1,$alertadni);

					}
				}
			if (isset($_POST['Modificar']))
			{
				
				$idiom=new idiomas();
				$nombre=$_POST['nombre'];
				$apellidos=$_POST['apellido'];
				$telefono=$_POST['telefono'];
				$email=$_POST['email'];
				$usuario=$_POST['usuario'];
				$dni=$_POST['dni'];
				$form1=array("nombre"=>"$nombre","apellidos"=>"$apellidos","telefono"=>"$telefono","dni"=>"$dni","email"=>"$email","usuario"=>"$usuario");
				$modificar=new monitorModificar();
				$modificar->crear($idiom,$form1,null);

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
					$formatocorrecto="true";
       				$msg="";
       				$form1=array("nombre"=>"$nombre","apellidos"=>"$Apellidos","telefono"=>"$Telefono","dni"=>"$DNI","email"=>"$email","usuario"=>"$Usuario");
       				if ($_FILES['foto']['size']>200000)
			        {$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo";
			        $formatocorrecto="false";}

			        if (!($_FILES['foto']['type'] =="image/jpeg" OR $_FILES['foto']['type'] =="image/gif"))
			        {
			        $msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos";
			        $formatocorrecto="false";}

			        if($formatocorrecto=="true"){

			        $foto=$_FILES['foto']['name'];
			        $ruta=$_FILES["foto"]["tmp_name"];
			        $destino="../Archivos/".$foto;
			        copy($ruta,$destino);
					$Password=md5($Password);
					$model=new Monitor();
					$model->modificarMonitor($nombre,$DNI,$FechaNac,$email,$Apellidos,$foto,$Usuario,$Telefono,$Password,$TIPO);
					$model->creararrayMonitor();
					include("../Archivos/ArrayConsultarMonitor.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new monitorvista();
					$vista->crear($form,$idiom);

					}else{
						$idiom=new idiomas();
						$modificar=new monitorModificar();
						$modificar->crear($idiom,$form1,$msg);
						}
					}
