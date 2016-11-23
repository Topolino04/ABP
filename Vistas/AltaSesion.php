<?php

class actividadAlta{

	function crear($formdeportistas,$formmonitores,$idioma){
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
			echo "<form class=\"form-horizontal\" id=formulario method=\"post\"action=\"../Controlador/ControladorActividades.php\">";
			
			echo "<fieldset><legend>".$idiom['AltaSesion']."</legend>";
			
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Monitor\"id =\"Monitor\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Deportista name=Deportista value=\"".$_SESSION['usuario']."\" readonly>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Fecha\"id =\"Fecha\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=date required id=Fecha name=Fecha>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Ejercicio\"id =\"Ejercicio\"> ".$idiom['Ejercicio'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Ejercicio name=Ejercicio>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Comentario\"id =\"Comentario\"> ".$idiom['Comentario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<textarea rows=\"4\" cols=\"50\" name=\"Comentario\" form=\"formulario\"></textarea>";
			echo "</div></div>";
			


			echo "<input type=\"image\" id=\"altaActividad\" name=\"altaActividad\" alt=\"Submit\" value=\"altaActividad\" onclick=\"enviarAltaActividad();\" src=\"../Archivos/añadir.png\" width=\"20\" height=\"20\">";  	
			

?>
<?php
		}
	}

?>
