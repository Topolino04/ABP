<html>
<head>
<title>
</title>
</head>
<body background="..\Archivos\background-faded1.jpg">

<?php

	class reservaVista{
		
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
            function MostrarMensaje(){

            	return $idiom['Deportista'];
            }
   </script>
   <br>

   <div class="container well">
   <div class="row">
   <div class="col-xs-4">
   <table id="myTable">
   <tr> 
   <b>
   <td><div style="color:black;" id ="BotonNuevaReserva"> <?php echo $idiom['NuevaReserva']; echo "&nbsp;"; ?></td>
   </b>
   <td><form name="formularioalta"  class="form-horizontal" action="..\Controlador\ControladorReservas.php" method="post" >
		<input type="image" align="right" title=<?php echo$idiom['Alta'];?> id="alta" name="Alta" alt="Submit" value="Alta" onload="MostrarMensaje();" onclick="enviaralta();" src="..\Archivos\agregar.png" width="20" height="20"></input>
	</form></div></td>
	</tr>
	</div></table>
	</div></div></div>
	
	<br>

<?php
			
			for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form method=\"post\" action=\"..\Controlador\ControladorReservas.php\">";
			echo "<b><fieldset><legend>".$idiom['DatosReserva']."</legend></b>";
			echo "<input type=image title =".$idiom['Modificar']." id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"..\Archivos\lapiz.png\" width=\"30\"  height=\"30\" ></input>";
			echo "<input type=hidden id=deportistaId name=deportistaId value=".$form[$numar]["deportistaId"].">";
			echo "<input type=hidden id=actividadId name=actividadId value=".$form[$numar]["actividadId"].">";
			echo "<input type=hidden id=fecha name=fecha value=".$form[$numar]["fecha"].">";
			//echo "<input type=hidden id=plazas name=plazas value=".$form[$numar]["plazas"].">";
			//echo "<input type=hidden id=tabla name=tabla value=".$form[$numar]["tabla"].">";
			//echo "<input type=hidden id=usuario name=usuario value=".$form[$numar]["usuario"].">";
			echo "<input type=image title =".$idiom['Eliminar']." id=\"eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"..\Archivos\\eliminar.png\" width=\"30\"  height=\"30\" >";
			
			//echo "<thead>";			

			echo "<br>";				 			
 			echo $idiom['Deportista'].":"." ".$form[$numar]["usuario"];					
			echo "<br>";			
			echo $idiom['DNI'].":"." ".$form[$numar]["deportistaId"];
			echo "<br>";
			echo $idiom['Fecha'].":"." ".$form[$numar]["fecha"];
			echo "<br><b>";
			echo $idiom['Actividad'].":";
			echo "<br></b>";
			echo $idiom['PlazasRestantes'].":"." ".$form[$numar]["plazas0"];
			echo "<br>";
			echo $idiom['Id_actividad'].":"." ".$form[$numar]["actividadId"];
			echo "<br>";
			echo $idiom['Nombre'].":"." ".$form[$numar]["nombre0"];
			echo "<br>";
			/*echo "</thead>";
			echo "<br>";
			echo "</fieldset>";			
			echo "<b>";
			echo "<fieldset><legend>".$idiom['EjercicioTabla']." ".$form[$numar]["tabla"]."</legend>";
			echo "</b>";
				
			for ($numarT =0;$numarT<200;$numarT++){

				if(isset($form[$numar]["idejercicio"."$numarT"]))
				{ 
					echo $idiom['Id'].":"." ".$form[$numar]["idejercicio"."$numarT"];
					echo "<br>";
					echo $idiom['Nombre'].":"." ".$form[$numar]["Nombre"."$numarT"];
					echo "<br>";
					echo $idiom['Tipo'].":"." ".$form[$numar]["Tipo"."$numarT"];
					echo "<br>";
					echo $idiom['Tiempo'].":"." ".$form[$numar]["Tiempo"."$numarT"];
					echo "<br>";
					echo $idiom['Repeticiones'].":"." ".$form[$numar]["Repeticiones"."$numarT"];
					echo "<br>";
					echo $idiom['Series'].":"." ".$form[$numar]["Series"."$numarT"];
					echo "<br>";
					echo $idiom['Descripcion'].":"." ".$form[$numar]["Descripcion"."$numarT"];
					echo "<br>";
					echo "<br>";
				}

			
			}*/
			echo "</fieldset>";
			echo "</form>";

 			//echo "</div>";
			echo "</div>"; //Cierra col-xs-12

			echo "</div>"; //Cierra row

			echo "</div>"; //Cierra container
		}
			


	



?>
	</div></div></div>

	</div>
<?php
include '../plantilla/pie.php';
}
}
?>
</body>
</html>
