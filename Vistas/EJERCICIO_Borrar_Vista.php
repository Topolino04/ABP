<?php

class EJERCICIO_Borrar{

private $valores;
private $volver;

function __construct($valores,$volver){
	$this->valores = $valores;
	$this->volver = $volver;
	$this->render();
}

function render(){

	include '../Locates/Strings_SPANISH.php';
	include '../Functions/EjercicioDefForm.php';

	$lista = array('id_Ejercicio','Nombre','Tipo','Tiempo','Repeticiones','Peso','Series','Descripcion');
?>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<div>
		<p>
		<h2>
			<form action = 'EJERCICIO_Controller.php' method = 'get'><br>
<?php
	createForm($lista,$DefForm,$strings,$this->valores,true,true);
?>
				<input type = 'submit' name = 'accion' value = 'Borrar' >
			</form>
		</h2>
		</p>
		<p>
		<h3>
			<a href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a></h3>
		</p>

		</div>
	</body>
</html>
<?php
} // fin del metodo render
} // fin de la clase
?>
