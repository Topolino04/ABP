<link rel="stylesheet" href="../css/styles.css">
<?php 

class monitorModificar{

	function crear($idioma,$form,$msg){
include("../Funciones/cargadodedatos.php");

?>

		<script type="text/javascript">

            function ModificarMonitor()
            {
            	
                document.getElementById("ModificarMonitor").submit();
                
            }
            </script>
 <?php
  /////////VALIDACION MULTIDIOMA			
?>
<!--<script type="text/javascript" src="../js/lib/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/dist/jquery.validate.js" charset="UTF-8"></script>-->
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
		     <!-- <script type="text/javascript" src="../js/src/localization/messages_es.js" /></script>-->
		    <?php
		}

?>
<script type="text/javascript" src="../js/form-validation.js" charset="UTF-8"></script>
<?php
////////VALIDACION MULTIDIOMA
 			if (!empty($msg)){
 				echo "<script>alert(\"".$msg."\")</script>";
 			}
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" name=\"form\" id=\"form\" enctype=\"multipart/form-data\" method=\"post\" action=\"../Controlador/ControladorMonitor.php?ModificarMonitor\">";
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
			echo "<input class=\"form-control\" name=\"foto\" type=\"file\" id=\"foto\"/>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"FechaNac\"id =\"FechaNac\" > ".$idiom['FechaNac'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=date required pattern=\"[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])\" id=example1 name=FechaNac >"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"DNI\"id =\"DNI\"> ".$idiom['DNI'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=DNI name=DNI  readonly value=\"".$form["dni"]."\">"; 
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
			echo "<"."input"." "."class=\"form-control\""."type=Password required id=Password name=Password>"; 
			echo "</div></div>";

			echo "<input type=\"image\" id=\"ModificarMonitor\" name=\"ModificarMonitor\" alt=\"Submit\" value=\"ModificarMonitor\" onclick=\"ModificarMonitor();\" src=\"../Archivos/agregar.png\" width=\"20\" height=\"20\">";




	}}

?>