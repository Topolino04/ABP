<?php class consultActividad { function array_consultarActividad(){
$form=array(
array(
				"id_actividad"=>'1',
				"nombre"=>'Baile',
				"duracion"=>'00:30:00',
				"hora"=>'18:00:00',
				"lugar"=>'Aula3',
				"plazas"=>'20',
				"dificultad"=>'FACIL',				
				"descripcion"=>'Clase de baile',
				"plazas_libres"=>'20'
				),
array(
				"id_actividad"=>'17',
				"nombre"=>'Full Contact',
				"duracion"=>'00:00:30',
				"hora"=>'16:00:00',
				"lugar"=>'Sala 5',
				"plazas"=>'30',
				"dificultad"=>'MEDIA',				
				"descripcion"=>'Clase de lucha',
				"plazas_libres"=>'30'
				),
);return $form;}}?>
