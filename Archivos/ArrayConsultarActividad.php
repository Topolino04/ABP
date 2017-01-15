<?php class consultActividad { function array_consultarActividad(){
$form=array(
array(
				"id_actividad"=>'1',
				"nombre"=>'Baile',
				"duracion"=>'00:30:00',
				"hora"=>'18:00:00',
				"lugar"=>'Aula 3',
				"plazas"=>'20',
				"dificultad"=>'FACIL',				
				"descripcion"=>'Clase de baile'				
				),
array(
				"id_actividad"=>'2',
				"nombre"=>'Fitness',
				"duracion"=>'00:30:00',
				"hora"=>'20:00:00',
				"lugar"=>'Aula 4',
				"plazas"=>'30',
				"dificultad"=>'MEDIA',				
				"descripcion"=>'Clase de Fitness'				
				),
);return $form;}}?>
