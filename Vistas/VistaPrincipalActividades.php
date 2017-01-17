<?php
class actividadvista{
	function crear($form,$idioma){
		include("../Funciones/cargadodedatos.php");
?>
<script type="text/javascript">
    function enviaralta(){
        document.getElementById("Alta").submit();
    }
    function enviarmodificar(){
    	document.getElementById("Modificar").submit();
    }
    function enviareliminar(){
    	document.getElementById("eliminar").submit();
    }
    function enviareliminarAlumno(){
    	document.getElementById("eliminarAlumno").submit();
    }
</script>

<br>
<div class="container">    
   <div class="row">
	   <div class="col-xs-2 well">
		   <table align=center id="myTable">
			   <tr> 					   
				   <td>	
				   		<b><div style="color:black;" id ="Alta"> <?php echo $idiom['NuevaActividad']; echo "&nbsp;"; ?></b>	
				   </td>
				   <td>	
  						 <form name="Alta" id ="Alta" class="form-horizontal" action="../Controlador/ControladorActividades.php" method="" >				
							<input type="submit" align="right" title=<?php echo$idiom['NuevaActividad'];?> id="Alta" name="Alta" alt="Submit" value="Alta" onload="MostrarMensaje();" onclick="enviaralta();">													
						</form>
						</div>
					</td>
				</tr>					
			</table>
		</div>
	</div>
</div>		
<br>

<?php

		
		for ($numar=0;$numar<count($form);$numar++){
			echo "<div class=\"container\">";
	 			echo "<div class=\"row\">";
					echo "<div class=\"col-xs-12  well\">";
						echo "<form class=\"form-horizontal\" method=\"post\" action=\"../Controlador/ControladorActividades.php\">";
							echo "<fieldset align=center><legend>".$idiom['DatosActividad'];//."</legend>";7
								echo "<input align=right type=\"submit\" id=\"Modificar\" name=\"Modificar\" value=\"Modificar\" onclick=\"enviarmodificar();\">";
                                echo "<input align=right type=image id=\"Asistencia\" name=\"Asistencia\" value=\"ida\" alt =\"Submit\" src=\"../Archivos/lista.png\" width=\"30\" height=\"30\">";
                                echo "<input type='hidden' name = 'actividad_id' value='{$form[$numar]['id_actividad']}'>";
                                echo "<input type='hidden' name = 'actividad_nom' value='{$form[$numar]['nombre']}'>";
								echo "<input align=right type=submit id=\"eliminar\" name=\"eliminar\" value=\"eliminar\" onclick=\"doSubmit();\" alt =\"Submit\">";
							echo "</legend>";
							echo "<input type=hidden id=id_actividad name=id_actividad value=".$form[$numar]["id_actividad"].">";
															
							echo "<input type=hidden id=nombre name=nombre value=".$form[$numar]["nombre"].">";
							echo "<input type=hidden id=duracion name=duracion value=".$form[$numar]["duracion"].">";
							echo "<input type=hidden id=hora name=hora value=".$form[$numar]["hora"].">";
							echo "<input type=hidden id=lugar name=lugar value=".$form[$numar]["lugar"].">";
							echo "<input type=hidden id=plazas name=plazas value=".$form[$numar]["plazas"].">";
							echo "<input type=hidden id=dificultad name=dificultad value=".$form[$numar]["dificultad"].">";
							echo "<input type=hidden id=descripcion name=descripcion value=".$form[$numar]["descripcion"].">";
					
						echo "<div class=\"row\">";
							echo "<div class=\"col-xs-6 well\">";
								
								echo "<fieldset align=left><legend>". $idiom['Actividad'].":"." ".$form[$numar]["nombre"]."</legend>";						
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
								echo"</fieldset>";
								echo"</form>";	
							
				 			echo "</div>";//Cierra la columna con datos de la actividad		
						
							echo "<div class=\"col-xs-6 well\">";
								echo "<fieldset align=left><legend>".$idiom['Alumnos']."</legend>";
								//\"entrenadorId".$numarC."\"=>'$entrenadorId',
								
								
								for ($numarT=0;$numarT<200;$numarT++){
									if(isset($form[$numar]["identificador_deportista"."$numarT"]))
									{
										if($form[$numar]["identificador_deportista"."$numarT"]=='default'){
											
										}else{
										echo "<div align=center class=\"col-xs-6\">";							
										echo $form[$numar]["UsuarioDeportista"."$numarT"];
										echo "</div>";
										echo "<input type=hidden id=id_alumno name=id_alumno value=".$form[$numar]["identificador_deportista"."$numarT"].">";
										echo "<div align=center class=\"col-xs-6\">";
										echo "<input title =".$idiom['Eliminar']." type=\"submit\" id=\"eliminarAlumno\" name=\"eliminarAlumno\" value=\"Eliminar\" onclick=\"enviareliminarAlumno()\" alt =\"Submit\" src=\"../Archivos/cancelar.png\" width=\"20\"  height=\"20\" >";											echo "</div>";									
										echo "<br>";
										}
										
									}	
								}
								echo"</fieldset>";
							echo "</div>";//Cierra columna con alumnos
						echo "</div>";//Cierra columna con alumnos
					echo "</div>";//Cierra las comunas anidadas			
				echo "</div>";//Cierra la columna del titulo
			echo "</div>";//Cierra el container

		 	}
	include '../plantilla/pie.php';
	}//Cierra la funcion crear()
}//Cierra la clase
?>
