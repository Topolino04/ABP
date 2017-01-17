	<?php
// search, url, tel, email, password, date pickers, number, checkbox, radio y file
$DefForm = array(
	0 => array(
	'type' => 'hidden',
	'name' => 'id_Ejercicio',
	'value' => '',
	),
	1=> array(
	'type' => 'text',
	'name' => 'Nombre',
	'value' => '',
	'size' => 25,
	'required' => true,
	'pattern' => '{a-z}{A-Z}{0-9}',
	'validation' => 'onblur=\'funcion(xxxx)\'',
	'readonly' => false
	),
	2=> array(
	'type' => 'text',
	'name' => 'Tipo',
	'value' => '',
	'size' => 25,
	'required' => true,
	'pattern' => '{a-z}{A-Z}{0-9}',
	'validation' => 'onblur=\'funcion(xxxx)\'',
	'readonly' => false
	),
	3=> array(
	'type' => 'time',
	'name' => 'Tiempo',
	'value' => '',
	'required' => false,
	'pattern' => '{a-z}{A-Z}{0-9}',
	'validation' => 'onblur=\'funcion(xxxx)\'',
	'readonly' => false
	),
	4=> array(
	'type' => 'number',
	'name' => 'Repeticiones',
	'value' => '',
	'min' => 1,
	'max' => 1000,
	
	'pattern' => '',
	'validation' => '',
	'readonly' => false
	),
	5=> array(
	'type' => 'number',
	'name' => 'Peso',
	'value' => '',
	'min' => 1,
	'max' => 1000,
	'required' => false,
	'pattern' => '',
	'validation' => '',
	'readonly' => false

	),
	6=> array(
	'type' => 'number',
	'name' => 'Series',
	'value' => '',
	'min' => 1,
	'max' => 1000,
	'required' => false,
	'pattern' => '',
	'validation' => '',
	'readonly' => false
	),
	7=> array(
	'type' => 'text',
	'name' => 'Descripcion',
	'value' => '',
	'size' => 100,
	'required' => false,
	'pattern' => '{a-z}{A-Z}{0-9}',
	'validation' => 'onblur=\'funcion(xxxx)\'',
	'readonly' => false
	),


)
?>
