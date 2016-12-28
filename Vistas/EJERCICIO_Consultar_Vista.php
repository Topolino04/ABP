<?php

class EJERCICIO_Consultar{


function __construct(){
	include("../Idiomas/idiomas.php");
    $idioma=new idiomas();
    include("../Funciones/cargadodedatos.php");
    $this->idiom=$idiom;
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
	$lista = array('Nombre',);

?>
	</h2>
	</p>
	<p>
	<h3>

	<form action='EJERCICIO_Controller.php' method='post'>
<?php
		createForm($lista,$DefForm,$strings,$values='',false,false);
?>
	<input type="hidden" name='id_Ejercicio' value = ''>
	<input type="hidden" name='Tipo' value = ''>
	<input type="hidden" name='Tiempo' value = ''>
	<input type="hidden" name='Repeticiones' value = ''>
	<input type="hidden" name='Peso' value = ''>
	<input type="hidden" name='Series' value = ''>
	<input type="hidden" name='Descripcion' value = ''>
	<input type='submit' name='accion' value=' <?php echo $strings['Consultar']; ?> '><br>

	</form>
<?php
        	echo '<a href=\'EJERCICIO_Controller.php\'>' . $strings['Volver'] . '</a>';
?>

	</h3>
	</p>

	</div>
</div>
<?php
} //fin metodo render


}
?>
