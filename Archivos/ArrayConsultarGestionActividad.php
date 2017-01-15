<?php class consult { function array_consultarGestionActividades(){
$form=array(
array(
			"id_actividad"=>'1',
			"nombre"=>'Baile',
			"duracion"=>'00:30:00',
			"hora"=>'18:00:00',
			"lugar"=>'Aula 3',
			"plazas"=>'20',
			"dificultad"=>'FACIL',
			"descripcion"=>'Clase de baile',

						"Entrenador_id_Usuario"=>'36171672D',
						"Actividad_id_Actividad0"=>'1',
						"identificador_deportista0"=>'39486158B',
						"fecha0"=>'0000-00-00 00:00:00',

								"UsuarioDeportista0"=>'ADMIN',

						"Entrenador_id_Usuario"=>'36171672D',
						"Actividad_id_Actividad1"=>'1',
						"identificador_deportista1"=>'default',
						"fecha1"=>'0000-00-00 00:00:00',

								"UsuarioDeportista1"=>'default',

						"NombreEntrenadorActividad"=>'MONITOR1',
						"ApellidoEntrenadorActividad"=>'PACO GIMENEZ',
						
),
array(
			"id_actividad"=>'2',
			"nombre"=>'Fitness',
			"duracion"=>'00:30:00',
			"hora"=>'20:00:00',
			"lugar"=>'Aula 4',
			"plazas"=>'30',
			"dificultad"=>'MEDIA',
			"descripcion"=>'Clase de Fitness',

								"UsuarioDeportista0"=>'default',

								"UsuarioDeportista1"=>'default',

						"NombreEntrenadorActividad"=>'MONITOR1',
						"ApellidoEntrenadorActividad"=>'PACO GIMENEZ',
						
),
);return $form;}}?>
