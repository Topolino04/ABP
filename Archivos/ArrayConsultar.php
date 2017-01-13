<?php class consult { function array_consultar(){
$form=array(
array("nombre"=>'Pablo',"email"=>'pablopeiboll@gmail.com',
					"fecha"=>'2016-11-05',
					"apellido2"=>'Gonzalez Rodriguez',"dni"=>'39476158B',"tipo"=>'TDU',
					"idusuario"=>'',"usuario"=>'ADMIN',
					"password"=>'73acd9a5972130b75066c82595a1fae3',"telefono"=>'321313'),
array("nombre"=>'Ismael',"email"=>'isma.verin@gmail.com',
					"fecha"=>'2017-12-31',
					"apellido2"=>'Somoza',"dni"=>'55555555R',"tipo"=>'PEF',
					"idusuario"=>'',"usuario"=>'pepe',
					"password"=>'926e27eecdbc7a18858b3798ba99bddd',"telefono"=>'666666666'),
array("nombre"=>'default',"email"=>'default',
					"fecha"=>'0000-00-00',
					"apellido2"=>'default',"dni"=>'default',"tipo"=>'TDU',
					"idusuario"=>'',"usuario"=>'default',
					"password"=>'default',"telefono"=>'0'),
);return $form;}}?>
