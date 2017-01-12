<html>
<head>
<title>
</title>
</head>
<body background="../Archivos/background-faded1.jpg">
<?php
class reservaAlta{

	function crear($idioma,$listaDeportistas,$listaActividades){

		include("../Funciones/cargadodedatos.php");
?>
<script type="text/javascript">

    function enviarAltaReserva(){
    document.getElementById("altaReserva").submit();

    }
    function enviarPrincipalReservas(){
    document.getElementById("Volver").submit();

    }
</script>

<?php
    		echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" id=formulario method=\"post\"action=\"..\Controlador\ControladorReservas.php\">";

			echo "<fieldset><legend>".$idiom['AltaReserva']."</legend>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"deportistaId\"id =\"deportistaId\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."required id=deportistaId name=deportistaId><option value='0'>".$idiom['SelecDep']."</option>";	
				
	         	if($listaDeportistas!=null){ 

					for ($numar =0;$numar<count($listaDeportistas);$numar++)
					{
						if($listaDeportistas[$numar]["DNI"]!='default'){
							//echo $formejercicios[$numar]["IdEjercicio"];
						
						$dni=$listaDeportistas[$numar]["DNI"];
						$usuario=$listaDeportistas[$numar]["Usuario"];
						 echo '<option value="'.$dni.'">'.$usuario.'</option>';
						}
					}
				}																								
          	echo "</select>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"actividadId\"id =\"actividadId\"> ".$idiom['Actividad'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."required id=actividadId name=actividadId><option value='0'>".$idiom['SelecAct']."</option>";	
				
	         	if($listaActividades!=null){ 

					for ($numar =0;$numar<count($listaActividades);$numar++)
					{	
						//echo $formejercicios[$numar]["IdEjercicio"];
					$id=$listaActividades[$numar]["id_Actividad"];
					$nombre=$listaActividades[$numar]["Nombre"];
					 echo '<option value="'.$id.'">'.$nombre.'</option>';
					}
				}																								
          	echo "</select>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"fecha\"id =\"fecha\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=date required id=fecha name=fecha>"; 
			echo "</div></div>";

			echo "<input type=\"image\" title=\"Crear reserva\" id=\"altaReserva\" name=\"altaReserva\" alt=\"Submit\" value=\"altaReserva\" onclick=\"enviarAltaReserva();\" src=\"..\Archivos\aceptar.png\" width=\"20\" height=\"20\">";

			echo "<input type=\"image\" title=\"Volver\" id=\"Volver\" name=\"Volver\" alt=\"Submit\" value=\"Volver\" onclick=\"enviarPrincipalReservas();\" src=\"..\Archivos\cancelar.png\" width=\"20\" height=\"20\">";


?>
<?php
		}
	}

?>
</body>
</html>