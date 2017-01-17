<?php class consult { function array_consultar(){
$form=array(
array("nombre"=>'Pablo',"email"=>'pablopeiboll@gmail.com',
					"fecha"=>'2016-11-05',
					"apellido2"=>'Gonzalez Rodriguez',"dni"=>'39486158B',"tipo"=>'TDU',
					"idusuario"=>'',"usuario"=>'ADMIN',
					"password"=>'73acd9a5972130b75066c82595a1fae3',"telefono"=>'632131343'),
array("nombre"=>'Juan',"email"=>'juan@gmail.com',
					"fecha"=>'1990-01-15',
					"apellido2"=>'Perez Gomez',"dni"=>'39486159N',"tipo"=>'TDU',
					"idusuario"=>'',"usuario"=>'JUAN',
					"password"=>'c9bf6c4a4fc1ac127bf27c71ce2e7250',"telefono"=>'621313123'),
array("nombre"=>'default',"email"=>'default',
					"fecha"=>'0000-00-00',
					"apellido2"=>'default',"dni"=>'default',"tipo"=>'TDU',
					"idusuario"=>'',"usuario"=>'default',
					"password"=>'default',"telefono"=>'0'),
);return $form;}}?>
