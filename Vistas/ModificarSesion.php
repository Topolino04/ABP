<html>
<head>

<link rel="stylesheet" href="css/styles.css"/>
<title>
</title>
</head>
<body background="../Archivos/background-faded1.jpg">
<?php 
setlocale (LC_TIME, "es_ES.UTF-8");
class sesionModificar{

	function crear($idioma,$form1,$listaDeportistas,$listablas){

		include("../Funciones/cargadodedatos.php");
?>
		<script type="text/javascript">

            function enviarModificarSesion()
            {
                document.getElementById("ModificarSesion").submit();
                
            }
            </script>
 <?php
 			echo "<div class=\"container \">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-7 well\">";
			echo "<form role=\"form\" name=\"form\" id=\"form\" class=\"form-group\" enctype=\"multipart/form-data\" method=\"post\"action=\"../Controlador/ControladorSesiones.php\">";
			
			echo "<fieldset><legend>".$idiom['ModificarSesion']."</legend>";

			echo "<input type=hidden id=deportista name=deportista value=".$form1["deportista"].">";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"icdeportista\" id=\"icdeportista\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			
	         	if($listaDeportistas!=null){ 

					for ($numar =0;$numar<count($listaDeportistas);$numar++)
					{
						
						//echo $formejercicios[$numar]["IdEjercicio"];
					$dni=$listaDeportistas[$numar]["DNI"];
					$usuario=$listaDeportistas[$numar]["Usuario"];
			echo "<"."select"." "."class=\"form-control\""." required readonly id=\"icdeportista\" name=icdeportista value='0'><option>".$usuario."</option>";	
					 
					}
				}											
          	echo "</select>";
			echo "</div></div>";

			echo "<input type=hidden id=fecha name=fecha value=".$form1["fecha"].">";
			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"fecha\"id =\"fecha\"> ".$idiom['Fecha'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<input class=\"form-control\" type=\"text\" required id=\"fecha\" name=\"fecha\" value=\"".$form1["fecha"]."\">"; 
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"comentario\"id =\"comentario\"> ".$idiom['Comentario'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."textarea"." "."class=\"form-control\""."name=comentario cols=40 rows=10>";
			echo "<"."/textarea".">";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"Tabla\" id =\"Tabla\"> ".$idiom['Tabla'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."select"." "."class=\"form-control\""."required id=\"Tabla\" name=Tabla><option></option>";
				
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
			echo "<div align=\"right\" class=\"input-group col-sm-6\">";			
			echo "<input type=\"submit\" id=\"ModificarSesion\" name=\"ModificarSesion\" alt=\"Submit\" value=\"Enviar\" onclick=\"enviarModificarSesion();\" src=\"../Archivos/agregar.png\" width=\"20\" height=\"20\">";			
			echo "</div>";
			echo "</form>";

			/*echo "<div class=\"container\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12 well\">";
			echo "<form class=\"form-horizontal\" method=\"post\"action=\"../Controlador/ControladorSesiones.php\">";			
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

		/*	echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"fecha\"id =\"fecha\"> ".$idiom['Fecha'].":</label>";
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
			echo "</div></div>";*/			
			


				
			

?>
<?php
		}
	}

?>
</body>
</html>