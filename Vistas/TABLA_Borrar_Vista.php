<?php

class Tabla_Borrar{

private $valores;
private $volver;

function __construct($valores,$volver){
	$this->valores = $valores;
	$this->volver = $volver;
	$this->render();
}

function render(){

	include '../Locates/Strings_SPANISH.php';
	include '../Functions/TablaDefForm.php';

	$lista = array('id_Tabla','Nombre');
?>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<div>
			<h1> Borrar Tabla </h1>
			<h2>
				<form action = 'TABLA_Controller.php' method = 'get'>
					<?php createForm($lista,$DefForm,$strings,$this->valores,true,true); ?>
					<input type = 'submit' name = 'accion' value = 'Borrar' >
				</form>
			</h2>
			<h3><a href='<?php echo $this->volver; ?> '><?php echo $strings['Volver']; ?> </a></h3>
		</div>
	</body>
</html>
<?php
} // fin del metodo render
} // fin de la clase
?>
