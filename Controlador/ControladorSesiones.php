<?php 
session_start();
//Muestra la sesion
/*foreach ($_SESSION as $index => $value) {
    echo __FILE__ . __LINE__ . " $index: $value<br>";
}*/	
include("../Vistas/VistaPrincipalSesion.php");
include("../Modelos/SesionModelo.php");
include("../Idiomas/idiomas.php");
include("../Vistas/AltaSesion.php");
include("../Vistas/ModificarSesion.php");

////////////////////////////////////VISTA PRINCIPAL///////////////////////////////
if(isset($_REQUEST['sesiones']) or isset($_REQUEST['Volver']))
{
$idiom=new idiomas();
$sesion=new Sesion();

$sesion->creararraySesiones();

include("../Archivos/ArrayConsultarSesiones.php");
$arra=new consultSesion();
$form=$arra->array_consultarSesiones();

//creo el array con las sesiones y las tablas de ejercicios.
$file = fopen("../Archivos/ArrayConsultartablasyejerciciosdeunasesion.php", "w");
fwrite($file,"<?php class consult { function array_consultar12(){". PHP_EOL);
	fwrite($file,"\$form=array(" . PHP_EOL);

for ($numarT=0;$numarT<count($form);$numarT++){

	$tabla=$form[$numarT]["tabla"];
	$deportista=$form[$numarT]["deportista"];
	$fecha=$form[$numarT]['fecha'];
	//$fecha=preg_replace('[\s+]',"", $fechaO);			
	$comentario=$form[$numarT]['comentario'];
	//$comentario=preg_replace('[\s+]',"", $comentario1);
		
	//Variables para mostrar el nombre del deportista y los ejercicios
	$NombreDeportista=$sesion->crearArrayNombreDeportista($deportista);
	$formejercicios=$sesion->creararrayTabla($tabla);
	$NTabla=$sesion->gettablas($tabla);
	

	//cargamos el fichero de ejerciciosde la tabla.				

	fwrite($file,"array(\"tabla\"=>'$tabla',\"deportista\"=>'$deportista',\"fecha\"=>'$fecha',\"comentario\"=>'$comentario'," . PHP_EOL);

	//Nombre tabla
	if (isset($NTabla)){
			//Datos tabla Entrenador Actividad
			for ($numarC=0;$numarC<count($NTabla);$numarC++){
				if($tabla==$NTabla[$numarC]["idtabla"]){				
				$NombreTabla=$NTabla[$numarC]["nombre"];				
				fwrite($file,"
						\"NombreTabla\"=>'$NombreTabla',						
						" . PHP_EOL);				
				}
			}
		}	
	//Nombre de usuario		
	$usuario=$NombreDeportista[0]["usuario"];
	fwrite($file,"
		\"usuario"."\"=>'$usuario'," . PHP_EOL);

	//Lista de ejercicios con su nombre
	if($formejercicios!=null){ 

		for ($numar =0;$numar<count($formejercicios);$numar++){
			
			
			$idejercicio=$formejercicios[$numar]["IdEjercicio"];
			fwrite($file,"
				\"idejercicio".$numar."\"=>'$idejercicio'," . PHP_EOL);	
	

			$DatosEjercicio=$sesion->crearArrayDatosEjercicio();	
			if($DatosEjercicio!=null){ 
	
				$nombre=$DatosEjercicio[$numar]["Nombre"];
				$tipo=$DatosEjercicio[$numar]["tipo"];
				$tiempo=$DatosEjercicio[$numar]["tiempo"];
				$repeticiones=$DatosEjercicio[$numar]["repeticiones"];
				$peso=$DatosEjercicio[$numar]["peso"];
				$series=$DatosEjercicio[$numar]["series"];
				$descripcion=$DatosEjercicio[$numar]["descripcion"];
				
				
				fwrite($file,"
					\"Nombre".$numar."\"=>'$nombre',
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
////////////////////////////////////VISTA ALTA///////////////////////////////
if(isset($_REQUEST['Alta'])) //Cuando se hace click en el + dentro de la vista principal de sesion
{
	$idiom=new idiomas();		
	$vista=new sesionAlta();
	$sesion=new Sesion();
	//Menus despegables
	$listaDeportistas=$sesion->getDeportistas();
	$listablas=$sesion->gettablas();
	$vista->crear($idiom,$listaDeportistas,$listablas);
	
}
/////////////////////////////////////////INSERTAR//////////////////////////////////////////////
//Cuando se introducen los datos de la nueva sesion, al enviar el alta carga todas las sesiones
if(isset($_REQUEST['altaSesion'])){ 
	
	$idiom=new idiomas();												
	$deportista=$_POST['deportista'];					
	$comentario=$_POST['comentario'];
	$tabla=$_POST['tabla'];

	$sesion=new Sesion();
	$sesion->altaSesion($deportista,$comentario,$tabla);
	//cargo todo de nuevo
	$sesion->creararraySesiones();
	include("../Archivos/ArrayConsultarSesiones.php");
	$arra=new consultSesion();
	$form=$arra->array_consultarSesiones();

	//creo el array con las sesiones y las tablas de ejercicios.
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
	$NTabla=$sesion->gettablas($tabla);
	

	//cargamos el fichero de ejerciciosde la tabla.				

	fwrite($file,"array(\"tabla\"=>'$tabla',\"deportista\"=>'$deportista',\"fecha\"=>'$fecha',\"comentario\"=>'$comentario'," . PHP_EOL);

	//Nombre tabla
	if (isset($NTabla)){
			//Datos tabla Entrenador Actividad
			for ($numarC=0;$numarC<count($NTabla);$numarC++){
				if($tabla==$NTabla[$numarC]["idtabla"]){				
				$NombreTabla=$NTabla[$numarC]["nombre"];				
				fwrite($file,"
						\"NombreTabla\"=>'$NombreTabla',						
						" . PHP_EOL);				
				}
			}
		}	
	//Nombre de usuario		
	$usuario=$NombreDeportista[0]["usuario"];
	fwrite($file,"
		\"usuario"."\"=>'$usuario'," . PHP_EOL);

	//Lista de ejercicios con su nombre
	if($formejercicios!=null){ 

		for ($numar =0;$numar<count($formejercicios);$numar++){
			
			
			$idejercicio=$formejercicios[$numar]["IdEjercicio"];
			fwrite($file,"
				\"idejercicio".$numar."\"=>'$idejercicio'," . PHP_EOL);	
	

			$DatosEjercicio=$sesion->crearArrayDatosEjercicio();	
			if($DatosEjercicio!=null){ 
	
				$nombre=$DatosEjercicio[$numar]["Nombre"];
				$tipo=$DatosEjercicio[$numar]["tipo"];
				$tiempo=$DatosEjercicio[$numar]["tiempo"];
				$repeticiones=$DatosEjercicio[$numar]["repeticiones"];
				$peso=$DatosEjercicio[$numar]["peso"];
				$series=$DatosEjercicio[$numar]["series"];
				$descripcion=$DatosEjercicio[$numar]["descripcion"];
				
				
				fwrite($file,"
					\"Nombre".$numar."\"=>'$nombre',
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
////////////////////////////////////////VISTA MODIFICAR///////////////////////////////////////////////////
if (isset($_REQUEST['Modificar'])) //Cuando se muestra la sesion a modificar
{				
	$idiom=new idiomas();
	$deportista=$_POST['deportista'];				
	$fecha=$_POST['fecha'];
	$comentario=$_POST['comentario'];
	$tabla=$_POST['tabla'];
	$form1=array("deportista"=>"$deportista","fecha"=>"$fecha","comentario"=>"$comentario","tabla"=>"$tabla");
	$sesion=new Sesion();
	$listaDeportistas=$sesion->getDeportistas();
	$listablas=$sesion->gettablas();
	$vista=new sesionModificar();
	$vista->crear($idiom,$form1,$listaDeportistas,$listablas);
}
////////////////////////////////////////ELIMINAR//////////////////////////////////////
if (isset($_REQUEST['eliminar']))
{
	$idiom=new idiomas();
	$deportista=$_POST['deportista'];
	$tabla=$_POST['tabla'];
	$fecha=$_POST['fecha'];
	//$comentario=$_POST['comentario'];
	var_dump($deportista);
	var_dump($tabla);
	var_dump($fecha);
	
	$sesion=new Sesion();
	$sesion->eliminarSesion($deportista,$tabla,$fecha);				
	$sesion->creararraySesiones();
	include("../Archivos/ArrayConsultarSesiones.php");
$arra=new consultSesion();
$form=$arra->array_consultarSesiones();

//creo el array con las sesiones y las tablas de ejercicios.
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
	$NTabla=$sesion->gettablas($tabla);
	

	//cargamos el fichero de ejerciciosde la tabla.				

	fwrite($file,"array(\"tabla\"=>'$tabla',\"deportista\"=>'$deportista',\"fecha\"=>'$fecha',\"comentario\"=>'$comentario'," . PHP_EOL);

	//Nombre tabla
	if (isset($NTabla)){
			//Datos tabla Entrenador Actividad
			for ($numarC=0;$numarC<count($NTabla);$numarC++){
				if($tabla==$NTabla[$numarC]["idtabla"]){				
				$NombreTabla=$NTabla[$numarC]["nombre"];				
				fwrite($file,"
						\"NombreTabla\"=>'$NombreTabla',						
						" . PHP_EOL);				
				}
			}
		}	
	//Nombre de usuario		
	$usuario=$NombreDeportista[0]["usuario"];
	fwrite($file,"
		\"usuario"."\"=>'$usuario'," . PHP_EOL);

	//Lista de ejercicios con su nombre
	if($formejercicios!=null){ 

		for ($numar =0;$numar<count($formejercicios);$numar++){
			
			
			$idejercicio=$formejercicios[$numar]["IdEjercicio"];
			fwrite($file,"
				\"idejercicio".$numar."\"=>'$idejercicio'," . PHP_EOL);	
	

			$DatosEjercicio=$sesion->crearArrayDatosEjercicio();	
			if($DatosEjercicio!=null){ 
	
				$nombre=$DatosEjercicio[$numar]["Nombre"];
				$tipo=$DatosEjercicio[$numar]["tipo"];
				$tiempo=$DatosEjercicio[$numar]["tiempo"];
				$repeticiones=$DatosEjercicio[$numar]["repeticiones"];
				$peso=$DatosEjercicio[$numar]["peso"];
				$series=$DatosEjercicio[$numar]["series"];
				$descripcion=$DatosEjercicio[$numar]["descripcion"];
				
				
				fwrite($file,"
					\"Nombre".$numar."\"=>'$nombre',
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
/////////////////////////////////MODIFICAR/////////////////////////////////////////////
if(isset($_REQUEST['ModificarSesion'])) //Cuando se cubren los campos al modificar
{
	$idiom=new idiomas();
	$deportista=$_POST['deportista'];					
	$fecha=$_POST['fecha'];
	$comentario=$_POST['comentario'];
	$tabla=$_POST['Tabla'];

	$sesion=new Sesion();
	$sesion->modificarSesion($deportista,$fecha,$comentario,$tabla);
	$sesion->creararraySesiones();	
	include("../Archivos/ArrayConsultarSesiones.php");
	$arra=new consultSesion();
	$form=$arra->array_consultarSesiones();

//creo el array con las sesiones y las tablas de ejercicios.
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
	$NTabla=$sesion->gettablas($tabla);
	

	//cargamos el fichero de ejerciciosde la tabla.				

	fwrite($file,"array(\"tabla\"=>'$tabla',\"deportista\"=>'$deportista',\"fecha\"=>'$fecha',\"comentario\"=>'$comentario'," . PHP_EOL);

	//Nombre tabla
	if (isset($NTabla)){
			//Datos tabla Entrenador Actividad
			for ($numarC=0;$numarC<count($NTabla);$numarC++){
				if($tabla==$NTabla[$numarC]["idtabla"]){				
				$NombreTabla=$NTabla[$numarC]["nombre"];				
				fwrite($file,"
						\"NombreTabla\"=>'$NombreTabla',						
						" . PHP_EOL);				
				}
			}
		}	
	//Nombre de usuario		
	$usuario=$NombreDeportista[0]["usuario"];
	fwrite($file,"
		\"usuario"."\"=>'$usuario'," . PHP_EOL);

	//Lista de ejercicios con su nombre
	if($formejercicios!=null){ 

		for ($numar =0;$numar<count($formejercicios);$numar++){
			
			
			$idejercicio=$formejercicios[$numar]["IdEjercicio"];
			fwrite($file,"
				\"idejercicio".$numar."\"=>'$idejercicio'," . PHP_EOL);	
	

			$DatosEjercicio=$sesion->crearArrayDatosEjercicio();	
			if($DatosEjercicio!=null){ 
	
				$nombre=$DatosEjercicio[$numar]["Nombre"];
				$tipo=$DatosEjercicio[$numar]["tipo"];
				$tiempo=$DatosEjercicio[$numar]["tiempo"];
				$repeticiones=$DatosEjercicio[$numar]["repeticiones"];
				$peso=$DatosEjercicio[$numar]["peso"];
				$series=$DatosEjercicio[$numar]["series"];
				$descripcion=$DatosEjercicio[$numar]["descripcion"];
				
				
				fwrite($file,"
					\"Nombre".$numar."\"=>'$nombre',
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
?>
