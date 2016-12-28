<?php

class TABLA_Buscar{


function __construct(){
	$this->render();
	include("../Idiomas/idiomas.php");
    $idioma=new idiomas();
    include("../Funciones/cargadodedatos.php");
    $this->idiom=$idiom;
	$this->idiom=$clases->comprobaridioma(new idiomas());
}

function render(){
?>
	<div>
	<p>
	<h2>
<?php
	include '../Locates/Strings_SPANISH.php';
	include '../Functions/TablaDefForm.php';

	$lista = array('id_Tabla','Nombre');

?>
	</h2>
	</p>
	<p>
	<h3>
	<h1> Buscar </h1>
	<form action='TABLA_Controller.php' method='post'>
<?php
		createForm($lista,$DefForm,$strings,$values='',false,false);
?>
	<input type='submit' name='accion' value=' <?php echo $strings['Buscar']; ?> '><br>
	</form>
<?php
        	echo '<a href=\'TABLA_Controller.php\'>' . $strings['Volver'] . '</a>';
?>

	</h3>
	</p>

	</div>

<?php
} //fin metodo render

}
?>
