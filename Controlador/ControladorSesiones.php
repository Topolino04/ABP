<?php 

	include("../Vistas/VistaPrincipalSesion.php");
	include("../Modelos/SesionModelo.php");
	include("../Idiomas/idiomas.php");
	include("../Vistas/AltaSesion.php");
	include("../Vistas/ModificarSesion.php");
	session_start();

			if(isset($_REQUEST['sesiones']))
			{
				$idiom=new idiomas();
				$sesion=new Sesion();
				
				//$listablas=$sesion->getNombreTablas();
				//$sesion->contructor();

				$sesion->creararraySesiones();
				include("../Archivos/ArrayConsultarSesiones.php");
				$arra=new consultSesion();
				$form=$arra->array_consultarSesiones();

				//creo elarray con lassesiones y las tablas de ejercicios.
				$file = fopen("../Archivos/ArrayConsultartablasyejerciciosdeunasesion.php", "w");
				fwrite($file,"<?php class consult { function array_consultar12(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);

				for ($numarT=0;$numarT<count($form);$numarT++){

						$tabla=$form[$numarT]["tabla"];
						$deportista=$form[$numarT]["deportista"];
						$fecha=$form[$numarT]["fecha"];
						$comentario=$form[$numarT]["comentario"];
						//Variables para mostrar el nombre del deportista y los ejercicios
						$NombreDeportista=$sesion->crearArrayNombreDeportista($deportista);
						$formejercicios=$sesion->creararrayTabla($tabla);
						

						//cargamos el fichero de ejerciciosde la tabla.				
					
						fwrite($file,"array(\"tabla\"=>'$tabla',\"deportista\"=>'$deportista',\"fecha\"=>'$fecha',\"comentario\"=>'$comentario'," . PHP_EOL);

						//Nombre de ususario		
						$usuario=$NombreDeportista[0]["usuario"];
						fwrite($file,"\"usuario"."\"=>'$usuario'," . PHP_EOL);

						//Lista de ejercicios con su nombre
						if($formejercicios!=null){ 

							for ($numar =0;$numar<count($formejercicios);$numar++){
								
								
								$idejercicio=$formejercicios[$numar]["IdEjercicio"];
								fwrite($file,"\"idejercicio".$numar."\"=>'$idejercicio'," . PHP_EOL);	
						

							$DatosEjercicio=$sesion->crearArrayDatosEjercicio();	
								if($DatosEjercicio!=null){ 
						
									$nombre=$DatosEjercicio[$numar]["Nombre"];
									$tipo=$DatosEjercicio[$numar]["tipo"];
									$tiempo=$DatosEjercicio[$numar]["tiempo"];
									$repeticiones=$DatosEjercicio[$numar]["repeticiones"];
									$peso=$DatosEjercicio[$numar]["peso"];
									$series=$DatosEjercicio[$numar]["series"];
									$descripcion=$DatosEjercicio[$numar]["descripcion"];
									
									
									fwrite($file,"\"Nombre".$numar."\"=>'$nombre',
										\"Tipo".$numar."\"=>'$tipo',
										\"Tiempo".$numar."\"=>'$tiempo',
										\"Repeticiones".$numar."\"=>'$repeticiones',
										\"Peso".$numar."\"=>'$peso',
										\"Series".$numar."\"=>'$series',
										\"Descripcion".$numar."\"=>'$descripcion'," . PHP_EOL);
									}
										
								
								}							
							
						}
						fwrite($file,")," . PHP_EOL);


		 		}
		 		fwrite($file,");return \$form;}}?>". PHP_EOL);
				fclose($file);
				 //fichero creado

				 //cargo el fichero final
				 include("../Archivos/ArrayConsultartablasyejerciciosdeunasesion.php");
				 $datos=new consult();
				 $formfinal=$datos->array_consultar12();
				$vista=new sesionVista();
				$vista->crear($formfinal,$idiom);
			}

			if(isset($_POST['Alta']))
			{
				$idiom=new idiomas();			
				$vista=new sesionAlta();
				$sesion=new Sesion();
				$listaDeportistas=$sesion->getDeportistas();
				$listablas=$sesion->gettablas();
				$vista->crear($idiom,$listaDeportistas,$listablas);
				
			}

			if(isset($_POST['altaSesion'])){
				
					$idiom=new idiomas();												
					$deportista=$_POST['deportista'];
					//echo $deportista;
					//$fecha=$_POST['fecha'];
					
					$comentario=$_POST['comentario'];
					//echo $comentario;
					$tabla=$_POST['tabla'];
					//echo $tabla;
					
					$sesion=new Sesion();
					
					$sesion->altaSesion($deportista,$comentario,$tabla);
					//cargo todo de nuevo
					$sesion->creararraySesiones();
				include("../Archivos/ArrayConsultarSesiones.php");
				$arra=new consultSesion();
				$form=$arra->array_consultarSesiones();

				//creo elarray con lassesiones y las tablas de ejercicios.
				$file = fopen("../Archivos/ArrayConsultartablasyejerciciosdeunasesion.php", "w");
				fwrite($file,"<?php class consult { function array_consultar12(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);

				for ($numarT =0;$numarT<count($form);$numarT++){

						$tabla=$form[$numarT]["tabla"];
						$deportista=$form[$numarT]["deportista"];
						$fecha=$form[$numarT]["fecha"];
						$comentario=$form[$numarT]["comentario"];
						$formejercicios=$sesion->creararrayTabla($tabla);
						$NombreDeportista=$sesion->crearArrayDeportista($deportista);
						//cargamos el fichero de ejerciciosde la tabla.
						
						//
						//
						//var_dump($formejercicios);
						fwrite($file,"array(\"tabla\"=>'$tabla',\"deportista\"=>'$deportista',\"fecha\"=>'$fecha',\"comentario\"=>'$comentario'," . PHP_EOL);

						$usuario=$NombreDeportista[0]["usuario"];
						fwrite($file,"\"usuario"."\"=>'$usuario'," . PHP_EOL);


						//Lista de ejercicios con su nombre
						if($formejercicios!=null){ 

							for ($numar =0;$numar<count($formejercicios);$numar++){
								
								
								$idejercicio=$formejercicios[$numar]["IdEjercicio"];
								fwrite($file,"\"idejercicio".$numar."\"=>'$idejercicio'," . PHP_EOL);	
						

							$DatosEjercicio=$sesion->crearArrayDatosEjercicio();	
								if($DatosEjercicio!=null){ 
						
									$nombre=$DatosEjercicio[$numar]["Nombre"];
									$tipo=$DatosEjercicio[$numar]["tipo"];
									$tiempo=$DatosEjercicio[$numar]["tiempo"];
									$repeticiones=$DatosEjercicio[$numar]["repeticiones"];
									$peso=$DatosEjercicio[$numar]["peso"];
									$series=$DatosEjercicio[$numar]["series"];
									$descripcion=$DatosEjercicio[$numar]["descripcion"];
									
									
									fwrite($file,"\"Nombre".$numar."\"=>'$nombre',
										\"Tipo".$numar."\"=>'$tipo',
										\"Tiempo".$numar."\"=>'$tiempo',
										\"Repeticiones".$numar."\"=>'$repeticiones',
										\"Peso".$numar."\"=>'$peso',
										\"Series".$numar."\"=>'$series',
										\"Descripcion".$numar."\"=>'$descripcion'," . PHP_EOL);
									}
										
								
								}							
							
						}
						fwrite($file,")," . PHP_EOL);

		 		}
		 		fwrite($file,");return \$form;}}?>". PHP_EOL);
				fclose($file);

				 //fichero creado
					//cargo el fichero final
				 include("../Archivos/ArrayConsultartablasyejerciciosdeunasesion.php");
				 $datos=new consult();
				 $formfinal=$datos->array_consultar12();

					$vista=new sesionVista();
					$vista->crear($formfinal,$idiom);

			}
			if (isset($_POST['Modificar']))
			{
				
				$idiom=new idiomas();
				$deportista=$_POST['deportista'];				
				$fecha=$_POST['fecha'];
				$comentario=$_POST['comentario'];
				$tabla=$_POST['tabla'];
				$modificar=new sesionModificar();
				$modificar->crear($idiom,$deportista,$fecha,$comentario);
			}
			if (isset($_POST['Eliminar']))
			{
				$idiom=new idiomas();
				$deportista=$_POST['deportista'];
				$tabla=$_POST['tabla'];
				$sesion=new Sesion();
				$sesion->eliminarSesion($deportista,$tabla);				
				$sesion->creararraySesiones();
				include("../Archivos/ArrayConsultarSesiones.php");
				$arra=new consultSesion();
				$form=$arra->array_consultarSesiones();

				//creo elarray con lassesiones y las tablas de ejercicios.
				$file = fopen("../Archivos/ArrayConsultartablasyejerciciosdeunasesion.php", "w");
				fwrite($file,"<?php class consult { function array_consultar12(){". PHP_EOL);
				 	fwrite($file,"\$form=array(" . PHP_EOL);

				for ($numarT=0;$numarT<count($form);$numarT++){

						$tabla=$form[$numarT]["tabla"];
						$deportista=$form[$numarT]["deportista"];
						$fecha=$form[$numarT]["fecha"];
						$comentario=$form[$numarT]["comentario"];
						$NombreDeportista=$sesion->crearArrayDeportista($deportista);
						$formejercicios=$sesion->creararrayTabla($tabla);

						//cargamos el fichero de ejerciciosde la tabla.				
					
						fwrite($file,"array(\"tabla\"=>'$tabla',\"deportista\"=>'$deportista',\"fecha\"=>'$fecha',\"comentario\"=>'$comentario'," . PHP_EOL);

						//if($NombreDeportista!=null){ 

							//for ($numar =0;$numar<count($NombreDeportista);$numar++){
								
							$usuario=$NombreDeportista[0]["usuario"];
							fwrite($file,"\"usuario"."\"=>'$usuario'," . PHP_EOL);
							//}
						//}

						//Lista de ejercicios con su nombre
						if($formejercicios!=null){ 

							for ($numar =0;$numar<count($formejercicios);$numar++){
								
								
								$idejercicio=$formejercicios[$numar]["IdEjercicio"];
								fwrite($file,"\"idejercicio".$numar."\"=>'$idejercicio'," . PHP_EOL);	
						

							$DatosEjercicio=$sesion->crearArrayDatosEjercicio();	
								if($DatosEjercicio!=null){ 
						
									$nombre=$DatosEjercicio[$numar]["Nombre"];
									$tipo=$DatosEjercicio[$numar]["tipo"];
									$tiempo=$DatosEjercicio[$numar]["tiempo"];
									$repeticiones=$DatosEjercicio[$numar]["repeticiones"];
									$peso=$DatosEjercicio[$numar]["peso"];
									$series=$DatosEjercicio[$numar]["series"];
									$descripcion=$DatosEjercicio[$numar]["descripcion"];
									
									
									fwrite($file,"\"Nombre".$numar."\"=>'$nombre',
										\"Tipo".$numar."\"=>'$tipo',
										\"Tiempo".$numar."\"=>'$tiempo',
										\"Repeticiones".$numar."\"=>'$repeticiones',
										\"Peso".$numar."\"=>'$peso',
										\"Series".$numar."\"=>'$series',
										\"Descripcion".$numar."\"=>'$descripcion'," . PHP_EOL);
									}
										
								
								}							
							
						}
						fwrite($file,")," . PHP_EOL);


		 		}
		 		fwrite($file,");return \$form;}}?>". PHP_EOL);
				fclose($file);
				 //fichero creado

				 //cargo el fichero final
				 include("../Archivos/ArrayConsultartablasyejerciciosdeunasesion.php");
				 $datos=new consult();
				 $formfinal=$datos->array_consultar12();
				$vista=new sesionVista();
				$vista->crear($formfinal,$idiom);
			}
			if(isset($_POST['ModificarSesion']))
			{
					$idiom=new idiomas();
					$deportista=$_POST['deportista'];					
					$fecha=$_POST['fecha'];
					$comentario=$_POST['comentario'];
					$tabla=$_POST['tabla'];
					$model=new Sesion();
					$model->modificarSesion($deportista,$fecha,$comentario,$tabla);
					$model->creararraySesiones();
					include("../Archivos/ArrayConsultarSesiones.php");
					$arra=new consultsesion();
					$form=$arra->array_consultarSesiones();
					$vista=new sesionVista();
					$vista->crear($form,$idiom);
			}


?>
