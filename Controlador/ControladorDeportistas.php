<?php 
session_start();
	include("../Vistas/VistaPrincipalDeportista.php");
	include("../Modelos/DeportistasModelo.php");
	include("../Idiomas/idiomas.php");
	include("../Vistas/AltaDeportista.php");
	include("../Vistas/ModificarDeportista.php");
			
			if(isset($_REQUEST['deportistas']))
			{
				$idiom=new idiomas();
				$deportista=new Deportista();
				$deportista->contructor();
				$deportista->creararrayDeportistas();
				include("../Archivos/ArrayConsultar.php");
				$arra=new consult();
				$form=$arra->array_consultar();
				$vista=new deportistavista();
				$vista->crear($form,$idiom);
			}

			if(isset($_REQUEST['Alta']) and !isset($_REQUEST['altaDeportista']))
			{	
				$alerta="";
				$idiom=new idiomas();
				$clase=new deportistaAlta();
				$clase->crear($idiom,null,null,$alerta);
			}
			if(isset($_REQUEST['altaDeportista'])){

					$alertadni="";
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

       				$model=new Deportista();
       				if(FALSE==$model->comprobardnideportista($dni)){

       				if ($_FILES['foto']['size']>200000)
			        {$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo";
			        $formatocorrecto="false";}

			        if (!($_FILES['foto']['type'] =="image/jpeg" OR $_FILES['foto']['type'] =="image/gif"))
			        {
			        $msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos";
			        $formatocorrecto="false";}

			        if($formatocorrecto=="true"){
					
			         //foto
			        $foto=$_FILES['foto']['name'];
			        $ruta=$_FILES["foto"]["tmp_name"];
			        $destino="../Archivos/".$foto;
			        copy($ruta,$destino);
					$password=md5($password);
					$model=new Deportista();
					$model->altaDeportista($nombre,$dni,$fechaNac,$email,$apellidos,$foto,$usuario,$telefono,$password,$tipo);
					$model->creararrayDeportistas();
					include("../Archivos/ArrayConsultar.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new deportistavista();
					$vista->crear($form,$idiom);

					}else{
						$alertadni="";
						$clase=new deportistaAlta();
						$clase->crear($idiom,$msg,$form1,$alertadni);

					}}else{
						$alertadni="dentro";
						$idiom=new idiomas();
						$clase=new deportistaAlta();
						$clase->crear($idiom,$msg,$form1,$alertadni);
					}
			}
			if (isset($_REQUEST['Modificar']))
			{
				$idiom=new idiomas();
				$dni=$_POST['dni'];
				$nombre=$_POST['nombre'];
				$apellidos=$_POST['apellido'];
				$telefono=$_POST['telefono'];
				$email=$_POST['email'];
				$usuario=$_POST['usuario'];
				$fecha=$_POST['fecha'];
				$form1=array("nombre"=>"$nombre","apellidos"=>"$apellidos","telefono"=>"$telefono","dni"=>"$dni","email"=>"$email","usuario"=>"$usuario","fecha"=>"$fecha");
				$modificar=new deportistaModificar();

				$modificar->crear($idiom,$form1,null);

			}
			if (isset($_REQUEST['Eliminar']))
			{
				$idiom=new idiomas();
				$DNI=$_POST['dni'];
				$model=new Deportista();
				$model->eliminarDeportista($DNI);
				$model->creararrayDeportistas();
				include("../Archivos/ArrayConsultar.php");
				$arra=new consult();
				$form=$arra->array_consultar();
				$vista=new deportistavista();
				$vista->crear($form,$idiom);

			}
			if(isset($_REQUEST['ModificarDeportista']))
			{
					$idiom=new idiomas();
					$nombre=$_POST['Nombre'];
					$apellidos=$_POST['Apellidos'];
					$telefono=$_POST['Telefono'];
					$fechanac=$_POST['FechaNac'];
					$dni=$_POST['DNI'];
					$email=$_POST['email'];
					$tipo=$_POST['TIPO'];
					$usuario=$_POST['Usuario'];
					$password=$_POST['Password'];
					$formatocorrecto="true";
       				$msg="";
       				$form1=array("nombre"=>"$nombre","apellidos"=>"$apellidos","telefono"=>"$telefono","dni"=>"$dni","email"=>"$email","usuario"=>"$usuario","fecha"=>"$fechanac");
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
					$password=md5($password);
					$model=new Deportista();
					$model->modificarDeportista($nombre,$dni,$fechanac,$email,$apellidos,$foto,$usuario,$telefono,$password,$tipo);
					$model->creararrayDeportistas();
					include("../Archivos/ArrayConsultar.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new deportistavista();
					$vista->crear($form,$idiom);

					}else{
				$idiom=new idiomas();
				$modificar=new deportistaModificar();
				$modificar->crear($idiom,$form1,$msg);
					
				}
				}

			


?>