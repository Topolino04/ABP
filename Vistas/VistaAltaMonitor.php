<?php 

class monitorAlta{

	function crear($idioma,$msg,$form,$alerta){

		include("../Funciones/cargadodedatos.php");

?>

		<script type="text/javascript">

            function enviaraltaMonitor()
            {
            	
                document.getElementById("altaMonitor").submit();
                
            }
            </script>
 <?php
 			if (!empty($msg)){
 				echo "<script>alert(\"".$msg."\")</script>";
 			}if (!empty($alerta)){
 				echo "<script>alert(\"".$idiom['dnierroneo']."\")</script>";
 			}

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" enctype=\"multipart/form-data\" method=\"post\" action=\"../Controlador/ControladorMonitor.php\">";
			echo "<fieldset><legend>".$idiom['Datosmonitor']."</legend>";
			
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"id =\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=nombre name=Nombre value=\"".$form["nombre"]."\">"; 
			echo "</div></div>";


			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Apellidos\"id =\"Apellidos\"> ".$idiom['Apellidos'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Apellidos name=Apellidos value=\"".$form["apellidos"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Telefono\"id =\"Telefono\"> ".$idiom['Telefono'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=number required id=Telefono name=Telefono value=\"".$form["telefono"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"foto\"id =\"foto\"> ".$idiom['foto'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<input class=\"form-control\" name=\"foto\" type=\"file\" id=\"foto\"/ >";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"FechaNac\"id =\"FechaNac\"> ".$idiom['FechaNac'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=date required id=FechaNac name=FechaNac value=\"".$form["fechaNac"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"DNI\"id =\"DNI\"> ".$idiom['DNI'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=DNI name=DNI value=\"".$form["dni"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"email\"id =\"email\"> ".$idiom['email'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<span class=\"input-group-addon\">@</span>";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=email name=email value=\"".$form["email"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"DNI\"id =\"DNI\"> ".$idiom['TIPO'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."type=text required id=TIPO name=TIPO><option value='Baile' >Baile</option><option value='Fitnes'>Fitnes</option></select>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Usuario\"id =\"Usuario\"> ".$idiom['Usuario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Usuario name=Usuario value=\"".$form["usuario"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Password\"id =\"Password\"> ".$idiom['Password'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=Password required id=Password name=Password >"; 
			echo "</div></div>";

			echo "<input type=\"image\" id=\"altaMonitor\" name=\"altaMonitor\" alt=\"Submit\" value=\"altaMonitor\" onclick=\"enviaraltaMonitor();\" src=\"../Archivos/agregar.png\" width=\"20\" height=\"20\">";

?>



<?php
	}}

?>