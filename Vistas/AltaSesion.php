<?php




class sesionAlta{

	function crear($idioma){

			include("../Funciones/cargadodedatos.php");
?>
<script type="text/javascript">

    function enviarAltaSesion(){
    document.getElementById("altaSesion").submit();

    }
</script>

<?php
    		echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" id=formulario method=\"post\"action=\"..\Controlador\ControladorSesiones.php?\">";
			
			echo "<fieldset><legend>".$idiom['AltaSesion']."</legend>";		

			
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"deportista\"id =\"deportista\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."required id=deportista name=deportista><option value='0'>Selecciones un deportista</option>";
				
				$mysqli = new mysqli('localhost', 'root', '', 'Gimnasio_BD');
											
	          	$query = $mysqli -> query ("SELECT * FROM Deportista");
												
	         	 while ($valores = mysqli_fetch_array($query)) {
													
	            echo '<option value="'.$valores[DNI].'">'.$valores[Usuario].'</option>';
														
	          	}
          	echo "</select>";
        
			echo "</div></div>";

			/*echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Fecha\"id =\"Fecha\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=datetime required id=fecha name=fecha>"; 
			echo "</div></div>";*/

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"comentario\"id =\"comentario\"> ".$idiom['Comentario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=comentario name=comentario>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Tabla\"id =\"Tabla\"> ".$idiom['Tabla'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."required id=tabla name=tabla><option value='0'>Selecciones una tabla</option>";
				
				//$mysqli = new mysqli('localhost', 'root', 'iu', 'Gimnasio_BD');
											
	          	$query = $mysqli -> query ("SELECT * FROM Tabla");
												
	         	 while ($valores = mysqli_fetch_array($query)) {
													
	            echo '<option value="'.$valores[id_Tabla].'">'.$valores[Nombre].'</option>';
														
	          	}
          	echo "</select>";
        
			echo "</div></div>";			


			echo "<input type=\"image\" id=\"altaSesion\" name=\"altaSesion\" alt=\"Submit\" value=\"altaSesion\" onclick=\"enviarAltaSesion();\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\">";  	
			

?>
<?php
		}
	}

?>
