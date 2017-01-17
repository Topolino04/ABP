<?php
class sesionVista{		
	function crear($form,$idioma){
		include("../Funciones/cargadodedatos.php");
 ?>    	
<script type="text/javascript">


    function enviaralta(){

        document.getElementById("Alta").submit();
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
	   <div class="col-xs-3 well">
		   <table align=center id="myTable">
			   <tr> 					   
				   <td>	
				   		<b><div style="color:black;" id ="Alta"> <?php echo $idiom['NuevaSesion']; echo "&nbsp;"; ?></b>	
				   </td>
				   <td>	
  						 <form name="Alta" id ="Alta" class="form-horizontal" action="../Controlador/ControladorSesiones.php" method="" >		<div  class="col-xs-2">		
							<input type="submit" title=<?php echo$idiom['NuevaSesion'];?> id="Alta" name="Alta" alt="Submit" value="Alta" onclick="enviaralta();">			
							</div>						
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
			
		for ($numar =0;$numar<count($form);$numar++){

			//Vista para el deportista que está con sesión activa
			$userLoggedIn=$form[$numar]["usuario"];
			//if (($_SESSION['usuario']!="ADMIN") && ($_SESSION['usuario']!="MONITOR") && ($_SESSION['usuario']==$userLoggedIn)){
            if(isset($_SESSION["usuario"])){
                if($_SESSION["usuario"]==$userLoggedIn){
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-4\">";
			echo "<form method=\"post\" action=\"../Controlador/ControladorSesiones.php\">";
			

			echo "<b><fieldset><legend>".$idiom['DatosSesion']." ".$form[$numar]["usuario"]."</legend></b>";

			echo "<input align=\"right\" type=\"submit\" id=\"Modificar\" name=\"Modificar\" value=\"Modificar\" onclick=\"enviarmodificar();\">";
			echo "<input type=\"hidden\" id=\"deportista\" name=\"deportista\" value=".$form[$numar]["deportista"].">";

			echo "<input type=\"hidden\" id=\"idSesion\" name=\"idSesion\" value=" . $form[$numar]["idSesion"] . ">";
			echo "<input type=\"hidden\" id=\"AñoMesDia\" name=\"AñoMesDia\" value=" . $form[$numar]["AñoMesDia"] . ">";
            echo "<input type=\"hidden\" id=\"HoraMinutos\" name=\"HoraMinutos\" value=" . $form[$numar]["HoraMinutos"] . ">";

			echo "<input type=hidden id=\"comentario\" name=\"comentario\" value=".$form[$numar]["comentario"].">";
			echo "<input type=hidden id=\"tabla\" name=\"tabla\" value=".$form[$numar]["tabla"].">";
			//echo "<input type=hidden id=usuario name=usuario value=".$form[$numar]["usuario"].">";
			echo "<input align=right type=\"submit\" id=\"eliminar\" name=\"eliminar\" value=\"Eliminar\" onclick=\"doSubmit();\" alt =\"Submit\">";
			//$fecha=preg_replace('[_]'," ", $form[$numar]["fecha"]);
			//$comentario=preg_replace('[_]'," ", $form[$numar]["comentario"]);			
			echo "<thead>";			
			echo "<br>";
			echo $idiom['DNI'].":"." ".$form[$numar]["deportista"];
			echo "<br>";			
			echo $idiom['Fecha'] . ":" . " " . $form[$numar]["AñoMesDia"]." ".$form[$numar]["HoraMinutos"];
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
					echo "<b><fieldset><legend>".$form[$numar]["Nombre"."$numarT"]."</legend></b>";	
					echo "</b>";					
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
			}if (isset($_SESSION['MONITOR'])){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-4\">";
			echo "<form method=\"post\" action=\"../Controlador/ControladorSesiones.php\">";
			

			echo "<b><fieldset><legend>".$idiom['DatosSesion']." ".$form[$numar]["usuario"]."</legend></b>";

			echo "<input align=\"right\" type=\"submit\" id=\"Modificar\" name=\"Modificar\" value=\"Modificar\" onclick=\"enviarmodificar();\">";
			echo "<input type=\"hidden\" id=\"deportista\" name=\"deportista\" value=".$form[$numar]["deportista"].">";

			echo "<input type=\"hidden\" id=\"idSesion\" name=\"idSesion\" value=" . $form[$numar]["idSesion"] . ">";
			echo "<input type=\"hidden\" id=\"AñoMesDia\" name=\"AñoMesDia\" value=" . $form[$numar]["AñoMesDia"] . ">";
            echo "<input type=\"hidden\" id=\"HoraMinutos\" name=\"HoraMinutos\" value=" . $form[$numar]["HoraMinutos"] . ">";

			echo "<input type=hidden id=\"comentario\" name=\"comentario\" value=".$form[$numar]["comentario"].">";
			echo "<input type=hidden id=\"tabla\" name=\"tabla\" value=".$form[$numar]["tabla"].">";
			//echo "<input type=hidden id=usuario name=usuario value=".$form[$numar]["usuario"].">";
			echo "<input align=right type=\"submit\" id=\"eliminar\" name=\"eliminar\" value=\"Eliminar\" onclick=\"doSubmit();\" alt =\"Submit\">";
			//$fecha=preg_replace('[_]'," ", $form[$numar]["fecha"]);
			//$comentario=preg_replace('[_]'," ", $form[$numar]["comentario"]);			
			echo "<thead>";			
			echo "<br>";
			echo $idiom['DNI'].":"." ".$form[$numar]["deportista"];
			echo "<br>";			
			echo $idiom['Fecha'] . ":" . " " . $form[$numar]["AñoMesDia"]." ".$form[$numar]["HoraMinutos"];
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
					echo "<b><fieldset><legend>".$form[$numar]["Nombre"."$numarT"]."</legend></b>";	
					echo "</b>";					
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
	</div></div></div>

	</div>
<?php
include '../plantilla/pie.php';
}
}
  
?>
