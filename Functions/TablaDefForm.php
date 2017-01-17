	<?php
// search, url, tel, email, password, date pickers, number, checkbox, radio y file
$DefForm = array(
	0 => array(
	'type' => 'hidden',
	'name' => 'id_Tabla',
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
)



?>
