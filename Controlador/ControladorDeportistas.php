<?php 

	include("../Vistas/VistaPrincipalDeportista.php");
	include("../Modelos/DeportistasModelo.php");
	include("../Idiomas/idiomas.php");
	include("../Vistas/AltaDeportista.php");
	include("../Vistas/ModificarDeportista.php");
	session_start();		
	
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

			if(isset($_POST['Alta']) and !isset($_REQUEST['altaDeportista']))
			{
				$idiom=new idiomas();
				$clase=new deportistaAlta();
				$clase->crear($idiom);
			}
			if(isset($_REQUEST['altaDeportista'])){
				
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
					$password=md5($password);
					$model=new Deportista();
					$model->altaDeportista($nombre,$dni,$fechaNac,$email,$apellidos,$usuario,$telefono,$password,$tipo);
					$model->creararrayDeportistas();
					
					include("../Archivos/ArrayConsultar.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new deportistavista();
					$vista->crear($form,$idiom);

			}
			if (isset($_POST['Modificar']))
			{
				
				$idiom=new idiomas();
				$DNI=$_POST['dni'];
				$modificar=new deportistaModificar();
				$modificar->crear($idiom,$DNI);

			}
			if (isset($_POST['Eliminar']))
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
			if(isset($_POST['ModificarDeportista']))
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
					$password=md5($password);
					$model=new Deportista();
					$model->modificarDeportista($nombre,$dni,$fechanac,$email,$apellidos,$usuario,$telefono,$password,$tipo);
					$model->creararrayDeportistas();
					include("../Archivos/ArrayConsultar.php");
					$arra=new consult();
					$form=$arra->array_consultar();
					$vista=new deportistavista();
					$vista->crear($form,$idiom);

			}


?>