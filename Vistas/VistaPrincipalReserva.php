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

    	document.getElementById("Eliminar").submit();
    }
    function MostrarMensaje(){

    	return $idiom['Deportista'];
    }
</script>
   
<br>
<div class="container">    
   <div class="row">
	   <div class="col-xs-2 well">
		   <table align=center id="myTable">
			   <tr> 					   
				   <td>	
                        <b>				  
				   		<div style="color:black;" id ="BotonNuevaReserva"><?php echo $idiom['NuevaReserva']; echo "&nbsp;"; ?></b>
				   </td>
				   <td>
				   		<form name="formularioalta" id="alta" class="form-horizontal" action="../Controlador/ControladorReservas.php" method="" >
							<input type="submit" align="right" title=<?php echo$idiom['NuevaReserva'];?> id="alta" name="Alta" alt="Submit" value="Alta" onclick="enviaralta();">
							
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

    $userLoggedIn=$form[$numar]["usuario"];

    if(isset($_SESSION["usuario"])){
        if($_SESSION["usuario"]==$userLoggedIn) {

            echo "<div class=\"container\">";
            echo "<div class=\"row no-gutters\">";
            echo "<div class=\"col-xs-4 well\">";
            echo "<form method=\"post\" action=\"..\Controlador\ControladorReservas.php\">";
            echo "<fieldset><legend><b>" . $idiom['DatosReserva'] . "</b>";
            //echo "</b>";
            /*echo "<input align=right type=image title =" . $idiom['Modificar'] . " id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"..\Archivos\lapiz.png\" width=\"30\"  height=\"30\" >;*/
            echo "<input align=right type=\"submit\" title =" . $idiom['Eliminar'] . " id=\"Eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"enviareliminar();\" alt =\"Submit\" >";
            echo "<input type=hidden id=deportistaId name=deportistaId value=" . $form[$numar]["deportistaId"] . ">";
            echo "<input type=hidden id=actividadId name=actividadId value=" . $form[$numar]["actividadId"] . ">";
            echo "<input type=hidden id=AñoMesDia name=AñoMesDia value=" . $form[$numar]["AñoMesDia"] . ">";
            echo "<input type=hidden id=HoraMinutos name=HoraMinutos value=" . $form[$numar]["HoraMinutos"] . ">";
            //echo "<input type=hidden id=plazas name=plazas value=".$form[$numar]["plazas"].">";
            //echo "<input type=hidden id=tabla name=tabla value=".$form[$numar]["tabla"].">";
            //echo "<input type=hidden id=usuario name=usuario value=".$form[$numar]["usuario"].">";
            echo "</legend>";
            echo "</fieldset>";

            echo $idiom['Deportista'] . ":" . " " . $form[$numar]["usuario"];
            echo "<br>";
            echo $idiom['DNI'] . ":" . " " . $form[$numar]["deportistaId"];
            echo "<br>";

            echo $idiom['Fecha'] . ":" . " " . $form[$numar]["AñoMesDia"];
            echo "<fieldset>";

            echo $idiom['Actividad'] . ":" . " " . $form[$numar]["actividadId"];
            echo "<br>";
            echo $idiom['Nombre'] . ":" . " " . $form[$numar]["nombre"];
            echo "<br>";
            echo $idiom['Plazas'] . ":" . " " . $form[$numar]["plazas"];
            echo "<br>";
            echo "</fieldset>";

            echo "</form>";

            //echo "</div>";
            echo "</div>"; //Cierra col-xs-12

            echo "</div>"; //Cierra row

            echo "</div>"; //Cierra container
        }
    }
    }
for ($numar =0;$numar<count($form);$numar++){
if(isset($_SESSION["MONITOR"])){  
echo "<div class=\"container\">";
		echo "<div class=\"row no-gutters\">";
		echo "<div class=\"col-xs-4 well\">";
			echo "<form method=\"post\" action=\"../Controlador/ControladorReservas.php\">";
				echo "<fieldset><legend><b>".$idiom['DatosReserva']."</b>";
					//echo "</b>";
					//echo "<input align=right type=image title =".$idiom['Modificar']." id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"../Archivos/lapiz.png\" width=\"30\"  height=\"30\" ></input>";
					 echo "<input align=right type=\"submit\" title =" . $idiom['Eliminar'] . " id=\"Eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"enviareliminar();\" alt =\"Submit\" >";
					echo "<input type=hidden id=deportistaId name=deportistaId value=".$form[$numar]["deportistaId"].">";
					echo "<input type=hidden id=actividadId name=actividadId value=".$form[$numar]["actividadId"].">";
					echo "<input type=hidden id=AñoMesDia name=AñoMesDia value=".$form[$numar]["AñoMesDia"].">";
					echo "<input type=hidden id=HoraMinutos name=HoraMinutos value=".$form[$numar]["HoraMinutos"].">";
					//echo "<input type=hidden id=plazas name=plazas value=".$form[$numar]["plazas"].">";
					//echo "<input type=hidden id=tabla name=tabla value=".$form[$numar]["tabla"].">";
					//echo "<input type=hidden id=usuario name=usuario value=".$form[$numar]["usuario"].">";
					echo "</legend>";
					echo "</fieldset>";

		 			echo $idiom['Deportista'].":"." ".$form[$numar]["usuario"];
					echo "<br>";
					echo $idiom['DNI'].":"." ".$form[$numar]["deportistaId"];
					echo "<br>";

echo $idiom['Fecha'] . ":" . " " . $form[$numar]["AñoMesDia"];
echo "<fieldset>";

echo $idiom['Actividad'] . ":" . " " . $form[$numar]["actividadId"];
echo "<br>";
echo $idiom['Nombre'] . ":" . " " . $form[$numar]["nombre"];
echo "<br>";
echo $idiom['Plazas'] . ":" . " " . $form[$numar]["plazas"];
echo "<br>";
echo "</fieldset>";


echo "</form>";

//echo "</div>";
echo "</div>"; //Cierra col-xs-12

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
