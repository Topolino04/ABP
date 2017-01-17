<?php

//================================================================================================================
// Class gen_form : es una clase que construye un formulario heml a partir de un array de información de los campos
//   del formulario.
//
//      el array tiene estos tres tipos de entradas: 1 de cada una de las dos primera y n de las dos ultimas
//      ('action','nombre del fichero destino')
//      ('method','metodo a utilizar en el formulario')
//      ('input', 'tipo de input', 'nombre de la variable de input', 'texto descripcion del campo de input')
//      ('input', 'submit', 'valor del texto que aparece en el submit') **falta el nombre de boton submit **
//
// jrodeiro - 19/9/2016
//=============================================================================================================
class gen_form{

private $form;

//
// constructor de la clase. Forma la entrada del formulario, invoca el procesado de los campos y cierra el formulario
//
function __construct($form){
			$this->form = $form;
			//$this->crear_form();
			//$this->crear_campos();
			//$this->cerrar_form();

}


//
// metodo que crea el comienzo del formulario, define el action y el method
//

function crear_form(){

			$action = $this->form['action'];
			$method = $this->form['method'];

			echo "<form action = '" . $action . "' method = '" . $method . "'><br>";

}

function crear_campos(){

	//procesa los inputs
	$inputs = $this->form['input'];
	foreach ($inputs as $input){
		$str = $input['textointro'] . " : <input type = '" . $input['type'] . "' name = '" . $input['name'] . "' ><br>";
		echo $str;
		}

	// procesa los select
	$selects = $this->form['select'];
	foreach ($selects as $select){
		$str = $select['textointro'] . ": <select name='" . $select['name'] . "'";
		if ($select['multiple']=='true'){
			$str = $str . "multiple ";
		}
		$str = $str . " ><br>";
		foreach ($select['values'] as $value){
			$str1 = "<option value = '" . $value . "'>" . $value . "</option><br>";
			$str = $str . $str1;
		}
		$str = $str . "</select><br>";
		echo $str;
	}

	// procesa los submits
	$submits = $this->form['submit'];
	foreach ($submits as $submit){
		$str = "<input type = '" . $submit['type'] . "' name = '" . $submit['name'] . "' value = '" . $submit['textointro'] . "' >";
		echo $str;
	}

	//procesa los resets
	$reset = $this->form['reset'];
	//foreach ($resets as $reset){
		$str = "<input type = '" . $reset['type'] . "' name = '" . $reset['name'] . "' value = '" . $reset['textointro'] . "' ><br>";
		echo $str;
	//}

}

function cerrar_form(){
	echo '</form>';
}

function crear_formulario(){
	$this->crear_form();
	$this->crear_campos();
	$this->cerrar_form();
}

function get_Titulos(){

	$titulos = array();
	$inputs = $this->form['input'];
	foreach($inputs as $input){
		if (!($input['name']=='password')){
		array_push($titulos,$input['name']);
		}
	}
	return $titulos;
}


} //end class

?>
