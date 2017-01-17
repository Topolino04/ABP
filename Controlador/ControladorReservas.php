<?php
session_start();
include("../Vistas/VistaPrincipalReserva.php");
include("../Modelos/ReservaModelo.php");
include("../Idiomas/idiomas.php");
include("../Vistas/AltaReserva.php");
//include("../Vistas/ModificarReserva.php");
	

if( isset($_REQUEST['reservas']) or isset($_REQUEST['Volver']) ) 
{	
	$idiom=new idiomas();
	$reserva=new Reserva();		
	$reserva->creararrayReservas();
	$NombreDeportista=$reserva->crearArrayNombreDeportista();
	$formActividad=$reserva->creararrayActividades();
	$DatosEntrenadores=$reserva->getEntrenadores();
	$ObtenerEntrenadorActividad=$reserva->crearArrayGestionActividad();
	$reserva->RellenarArrayFinal($NombreDeportista,$formActividad,$DatosEntrenadores,$ObtenerEntrenadorActividad);
	//cargo el fichero final
    include("../Archivos/ArrayConsultarActividadesDeReserva.php");
    $datos=new consult();
    $formfinal=$datos->array_consultarActividades();
	$vista=new reservaVista();
	$vista->crear($formfinal,$idiom);
}
if(isset($_REQUEST['Alta'])) //Al hacer click en Crear Reserva
{
	$idiom=new idiomas();
	$vista=new reservaAlta(); //Llamada a la vista de alta
	$reserva=new Reserva();
	//Menus despelgables
	$listaDeportistas=$reserva->getDeportistas();
	$listActividades=$reserva->getActividades();
	$vista->crear($idiom,$listaDeportistas,$listActividades);
}
//Cuando se introducen los datos de la nueva reserva, al enviar el alta carga todas las reservas
if(isset($_REQUEST['altaReserva'])){
	$idiom=new idiomas();
	$deportistaId=$_POST['deportistaId'];
	$actividadId=$_POST['actividadId'];
	$fecha=$_POST['fecha'];


	
	$model=new Reserva();
	$reservasActuales=$model->getReservasActuales();
	include("../Archivos/ArrayConsultarReservasActuales.php");
	$FuncionFichero=new consultReservaActuales();
	$formReservas=$FuncionFichero->array_consultarReservasActuales();
	
	$ObtenerEntrenadorActividad=$model->crearArrayGestionActividad();

	for ($numarO=0;$numarO<count($ObtenerEntrenadorActividad);$numarO++){
		if($actividadId==$ObtenerEntrenadorActividad[$numarO]["actividadId"]){			
			$entrenadorId=$ObtenerEntrenadorActividad[$numarO]["entrenadorId"];	
			//var_dump($entrenadorId);	
		}
	}
	//Si existe alguna reserva compruba que el deportista no la haya reserva antes
	if(isset($formReservas[0]["deportistaId"])){//Existe alguna reserva?

        
        //$deportistadiferente=TRUE;

        for ($numarR=0;$numarR<count($formReservas);$numarR++){
            if( $formReservas[$numarR]["deportistaId"]==$deportistaId ){
                    $deportistadiferente=FALSE;
            }
        }

        /*if($deportistadiferente==TRUE){

            $model->altaReserva($deportistaId,$actividadId,$fecha);
            $model->altaAlumno($deportistaId,$actividadId,$entrenadorId,$fecha);
        }*/
        	$igual=FALSE;
        for ($numarR=0;$numarR<count($formReservas);$numarR++){
            
            if($formReservas[$numarR]["actividadId"]==$actividadId && $formReservas[$numarR]["deportistaId"]==$deportistaId)
            {
            	$igual=TRUE;

            }
        }
	if($igual==FALSE){

        $model->altaReserva($deportistaId,$actividadId,$fecha);
        $model->altaAlumno($deportistaId,$actividadId,$entrenadorId,$fecha);
    }
    if( $igual==TRUE){
        ?>
        <script>
            alert("Actividad ya reservada");
        </script>
        <?php
    }


	}else{

		$model->altaReserva($deportistaId,$actividadId,$fecha);
			//Inserta el alumno en la actividad despues de insertar la reserva
		$model->altaAlumno($deportistaId,$actividadId,$entrenadorId,$fecha);	
	}	
	
	$model->creararrayReservas();
	$NombreDeportista=$model->crearArrayNombreDeportista();
	$formActividad=$model->creararrayActividades();
	$DatosEntrenadores=$model->getEntrenadores();
	$ObtenerEntrenadorActividad=$model->crearArrayGestionActividad();
	$model->RellenarArrayFinal($NombreDeportista,$formActividad,$DatosEntrenadores,$ObtenerEntrenadorActividad);
	include("../Archivos/ArrayConsultarActividadesDeReserva.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarActividades();
	$vista=new reservaVista();
	$vista->crear($formfinal,$idiom);
}
/*if (isset($_POST['Modificar']))
{
	$idiom=new idiomas();			
	$deportistaId=$_POST['deportistaId'];
	$actividadId=$_POST['actividadId'];
	$fecha=$_POST['fecha'];
	$asistencia=$_POST['asistencia'];
	$modificar=new ReservaModificar();
	$modificar->crear($idiom,$deportistaId,$actividadId,$fecha,$asistencia);
}*/
if (isset($_POST['Eliminar']))
{
	$idiom=new idiomas();
	$deportistaId=$_POST['deportistaId'];
	$actividadId=$_POST['actividadId'];
	$AñoMesDia=$_POST['AñoMesDia'];
	$HoraMinutos=$_POST['HoraMinutos'];
	$fecha = $_POST['AñoMesDia'] . ' ' . $_POST['HoraMinutos'];
	//$asistencia=$_POST['asistencia'];
	$model=new Reserva();
	$model->eliminarReserva($deportistaId,$actividadId,$fecha);

	$ObtenerActividad=$model->crearArrayGestionActividad();
	$dentro=FALSE;
	for ($numarO=0;$numarO<count($ObtenerActividad);$numarO++){
		if($actividadId==$ObtenerActividad[$numarO]["actividadId"]){			
            $dentro=TRUE;
		}
	}
	if($dentro==TRUE){
    $model->eliminarAlumnodeActividad($deportistaId,$actividadId);
    }
    $model->creararrayReservas();
	$NombreDeportista=$model->crearArrayNombreDeportista();
	$formActividad=$model->creararrayActividades();
	$DatosEntrenadores=$model->getEntrenadores();
	$ObtenerEntrenadorActividad=$model->crearArrayGestionActividad();
	$model->RellenarArrayFinal($NombreDeportista,$formActividad,$DatosEntrenadores,$ObtenerEntrenadorActividad);
	include("../Archivos/ArrayConsultarActividadesDeReserva.php");
	$datos=new consult();
	$formfinal=$datos->array_consultarActividades();
	$vista=new reservaVista();
	$vista->crear($formfinal,$idiom);	
}

if(isset($_POST['ModificarReserva']))
{
	$idiom=new idiomas();
	$deportistaId=$_POST['deportistaId'];
	$actividadId=$_POST['actividadId'];
	$fecha=$_POST['fecha'];
	$asistencia=$_POST['asistencia'];
	$model=new Reserva();
	$model->modificarReserva($deportistaId,$actividadId,$fecha,$asistencia);
	$model->creararrayReservas();
	include("../Archivos/ArrayConsultarReserva.php");
	$arra=new consultreserva();
	$form=$arra->array_consultarReserva();
	$vista=new reservavista();
	$vista->crear($form,$idiom);
}
?>