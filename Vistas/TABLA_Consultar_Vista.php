<?php

class TABLA_Consultar{


function __construct($array,$arrayE,$volver){
	$this->datos = $array;
	$this->ejercicios = $arrayE;
	$this->volver = $volver;
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
	$listaE = array('id_Ejercicio','Nombre','Tipo','Tiempo','Repeticiones','Peso','Series','Descripcion');
?>
	</h2>
	<h1> Consulta de Tabla de ejercicios</h1>
	<h3>

	<form action='TABLA_Controller.php' method='post'>

<?php createForm($lista,$DefForm,$strings,$values=$this->datos,false,false);?>
<table border = 1>
	<tr>
		<?php foreach($listaE as $titulo){ ?>
		<th>
		<?php echo $strings[$titulo]; ?>
		</th>
	   <?php } ?>
	</tr>
	<?php

	if($this->ejercicios == "Tabla vacia"){
		echo "<tr><td colspan= ".sizeof($listaE)."> Sin ejercicios </td></tr>";
	}
	else{
		foreach($this->ejercicios as $datosE){ ?>
			<tr>	
				<?php for($i=0;$i<count($listaE);$i++){ ?>
					<td>
						<?php echo $datosE[$listaE[$i]];?>
					</td>
				<?php } ?>
			</tr>
		<?php }
	}?>
</table>
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
