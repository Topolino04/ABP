<?php

class actividadAlta{

	function crear($idioma){

		include("../Funciones/comprobaridioma.php");
        include '../plantilla/cabecera.php';
        include('../plantilla/menulateral.php');
        $clase=new cabecera();
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        $clase->crear($idiom);
        $menus=new menulateral();
        $menus->crear($idiom);
?>
<script type="text/javascript">

    function enviarAltaActividad(){

    document.getElementById("Alta").submit();

    }
</script>

<?php
    		echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\"action=\"../Controlador/ControladorActividades.php\">";
			
			echo "<fieldset><legend>".$idiom['AltaActividad']."</legend>";
			
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"id =\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=nombre name=nombre>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"duracion\"id =\"duracion\"> ".$idiom['Duracion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=number required id=duracion name=duracion>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"hora\"id =\"hora\"> ".$idiom['Hora'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=datetime required id=hora name=hora>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"lugar\"id =\"lugar\"> ".$idiom['Lugar'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=lugar name=lugar>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"plazas\"id =\"plazas\"> ".$idiom['Plazas'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";			
			echo "<"."input"." "."class=\"form-control\""."type=number required id=plazas name=plazas>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"dificultad\"id =\"dificultad\"> ".$idiom['Dificultad'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."type=text required id=dificultad name=dificultad><option value='Facil'>FACIL</option><option value='Medio'>MEDIA</option><option value='Dificil' >DIFICIL</option></select>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"descripcion\"id =\"descripcion\"> ".$idiom['Descripcion'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=textarea required id=descripcion name=descripcion>"; 
			echo "</div></div>";


			echo "<input type=\"image\" id=\"altaActividad\" name=\"altaActividad\" alt=\"Submit\" value=\"altaActividad\" onclick=\"enviarAltaActividad();\" src=\"../Archivos/añadir.png\" width=\"20\" height=\"20\">";  	
			

?>
<?php
		}
	}

?>
