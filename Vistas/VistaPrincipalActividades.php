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

		for ($numar=0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
	 			echo "<div class=\"row\">";
					echo "<div class=\"col-xs-12\">";
						echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\ControladorActividades.php\">";
							echo "<fieldset align=center><legend>".$idiom['DatosActividad'];//."</legend>";
								echo "<input align=right type=image id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"..\Archivos\lapiz.png\" width=\"30\"  height=\"30\" ></input>";
								echo "<input  type=hidden id=id_actividad name=id_actividad value=".$form[$numar]["id_actividad"].">";
								//echo "<input type=hidden id=id_alumno name=id_actividad value=".$form[$numar]["id_actividad"].">";
								echo "<input type=hidden id=id_actividad name=id_actividad value=".$form[$numar]["id_actividad"].">";
								echo "<input align=right type=image id=\"eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"..\Archivos\\eliminar.png\" width=\"30\"  height=\"30\" >";
									
							echo "</legend>";
						//echo "</div>";//Cierra la columna del titulo (datos de la actividad)
						echo "<div class=\"row\">";
							echo "<div class=\"col-xs-6\">";
								
								echo "<fieldset><legend>". $idiom['Actividad'].":"." ".$form[$numar]["nombre"]."</legend>";
								//echo $idiom['Actividad'].":"." ".$form[$numar]["nombre"];
								
								echo $idiom['Monitor'].":"." ".$form[$numar]["NombreEntrenadorActividad"];
								echo "<br>";
								echo $idiom['Duracion'].":"." ".$form[$numar]["duracion"];
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
								echo $idiom['PlazasLibres'].":"." ".$form[$numar]["plazas_libres"];
								echo "<br>";
								echo"</fieldset>";
								echo"</form>";	
							
				 			echo "</div>";//Cierra la columna con datos de la actividad		
						
							echo "<div class=\"col-xs-6\">";
								echo "<fieldset><legend>".$idiom['Alumnos']."</legend>";
								//\"entrenadorId".$numarC."\"=>'$entrenadorId',
								
								for ($numarT=0;$numarT<200;$numarT++){

									if(isset($form[$numar]["alumnoId"."$numarT"]))
									{
										echo $form[$numar]["alumnoId"."$numarT"];
										echo "<input type=hidden id=id_alumno name=id_alumno value=".$form[$numar]["alumnoId"."$numarT"].">";
										echo "<input align=right type=image id=\"eliminarAlumno\" name=\"eliminarAlumno\" value=\"eliminarAlumno\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"..\Archivos\\cancelar.png\" width=\"20\"  height=\"20\" >";
										echo "<br>";										
									}
								}
								echo"</fieldset>";
							echo "</div>";//Cierra columna con alumnos
						echo "</div>";//Cierra columna con alumnos
					echo "</div>";//Cierra las comunas anidadas			
				echo "</div>";//Cierra la columna del titulo
			echo "</div>";//Cierra el container

		 	}


?>
	</div></div></div>

	</div>
<?php
include '../plantilla/pie.php';
}
}
?>
