<link rel="stylesheet" href="css/styles.css"/>
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

			echo "<div class=\"form-group\"><label class=\"col-sm-3 control-label\" for=\"deportistaId\"id =\"deportistaId\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-6\">";
			echo "<"."select"." "."class=\"form-control\""."required id=deportistaId name=deportistaId><option value='0'>".$idiom['SelecDep']."</option>";	
				
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
?>
<?php
		}
	}

?>

