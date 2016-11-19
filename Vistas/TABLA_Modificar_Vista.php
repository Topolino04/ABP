<?php

class TABLA_Modificar{

private $valores;
private $volver;
private $ejercicios;

function __construct($valores,$arrayE,$volver){
	$this->valores = $valores;
	$this->ejercicios= $arrayE;
	$this->volver = $volver;
	$this->render();
}

function render(){

	include '../Locates/Strings_SPANISH.php';
	include '../Functions/TablaDefForm.php';
	$lista = array('id_Tabla','Nombre');
	$listaE = array('id_Ejercicio','Nombre','Tipo','Tiempo','Repeticiones','Peso','Series','Descripcion');
?>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
<body>
	<h1>Modificar Tabla</h1>
<div>
<h2>
<form action = 'TABLA_Controller.php' method = 'post'>
<?php createForm($lista,$DefForm,$strings,$this->valores,true,''); ?>
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
				<td>
					<input type = "checkbox" <?php  if($datosE["TRUE"]) echo "checked "; echo " name = check[] value = ".$datosE["id_Ejercicio"];?> >
				</td>
			</tr>

		<?php }
	}?>
</table>
<input type="hidden" name="check[]" value="">
<input type = 'submit' name = 'accion' value = 'Modificar' >
</form>
</h2>
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
