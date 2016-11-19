<?php 

class deportistaAlta{

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

            function enviaraltadeportista()
            {
            	
                document.getElementById("altaDeportista").submit();
                
            }
            </script>
 <?php
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\"action=\"..\Controlador\ControladorDeportistas.php\">";
			echo "<fieldset><legend>".$idiom['Datosdeportista']."</legend>";
			
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"nombre\"id =\"nombre\"> ".$idiom['Nombre'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=nombre name=Nombre>"; 
			echo "</div></div>";


			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Apellidos\"id =\"Apellidos\"> ".$idiom['Apellidos'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Apellidos name=Apellidos>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Telefono\"id =\"Apellido\"> ".$idiom['Telefono'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=number required id=Telefono name=Telefono>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"FechaNac\"id =\"FechaNac\"> ".$idiom['FechaNac'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=date required id=FechaNac name=FechaNac>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"DNI\"id =\"DNI\"> ".$idiom['DNI'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=DNI name=DNI>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"email\"id =\"email\"> ".$idiom['email'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<span class=\"input-group-addon\">@</span>";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=email name=email>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"DNI\"id =\"DNI\"> ".$idiom['TIPO'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."type=text required id=TIPO name=TIPO><option value='TDU' >TDU</option><option value='PEF'>PEF</option></select>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Usuario\"id =\"Usuario\"> ".$idiom['Usuario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=Usuario name=Usuario>"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Password\"id =\"Password\"> ".$idiom['Password'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=Password required id=Password name=Password>"; 
			echo "</div></div>";

			echo "<input type=\"image\" id=\"altaDeportista\" name=\"altaDeportista\" alt=\"Submit\" value=\"altaDeportista\" onclick=\"enviaraltadeportista();\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\">";

?>



<?php
	}}

?>