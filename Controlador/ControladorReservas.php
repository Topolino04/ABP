<?php

	include("../Vistas/VistaPrincipalReserva.php");
	include("../Modelos/ReservaModelo.php");
	include("../Idiomas/idiomas.php");
	include("../Vistas/AltaReserva.php");
	//include("../Vistas/ModificarReserva.php");
	session_start();

			if(isset($_REQUEST['reservas']))
			{
				$idiom=new idiomas();
				$reserva=new Reserva();
				$reserva->creararrayReservas();
				$NombreDeportista=$reserva->crearArrayNombreDeportista();
				$formActividad=$reserva->creararrayActividades();
				//var_dump($NombreDeportista);
				//var_dump($formActividad);
			/*	?>
				<script>
				alert(<?php  ?>);
				</script>
				<?php*/

				$reserva->RellenarArrayFinal($NombreDeportista,$formActividad);
				//cargo el fichero final
			    include("../Archivos/ArrayConsultarActividadesDeReserva.php");
			    $datos=new consult();
			    $formfinal=$datos->array_consultarActividades();

				$vista=new reservaVista();
				$vista->crear($formfinal,$idiom);

			}

			if(isset($_POST['Alta']))
			{
				$idiom=new idiomas();
				$clase=new reservaAlta(); //Llamada a la vista de alta
				$clase->crear($idiom);	
			}

			if(isset($_POST['altaReserva'])){
				
					$idiom=new idiomas();
					$deportistaId=$_POST['deportistaId'];
					$actividadId=$_POST['actividadId'];
					$fecha=$_POST['fecha'];
					$asistencia=$_POST['asistencia'];

					$model=new Reserva();
					$model->altaReserva($deportistaId,$actividadId,$fecha,$asistencia);
					$model->creararrayReservas();
					include("../Archivos/ArrayConsultarReserva.php");
					$arra=new consultreserva();
					$form=$arra->array_consultarReserva();
					$vista=new reservavista();
					$vista->crear($form,$idiom);

			}
			if (isset($_POST['Modificar']))
			{
				$idiom=new idiomas();			
				$deportistaId=$_POST['deportistaId'];
				$actividadId=$_POST['actividadId'];
				$fecha=$_POST['fecha'];
				$asistencia=$_POST['asistencia'];
				$modificar=new ReservaModificar();
				$modificar->crear($idiom,$deportistaId,$actividadId,$fecha,$asistencia);
			}
			if (isset($_POST['Eliminar']))
			{
				$idiom=new idiomas();
				$deportistaId=$_POST['deportistaId'];
				$model=new Reserva();
				$model->eliminarReserva($deportistaId);
				$model->creararrayReservas();
				include("../Archivos/ArrayConsultarReserva.php");
					$arra=new consulreserva();
					$form=$arra->array_consultarReserva();
					$vista=new reservavista();
					$vista->crear($form,$idiom);
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