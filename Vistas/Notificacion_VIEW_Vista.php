<?php 

class Notificacion_VIEW{

		function crear($idioma,$form){ 
		include("../Funciones/cargadodedatos.php"); 
        if(count($form)>1){ 
        echo "<a href=\"Notificacion_Controller.php?borrartodo\"><input type=\"submit\" class=\"btn btn-primary\" onClick=\"return confirm('".$idiom['confirmareliminados']."')\" name=borratodo value=\"".$idiom['borrartodo']."\"></a>";
        }
		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			
			echo "<form class=\"form-horizontal\"  method=\"post\" action=\"../Controlador/Notificacion_Controller.php?Baja=".$form[$numar]['id']."\">";
			echo "<fieldset><legend>".$idiom['Notificacion1']."</legend>";
			echo "<br>";
			echo "<input type=\"image\" src=\"..\Archivos\\".$form[$numar]["foto"]."\"width=\"50\" height=\"50\">";
			echo "<br>";
			echo "<br>";
			echo $idiom['Fecha'].":".$form[$numar]["fecha"];
			echo "<br>";
			echo $idiom['de'].":".$form[$numar]["usuarioorigen"];
			echo "<br>";
			echo $idiom['to'].":".$form[$numar]["usuario"];
			echo "<br>";
			echo $idiom['mensaje'].":".$form[$numar]["comentario"];
			echo "<br>";
				echo "<a href=\"../Controlador/Notificacion_Controller.php?Baja=".$form[$numar]['id']."\""."><input type=\"image\" onClick=\"return confirm('".$idiom['confirmareliminado']."')\" src=\"../Archivos/eliminar.png\" width=\"20\" height=\"20\"></a>";
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
		 	}

		 
?>
	</div></div></div>
		
	</div>
<?php
include '../plantilla/pie.php';
 }
}

?>