<link rel="stylesheet" href="../css/styles.css">	
<?php
class sesionAlta{

	function crear($idioma,$listaDeportistas,$listablas){

		include("../Funciones/cargadodedatos.php");
?>
<script type="text/javascript">

    function enviarAltaSesion(){
    document.getElementById("altaSesion").submit();
    }
    function enviarPrincipalSesiones(){
    document.getElementById("Volver").submit();
    }
</script>

<?php
/////////////////////////////////Vista para el deportista que está con sesión activa//////////////////////////
			
    		echo "<div class=\"container \">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-7 well\">";
			echo "<form role=\"form\" name=\"form\" id=\"form\" class=\"form-group\" enctype=\"multipart/form-data\" method=\"post\"action=\"../Controlador/ControladorSesiones.php?altaSesion\">";
			
			echo "<fieldset><legend>".$idiom['AltaSesion']."</legend>";		

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"deportista\" id=\"deportista\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."select"." "."class=\"form-control\""." required id=\"deportista\" name=deportista><option></option>";	
	         	if($listaDeportistas!=null){ 

					for ($numar =0;$numar<count($listaDeportistas);$numar++)
					{						
						$dni=$listaDeportistas[$numar]["DNI"];
						$usuario=$listaDeportistas[$numar]["Usuario"];					
						if (isset($_SESSION['usuario'])){
						    if($_SESSION['usuario']==$usuario){
							echo '<option value="'.$dni.'">'.$usuario.'</option>';
                            }
						}
						if (isset($_SESSION['MONITOR'])){
							echo '<option value="'.$dni.'">'.$usuario.'</option>'; 
						}
					}
				}											
          	echo "</select>";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"comentario\"id =\"comentario\"> ".$idiom['Comentario'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."textarea"." "."class=\"form-control\""."name=comentario cols=40 rows=10>";
			echo "<"."/textarea".">";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"Tabla\" id =\"Tabla\"> ".$idiom['Tabla'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."select"." "."class=\"form-control\""."required id=\"tabla\" name=tabla><option></option>";
				
				if($listablas!=null){ 

							for ($numar =0;$numar<count($listablas);$numar++)
							{								
							
							$id=$listablas[$numar]["idtabla"];
							$nombre=$listablas[$numar]["nombre"];
							 echo '<option value="'.$id.'">'.$nombre.'</option>';
							}
						}									
	          	
          	echo "</select>";
        
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"fecha\"id =\"fecha\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."input"." "."class=\"form-control\""."type=date required id=fecha name=fecha>"; 
			echo "</div></div>";			

			echo "<div align=\"right\" class=\"input-group col-sm-6\">";
			echo "<input type=\"submit\" id=\"SubmitBtn\" name=\"altaSesion\" alt=\"Submit\" value=\"Enviar\" onclick=\"enviarAltaSesion();\" src=\"../Archivos/agregar.png\" width=\"20\" height=\"20\">";
			echo "</div>";
			echo "</form>";
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
