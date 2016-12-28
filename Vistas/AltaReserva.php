<?php

class reservaAlta{

	function crear($idioma){

		include("../Funciones/cargadodedatos.php");
?>
<script type="text/javascript">

    function enviarAltaReserva(){
    document.getElementById("Alta").submit();

    }
</script>

<?php
    		echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\"action=\"..\Controlador\ControladorReservas.php\">";

			echo "<fieldset><legend>".$idiom['AltaReserva']."</legend>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"deportista\"id =\"deportista\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=deportista name=deportista>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"actividad\"id =\"actividad\"> ".$idiom['Actividad'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=number required id=Actividad name=Actividad>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"fecha\"id =\"fecha\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=datetime required id=hora name=hora>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"lugar\"id =\"lugar\"> ".$idiom['Asistencia'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=lugar name=lugar>";		echo "</div></div>";

			


			echo "<input type=\"image\" id=\"altaReserva\" name=\"altaReserva\" alt=\"Submit\" value=\"altaReserva\" onclick=\"enviarAltaReserva();\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\">";


?>
<?php
		}
	}

?>
