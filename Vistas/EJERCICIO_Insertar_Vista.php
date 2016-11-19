<?php

class EJERCICIO_Insertar{

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
				include '../Functions/EjercicioDefForm.php';
				$lista = array('id_Ejercicio','Nombre','Tipo','Tiempo','Repeticiones','Peso','Series','Descripcion');
?>
			</h2>
		</p>
		<p>
			<h1>
				Insertar Ejercicio<br>
			</h1>
			<h3>
				<form action='EJERCICIO_Controller.php' method='post'>
					<?php createForm($lista,$DefForm,$strings,'','',false);	?>
					<input type='submit' name ='accion' value='Insertar'>
				</form>
				<?php echo '<a href=\'EJERCICIO_Controller.php\'>' . $strings['Volver'] . " </a>"; ?>
			</h3>
		</p>
	</div>
<?php
} //fin metodo render

}
