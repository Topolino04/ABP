<html>
<head>

<link rel="stylesheet" href="css/styles.css"/>
<title>
</title>
</head>
<body background="../Archivos/background-faded1.jpg">

<?php

class actividadAlta{

	function crear($idioma,$listaEntrenadores){

		include("../Funciones/cargadodedatos.php");
?>

<script type="text/javascript">

    function enviarAltaActividad(){
    document.getElementById("Alta").submit();

    }
</script>


<?php
echo "<div  align=\"left\" class=\"container\">";
	echo "<div class=\"row\">";
		echo "<div class=\"col-xs-7 well\">";
			echo "<form role=\"form\" name=\"addActivity\" class=\"form-group\" method=\"post\"action=\"..\Controlador\ControladorActividades.php\">";

				echo "<fieldset><legend>".$idiom['AltaActividad']."</legend>";

				echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"nombre\"id =\"nombre\">".$idiom['Nombre'].":</label>";
				echo "<div class=\"input-group col-sm-6\">";
				echo "<"."input"." "."class=\"form-control\""."type=\"text\" id=\"nombre\" name=\"nombre\" placeholder=\"Introduce un nombre\">";
				echo "</div></div>";

				echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"entrenador\"id =\"entrenador\"> ".$idiom['Monitor'].":</label>";
				echo "<div class=\"input-group col-sm-6\">";
					echo "<"."select"." "."class=\"form-control\""."required id=entrenador name=entrenador><option value='0'>".$idiom['SelectEnt']."</option>";	
					
				 	if($listaEntrenadores!=null){ 

						for ($numar =0;$numar<count($listaEntrenadores);$numar++)
						{
							$dni=$listaEntrenadores[$numar]["DNI"];
							$Nombre=$listaEntrenadores[$numar]["Nombre"];
							echo '<option value="'.$dni.'">'.$Nombre.'</option>';
						}
					}																								
					echo "</select>";
				echo "</div></div>";

				echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"duracion\"id =\"duracion\"  > ".$idiom['Duracion'].":</label>";
				echo "<div class=\"input-group col-sm-6\">";
				echo "<"."input"." "."class=\"form-control\""."type=number required id=duracion name=duracion>";
				echo "</div></div>";

				echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"hora\"id =\"hora\"> ".$idiom['Hora'].":</label>";
				echo "<div class=\"input-group col-sm-6\">";
				echo "<"."input"." "."class=\"form-control\""."type=datetime required id=hora name=hora>";
				echo "</div></div>";

				echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"lugar\"id =\"lugar\"> ".$idiom['Lugar'].":</label>";
				echo "<div class=\"input-group col-sm-6\">";
				echo "<"."input"." "."class=\"form-control\""."type=text required id=lugar name=lugar>";
				echo "</div></div>";

				echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"plazas\"id =\"plazas\"> ".$idiom['Plazas'].":</label>";
				echo "<div class=\"input-group col-sm-6\">";
				echo "<"."input"." "."class=\"form-control\""."type=number required id=plazas name=plazas>";
				echo "</div></div>";

				echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"dificultad\"id =\"dificultad\"> ".$idiom['Dificultad'].":</label>";
				echo "<div class=\"input-group col-sm-6\">";
				echo "<"."select"." "."class=\"form-control\""."type=text required id=dificultad name=dificultad><option value='Facil'>FACIL</option><option value='Media'>MEDIA</option><option value='Dificil' >DIFICIL</option></select>";
				echo "</div></div>";

				echo "<div class=\"form-group\"><label align=\"left\" class=\"col-sm-3 control-label\" for=\"descripcion\"id =\"descripcion\">".$idiom['Descripcion'].":</label>";
				echo "<div class=\"input-group col-sm-6\" align=\"left\">";
				echo "<"."input"." "."class=\"form-control\""."type=textarea required id=descripcion name=descripcion align=\"left\">";
				echo "</div>";
				echo "</div>";


				echo "<input align=right type=\"image\" id=\"altaActividad\" name=\"altaActividad\" alt=\"Submit\" value=\"altaActividad\" onclick=\"enviarAltaActividad();\" src=\"..\Archivos\agregar.png\" width=\"20\" height=\"20\">";
			
			echo "</form>"

?>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/form-validation.js"></script>


<?php
		}
	}

?>
</body>
</html>
