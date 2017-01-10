<?php class consult { function array_consultar(){
$form=array(
array("nombre"=>'Pedro',"email"=>'pepe@pepe.es',
					"fecha"=>'2017-01-12',
					"apellido2"=>'Trigo',"dni"=>'32165498',"tipo"=>'TDU',
					"idusuario"=>'',"usuario"=>'PEDRO',
					"password"=>'8b377b81448ff577f040f963ca3020c6',"telefono"=>'654321987'),
array("nombre"=>'Pablo',"email"=>'pablopeiboll@gmail.com',
					"fecha"=>'2016-11-05',
					"apellido2"=>'Gonzalez Rodriguez',"dni"=>'39476158B',"tipo"=>'TDU',
					"idusuario"=>'',"usuario"=>'ADMIN',
					"password"=>'73acd9a5972130b75066c82595a1fae3',"telefono"=>'321313'),
array("nombre"=>'default',"email"=>'default',
					"fecha"=>'0000-00-00',
					"apellido2"=>'default',"dni"=>'default',"tipo"=>'',
					"idusuario"=>'',"usuario"=>'default',
					"password"=>'default',"telefono"=>'0'),
);return $form;}}?>
