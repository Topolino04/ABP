<link rel="stylesheet" href="../css/styles.css">
<?php 

class actividadModificar{

	function crear($idioma,$form){

	include("../Funciones/cargadodedatos.php");
?>
<script type="text/javascript">

function ModificarActividad()
{
    document.getElementById("ModificarActividad").submit();
    
}
</script>
<?php
echo "<div align=\"left\" class=\"container\">";
	echo "<div class=\"row\">"; 
		echo "<div class=\"col-xs-7 well\">";
			echo "<form role=\"form\" name=\"form\" id=\"form\" class=\"form-group\" method=\"post\"action=\"../Controlador/ControladorActividades.php\">";

			echo "<fieldset><legend>".$idiom['ModificarActividad']."</legend>";

			echo "<input type=hidden id=id_actividad name=id_actividad value=".$form["id_actividad"].">";	

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"nombre\"id =\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=nombre name=nombre value=\"".$form["nombreAct"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"duracion\"id =\"duracion\"> ".$idiom['Duracion'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=duracion name=duracion value=\"".$form["duracion"]."\">"; 
			echo "</div></div>";	

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"hora\"id =\"hora\"> ".$idiom['Hora'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."input"." "."class=\"form-control\""."type=datetime id=hora name=hora value=\"".$form["hora"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"lugar\"id =\"lugar\"> ".$idiom['Lugar'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."input"." "."class=\"form-control\""."type=text id=lugar name=lugar value=\"".$form["lugar"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"plazas\"id =\"plazas\"> ".$idiom['Plazas'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";			
			echo "<"."input"." "."class=\"form-control\""."type=number id=plazas name=plazas value=\"".$form["plazas"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"dificultad\"id =\"dificultad\"> ".$idiom['Dificultad'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."select"." "."class=\"form-control\""."type=text required id=dificultad name=dificultad><option value='Facil' >FACIL</option><option value='Media'>MEDIA</option><option value='Dificil' >DIFICIL</option></select>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label align=\"left\" class=\"col-sm-3 control-label\" for=\"descripcion\"id =\"descripcion\"> ".$idiom['Descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-6\" align=\"left\">";
			echo "<"."textarea"." "."class=\"form-control\""."value=\"".$form["descripcion"]."\"\" id=descripcion name=descripcion cols=40 rows=10>";
			echo "<"."/textarea".">";			 
			echo "</div>";
			echo "</div>";


			echo "<input align=right type=\"submit\" id=\"SubmitBtn\" name=\"ModificarActividad\" alt=\"Submit\" value=\"Enviar\" onclick=\"ModificarActividad();\" src=\"../Archivos/agregar.png\" width=\"20\" height=\"20\">";  	

			echo "</form>";
?>
<script  src="../js/lib/jquery.js"></script>
<script  src="../js/dist/jquery.validate.js"></script>
<script  src="../js/form-validation.js"></script>
<?php
		}
	}

?>

