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
						"identificador_deportista0"=>'39486159N',
						"fecha0"=>'2017-12-12 12:01:01',

								"UsuarioDeportista0"=>'JUAN',

						"Entrenador_id_Usuario"=>'36171672D',
						"Actividad_id_Actividad1"=>'1',
						"identificador_deportista1"=>'default',
						"fecha1"=>'2017-11-12 12:01:01',

								"UsuarioDeportista1"=>'default',

								"UsuarioDeportista2"=>'default',

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

						"Entrenador_id_Usuario"=>'36171672D',
						"Actividad_id_Actividad2"=>'2',
						"identificador_deportista2"=>'default',
						"fecha2"=>'2017-01-03 14:31:01',

								"UsuarioDeportista2"=>'default',

						"NombreEntrenadorActividad"=>'MONITOR1',
						"ApellidoEntrenadorActividad"=>'PACO GIMENEZ',
						
),
);return $form;}}?>
