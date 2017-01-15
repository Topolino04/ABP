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

 <br>
   <div class="container">    
	   <div class="row">
		   <div class="col-xs-2 well">
			   <table align=center id="myTable">
				   <tr> 					   
					   <td>	
					   		<b><div style="color:black;" id ="BotonNuevaSesion"> <?php echo $idiom['NuevaSesion']; echo "&nbsp;"; ?></b>	
					   </td>
					   <td>	
	  						 <form name="alta" class="form-horizontal" action="../Controlador/ControladorSesiones.php" method="post" >				
								<input type="image" align="right" title=<?php echo$idiom['NuevaSesion'];?> id="Alta" name="Alta" alt="Submit" value="Alta" onload="MostrarMensaje();" onclick="enviaralta();" src="../Archivos/agregar.png" width="20" height="20">						
								</input>						
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
	//Vista para el deportista que está con sesión activa
	$userLoggedIn=$form[$numar]["usuario"];
	//if (($_SESSION['usuario']!="ADMIN") && ($_SESSION['usuario']!="MONITOR") && ($_SESSION['usuario']==$userLoggedIn)){
    if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]==$userLoggedIn){
			echo "<div class=\"container well\">";
	 			echo "<div class=\"row\">";
					echo "<div class=\"col-xs-6\">";
						echo "<form method=\"post\" action=\"..\Controlador\ControladorSesiones.php\">";

						echo "<b><fieldset><legend>".$idiom['DatosSesion']." ".$form[$numar]["usuario"]."</legend></b>";
							echo "<input type=image title =".$idiom['Modificar']." id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"../Archivos/lapiz.png\" width=\"30\"  height=\"30\" ></input>";
							echo "<input type=hidden id=deportista name=deportista value=".$form[$numar]["deportista"].">";
							echo "<input type=hidden id=fecha name=fecha value=".$form[$numar]["fecha"].">";
							echo "<input type=hidden id=comentario name=comentario value=".$form[$numar]["comentario"].">";
							echo "<input type=hidden id=tabla name=tabla value=".$form[$numar]["tabla"].">";
							//echo "<input type=hidden id=usuario name=usuario value=".$form[$numar]["usuario"].">";
							echo "<input type=image title =".$idiom['Eliminar']." id=\"eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"../Archivos/eliminar.png\" width=\"30\"  height=\"30\" >";
							
							echo "<thead>";			

							echo "<br>";				 			
				 			//echo $idiom['Deportista'].":"." ".$form[$numar]["usuario"];					
							echo "<br>";			
							echo $idiom['DNI'].":"." ".$form[$numar]["deportista"];
							echo "<br>";
							echo $idiom['Fecha'].":"." ".$form[$numar]["fecha"];
							echo "<br>";
							echo $idiom['Comentario'].":"." ".$form[$numar]["comentario"];
							echo "<br>";
							echo $idiom['Tabla'].":"." ".$form[$numar]["tabla"];
							echo "<br>";
							echo "</thead>";
							echo "<br>";
						echo "</fieldset>";	
						echo "</div>"; //Cierra col-xs-6
						echo "<div class=\"col-xs-6\">";		
							echo "<b>";
							echo "<fieldset><legend>".$idiom['EjercicioTabla']." ".$form[$numar]["NombreTabla"]."</legend>";
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
							}
							echo "</fieldset>";
							echo "</form>";
				 			//echo "</div>";
						echo "</div>"; //Cierra col-xs-6
				echo "</div>"; //Cierra row
			echo "</div>"; //Cierra container
     	}
///////////////////////////Vista para ADMIN y MONITOR///////////////////////////////////
	}
	if (isset($_SESSION['MONITOR'])){
		

	echo "<div class=\"container well\">";
	echo "<div class=\"row\">";
	echo "<div class=\"col-xs-6\">";
	echo "<form method=\"post\" action=\"../Controlador/ControladorSesiones.php\">";
	

	echo "<b><fieldset><legend>".$idiom['DatosSesion']." ".$form[$numar]["usuario"]."</legend></b>";
	echo "<input type=image title =".$idiom['Modificar']." id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"../Archivos/lapiz.png\" width=\"30\"  height=\"30\" ></input>";
	echo "<input type=hidden id=deportista name=deportista value=".$form[$numar]["deportista"].">";
	echo "<input type=hidden id=fecha name=fecha value=".$form[$numar]["fecha"].">";
	echo "<input type=hidden id=comentario name=comentario value=".$form[$numar]["comentario"].">";
	echo "<input type=hidden id=tabla name=tabla value=".$form[$numar]["tabla"].">";
	//echo "<input type=hidden id=usuario name=usuario value=".$form[$numar]["usuario"].">";
	echo "<input type=image title =".$idiom['Eliminar']." id=\"eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"../Archivos/eliminar.png\" width=\"30\"  height=\"30\" >";
	
	echo "<thead>";			

	echo "<br>";				 			
		//echo $idiom['Deportista'].":"." ".$form[$numar]["usuario"];					
	echo "<br>";			
	echo $idiom['DNI'].":"." ".$form[$numar]["deportista"];
	echo "<br>";
	echo $idiom['Fecha'].":"." ".$form[$numar]["fecha"];
	echo "<br>";
	echo $idiom['Comentario'].":"." ".$form[$numar]["comentario"];
	echo "<br>";
	echo $idiom['Tabla'].":"." ".$form[$numar]["tabla"];
	echo "<br>";
	echo "</thead>";
	echo "<br>";
	echo "</fieldset>";	
	echo "</div>"; //Cierra col-xs-4
	echo "<div class=\"col-xs-6\">";		
	echo "<b>";
	echo "<fieldset><legend>".$idiom['EjercicioTabla']." ".$form[$numar]["NombreTabla"]."</legend>";
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
	}
	echo "</fieldset>";
	echo "</form>";
		//echo "</div>";
	echo "</div>"; //Cierra col-xs-6
	echo "</div>"; //Cierra row
	echo "</div>"; //Cierra container

	}
	
}
?>
	
<?php
include '../plantilla/pie.php';
}
}
  
?>
