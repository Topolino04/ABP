<?php

	class sesionVista{
		
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
   <form name="formularioalta"  class="form-horizontal" action="..\Controlador\ControladorSesiones.php" method="post" >
			<fieldset>
			<input type="image" id="alta" name="Alta" alt="Submit" value="Alta" onclick="enviaralta();" src="..\Archivos\añadir.png" width="20" height="20"></input>
			</fieldset>
			</form>

<?php
			
			for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\ControladorSesiones.php\">";
			echo "<fieldset><legend>".$idiom['DatosSesion']."</legend>";
			echo "<input type=image id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"..\Archivos\lapiz.png\" width=\"30\"  height=\"30\" ></input>";
			echo "<input type=hidden id=deportista name=deportista value=".$form[$numar]["deportista"].">";
			echo "<input type=hidden id=fecha name=fecha value=".$form[$numar]["fecha"].">";
			echo "<input type=hidden id=comentario name=comentario value=".$form[$numar]["comentario"].">";
			echo "<input type=hidden id=tabla name=tabla value=".$form[$numar]["tabla"].">";
			//echo "<input type=hidden id=usuario name=usuario value=".$form[$numar]["usuario"].">";
			echo "<input type=image id=\"eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"..\Archivos\\eliminar.png\" width=\"30\"  height=\"30\" >";
			
			 echo "<thead>";			
			 echo "<tr>";

			echo "<br>";				 			
 			echo $idiom['Deportista'].":".$form[$numar]["usuario"];					
			echo "<br>";			
			echo $idiom['DNI'].":".$form[$numar]["deportista"];
			echo "<br>";
			echo $idiom['Fecha'].":"." ".$form[$numar]["fecha"];
			echo "<br>";
			echo $idiom['Comentario'].":"." ".$form[$numar]["comentario"];
			echo "<br>";
			echo $idiom['Tabla'].":"." ".$form[$numar]["tabla"];
			echo "<br>";
			echo "</thead>";
				
			for ($numarT =0;$numarT<200;$numarT++){

				if(isset($form[$numar]["idejercicio"."$numarT"]))
				{ 
					echo $idiom['Ejercicio'].":"." ".$form[$numar]["idejercicio"."$numarT"];
					echo "<br>";
				}
			
			 }
			
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
