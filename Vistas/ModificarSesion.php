<?php 

class sesionModificar{

	function crear($idioma,$entrenador,$deportista,$fecha,$comentario){

		include("../Funciones/cargadodedatos.php");
?>
		<script type="text/javascript">

            function enviarModificarSesion()
            {
                document.getElementById("ModificarSesion").submit();
                
            }
            </script>
 <?php
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\"action=\"..\Controlador\ControladorSesiones.php\">";			
			echo "<fieldset><legend>".$idiom['ModificarSesion']."</legend>";
			
					
			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"deportista\"id =\"deportista\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=deportista name=deportista value =".$deportista.">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"fecha\"id =\"fecha\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=datetime required id=fecha name=fecha value =".$fecha.">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"comentario\"id =\"comentario\"> ".$idiom['Comentario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=comentario name=comentario value =".$comentario.">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"tabla\"id =\"tabla\"> ".$idiom['Tabla'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=tabla name=tabla value =".$tabla.">"; 
			echo "</div></div>";			
			


			echo "<input type=\"image\" id=\"ModificarSesion\" name=\"ModificarSesion\" alt=\"Submit\" value=\"ModificarSesion\" onclick=\"enviarModificarSesion();\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\">";  	
			

?>
<?php
		}
	}

?>
