<?php

class EJERCICIO_Show{

private $datos;
private $volver;

function __construct($array, $volver){
	$this->datos = $array;
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

?>
	<div> <!-- div de muestra de datos.... titulos y datos -->
<?php
	$lista = array('id_Ejercicio','Nombre','Tipo','Tiempo','Repeticiones','Peso','Series','Descripcion');
?>
	<a href='./EJERCICIO_Controller.php?accion=Consultar'>Consultar</a>
	<--------->
	<a href='./EJERCICIO_Controller.php?accion=Insertar'>Insertar</a>
	<--------->
	<?php echo $strings['Nombre'] . ' : ' /*. $_SESSION['login'];*/ ?>
	<--------->
	<a href='../Functions/Desconectar.php'><?php echo $strings['Cerrar Sesión']; ?></a>
	<br><br>
	<table border = 1>
	<tr>
<?php
	foreach($lista as $titulo){
?>
		<th>
<?php
		echo $strings[$titulo];
?>
		</th>
<?php
	}
?>
	</tr>
<?php

	foreach($this->datos as $datos){
?>
	<tr>
<?php
		for($i=0;$i<count($lista);$i++){
?>
		<td>
<?php
			echo $datos[$lista[$i]];
?>
		</td>
<?php
	}
?>
	<td><a href='EJERCICIO_Controller.php?id_Ejercicio=<?php echo $datos['id_Ejercicio'].'&accion=Modificar'; ?>'>Modificar</a></td>
	<td><a href='EJERCICIO_Controller.php?id_Ejercicio=<?php echo $datos['id_Ejercicio'].'&accion=Borrar'; ?>'>Borrar</a></td>
	<tr>
<?php
	}
?>
	</table>

</div> <!-- fin de div de muestra de datos -->
<h3>
<p>
<?php
	echo '<a href=\'' . $this->volver . "\'>" . $strings['Volver'] . " </a>";
?>
</h3>
</p>

</div>

<?php
} //fin metodo render

}
