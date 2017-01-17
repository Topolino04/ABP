<link rel="stylesheet" href="../css/styles.css">
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
			echo "<form class=\"form-horizontal\" name=\"form\" id=\"form\" method=\"post\"action=\"../Controlador/ControladorReservas.php\">";

			echo "<fieldset><legend>".$idiom['AltaReserva']."</legend>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"deportistaId\"id =\"deportistaId\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."required id=\"deportistaId\" name=\"deportistaId\"><option value='0'>".$idiom['SelecDep']."</option>";	
				
	         	if($listaDeportistas!=null){ 

					for ($numar =0;$numar<count($listaDeportistas);$numar++)
					{
                        $userLoggedIn=$listaDeportistas[$numar]["Usuario"];

                        if(isset($_SESSION["usuario"])) {
                            if ($_SESSION["usuario"] == $userLoggedIn) {
                                if ($listaDeportistas[$numar]["DNI"] != 'default') {
                                    //echo $formejercicios[$numar]["IdEjercicio"];

                                    $dni = $listaDeportistas[$numar]["DNI"];
                                    $usuario = $listaDeportistas[$numar]["Usuario"];
                                    echo '<option value="' . $dni . '">' . $usuario . '</option>';
                                }
                            }
                        }

                        if(isset($_SESSION["MONITOR"])) {
                                if ($listaDeportistas[$numar]["DNI"] != 'default') {
                                    //echo $formejercicios[$numar]["IdEjercicio"];

                                    $dni = $listaDeportistas[$numar]["DNI"];
                                    $usuario = $listaDeportistas[$numar]["Usuario"];
                                    echo '<option value="' . $dni . '">' . $usuario . '</option>';
                                }
                        }
					}
				}																								
          	echo "</select>";
			echo "</div></div>";


			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"actividadId\"id =\"actividadId\"> ".$idiom['Actividad'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."required id=\"actividadId\" name=\"actividadId\"><option value='0'>".$idiom['SelecAct']."</option>";	
				
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

			echo "<input type=\"submit\" title=\"Crear reserva\" id=\"altaReserva\" name=\"altaReserva\" alt=\"Submit\" value=\"Enviar\" onclick=\"enviarAltaReserva();\">";

			echo "<input type=\"submit\" title=\"Volver\" id=\"Volver\" name=\"Volver\" alt=\"Submit\" value=\"Volver\" onclick=\"enviarPrincipalReservas();\">";
/////////VALIDACION MULTIDIOMA			
?>
<script type="text/javascript" src="../js/lib/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/dist/jquery.validate.js" charset="UTF-8"></script>
<?php
	if (isset($_SESSION['idioma'])){
		if($_SESSION['idioma']=="español"){
			?>
		      <script type="text/javascript" src="../js/src/localization/messages_es.js" /></script>
		    <?php
		    }elseif($_SESSION['idioma']=="gallego"){
		      ?>
		      <script type="text/javascript" src="../js/src/localization/messages_es_AR.js" /></script>
		    <?php
		    }elseif($_SESSION['idioma']=="ingles"){
		    }
		     
		}else{
		    ?>
		      <script type="text/javascript" src="../js/src/localization/messages_es.js" /></script>
		    <?php
		}

?>
<script type="text/javascript" src="../js/form-validation.js" charset="UTF-8"></script>
<?php
////////VALIDACION MULTIDIOMA
		}
	}

?>
