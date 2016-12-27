<?php
	class actividadvista{

		function crear($form,$idioma){
include("../Funciones/cargadodedatos.php");
    		?>
<script type="text/javascript">

            function enviaralta(){

                document.getElementById("alta").submit();

            }
            function enviarmodificar(){

            	document.getElementById("modificar").submit();
            }
            function enviareliminar(){

            	document.getElementById("eliminar").submit();
            }
   </script>
   <form name="formularioalta"  class="form-horizontal" action="..\Controlador\ControladorActividades.php" method="post" >
			<fieldset>
			<input type="image" id="alta" name="Alta" alt="Submit" value="Alta" onclick="enviaralta();" src="..\Archivos\añadir.png" width="20" height="20"></input>
			</fieldset>
			</form>

<?php

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\ControladorActividades.php\">";
			echo "<fieldset><legend>".$idiom['DatosActividad']."</legend>";
			echo "<input type=image id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"..\Archivos\lapiz.png\" width=\"30\"  height=\"30\" ></input>";
			echo "<input type=hidden id=id_actividad name=id_actividad value=".$form[$numar]["id_actividad"].">";
			echo "<input type=image id=\"eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"..\Archivos\\eliminar.png\" width=\"30\"  height=\"30\" >";
			echo"<br>";
			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['Duracion'].":".$form[$numar]["duracion"];
			echo "<br>";
			echo $idiom['Hora'].":"." ".$form[$numar]["hora"];
			echo "<br>";
			echo $idiom['Lugar'].":"." ".$form[$numar]["lugar"];
			echo "<br>";
			echo $idiom['Plazas'].":"." ".$form[$numar]["plazas"];
			echo "<br>";
			echo $idiom['Dificultad'].":"." ".$form[$numar]["dificultad"];
			echo "<br>";
			echo $idiom['Descripcion'].":"." ".$form[$numar]["descripcion"];
			echo "<br>";
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
