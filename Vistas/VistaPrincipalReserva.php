<?php
	class reservavista{

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
   <form name="formularioalta"  class="form-horizontal" action="..\Controlador\ControladorReservas.php" method="post" >
			<fieldset>
			<input type="image" id="alta" name="Alta" alt="Submit" value="Alta" onclick="enviaralta();" src="..\Archivos\añadir.png" width="20" height="20"></input>
			</fieldset>
			</form>

<?php

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\ControladorReservas.php\">";
			echo "<fieldset><legend>".$idiom['DatosReserva']."</legend>";
			echo "<input type=image id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"..\Archivos\lapiz.png\" width=\"30\"  height=\"30\" ></input>";
			echo "<input type=hidden id=deportistaId name=deportistaId value=".$form[$numar]["deportistaId"].">";
			echo "<input type=hidden id=actividadId name=actividadId value=".$form[$numar]["actividadId"].">";
			echo "<input type=hidden id=fecha name=fecha value=".$form[$numar]["fecha"].">";
			echo "<input type=hidden id=asistencia name=asistencia value=".$form[$numar]["asistencia"].">";
				
			
			echo "<input type=image id=\"eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"..\Archivos\\eliminar.png\" width=\"30\"  height=\"30\" >";
			echo "<br>";
			echo $idiom['Deportista'].":".$form[$numar]["Deportista_id_Usuario"];
			echo "<br>";
			echo $idiom['Actividad'].":".$form[$numar]["ActividadId"];
			echo "<br>";
			echo $idiom['Fecha'].":"." ".$form[$numar]["fecha"];
			echo "<br>";
			echo $idiom['Asistencia'].":"." ".$form[$numar]["asistencia"];
			echo "<br>";
		
			
			echo "</fieldset>";
			echo "</form>";
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
