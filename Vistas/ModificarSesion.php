<?php 
setlocale (LC_TIME, "es_ES.UTF-8");
class sesionModificar{

	function crear($idioma,$deportista,$fecha,$comentario,$tabla,$listaDeportistas,$listablas){

		include("../Funciones/cargadodedatos.php");
?>
		<script type="text/javascript">

            function enviarModificarSesion()
            {
                document.getElementById("ModificarSesion").submit();
                
            }
            </script>
 <?php
			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\"action=\"..\Controlador\ControladorSesiones.php\">";			
			echo "<fieldset><legend>".$idiom['ModificarSesion']."</legend>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"deportista\"id =\"deportista\"> ".$idiom['DNI'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."input"." "."class=\"form-control\""."type=text required id=deportista name=deportista  readonly value=\"".$deportista."\" >"; 
			echo "</div></div>";
			
				
			/*echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"deportista\"id =\"deportista\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."required id=deportista name=deportista><option value=".$deportista.">".$idiom['SelecDep']."</option>";	
				
												

	         	if($listaDeportistas!=null){ 

							for ($numar =0;$numar<count($listaDeportistas);$numar++)
							{
								
								//echo $formejercicios[$numar]["IdEjercicio"];
							$dni=$listaDeportistas[$numar]["DNI"];
							$usuario=$listaDeportistas[$numar]["Usuario"];
							 echo '<option value="'.$dni.'">'.$usuario.'</option>';
							}
						}
													
	           
														
          	echo "</select>";
			echo "</div></div>";*/

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"fecha\"id =\"fecha\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<input class=\"form-control\" type=\"datetime\" required id=\"fecha\" name=\"fecha\" readonly value =".$fecha.">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"comentario\"id =\"comentario\"> ".$idiom['Comentario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."textarea"." "."class=\"form-control\""."name=comentario cols=40 rows=10 placeholder =".$comentario.">";
			echo "<"."/textarea".">";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"tabla\"id =\"tabla\"> ".$idiom['Tabla'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<"."select"." "."class=\"form-control\""."required id=tabla name=tabla><option value=".$tabla.">".$idiom['SelecTab']."</option>";
				
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
			


			echo "<input type=\"image\" id=\"ModificarSesion\" name=\"ModificarSesion\" alt=\"Submit\" value=\"ModificarSesion\" onclick=\"enviarModificarSesion();\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\">";  	
			

?>
<?php
		}
	}

?>
