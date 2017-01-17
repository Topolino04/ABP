<link rel="stylesheet" href="../css/styles.css">
<?php 

class actividadModificar{

	function crear($idioma,$form,$listaEntrenadores){

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

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"entrenador\"id =\"entrenador\"> ".$idiom['Monitor'].":</label>";
				echo "<div class=\"input-group col-sm-6\">";
					echo "<"."select"." "."class=\"form-control\""."required id=\"entrenador\" name=entrenador><option value='0'>".$idiom['SelectEnt']."</option>";	
					
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

			$num = 3;
            
			$DuracionSinSegundos = substr($form["duracion"], 0, -$num);
			$HoraSinSegundos = substr($form["hora"], 0, -$num);

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"duracion\"id =\"duracion\"> ".$idiom['Duracion'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=duracion name=duracion value=\"".$DuracionSinSegundos."\">"; 
			echo "</div></div>";	

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"hora\"id =\"hora\"> ".$idiom['Hora'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."input"." "."class=\"form-control\""."type=datetime id=hora name=hora value=\"".$HoraSinSegundos."\">"; 
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
/////////VALIDACION MULTIDIOMA			
?>
<script type="text/javascript" src="../js/lib/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/dist/jquery.validate.js" charset="UTF-8"></script>
<?php
	if (isset($_SESSION['idioma'])){
		if($_SESSION['idioma']=="español"){
			?>
		      <script type="text/javascript" src="../js/src/localization/messages_es.js" /></script>
		    <?php
		    }elseif($_SESSION['idioma']=="gallego"){
		      ?>
		      <script type="text/javascript" src="../js/src/localization/messages_es_AR.js" /></script>
		    <?php
		    }elseif($_SESSION['idioma']=="ingles"){
		    }
		     
		}else{
		    ?>
		      <script type="text/javascript" src="../js/src/localization/messages_es.js" /></script>
		    <?php
		}

?>
<script type="text/javascript" src="../js/form-validation.js" charset="UTF-8"></script>
<?php
////////VALIDACION MULTIDIOMA



		}
	}

?>

