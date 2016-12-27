<?php

class TABLA_Insertar{

function __construct(){
	$this->render();
}

function render(){
?>

	<div>
		<p>
			<h2>
<?php
				include '../Locates/Strings_SPANISH.php';
				include '../Functions/TablaDefForm.php';
				$lista = array('Nombre');

?>
			</h2>
		</p>
		<p>
			<h1>
				Insertar Tabla<br>
			</h1>
			<h3>
				<form action='TABLA_Controller.php' method='post'>
<?php
					createForm($lista,$DefForm,$strings,'',true,false);
?>
				<input type='hidden' name = 'id_Tabla' value= ''>
				<input type='submit' name ='accion' value='Insertar'>
				</form>
<?php
				echo '<a href=\'TABLA_Controller.php\'>' . $strings['Volver'] . " </a>";
?>
			</h3>
		</p>

	</div>

<?php
} //fin metodo render

}
