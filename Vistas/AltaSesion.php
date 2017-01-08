<html>
<head>
<title>
</title>
</head>
<body background="..\Archivos\background-faded1.jpg">
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
    		echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" id=formulario method=\"post\"action=\"..\Controlador\ControladorSesiones.php?\">";
			
			echo "<fieldset><legend>".$idiom['AltaSesion']."</legend>";		

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"deportista\"id =\"deportista\"> ".$idiom['Deportista'].":</label>";
			echo "<div class=\"input-group col-sm-4\">";
			echo "<"."select"." "."class=\"form-control\""."required id=deportista name=deportista><option value='0'>".$idiom['SelecDep']."</option>";	
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
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"comentario\"id =\"comentario\"> ".$idiom['Comentario'].":</label>";
			echo "<div class=\"input-group col-sm-4\">";
			echo "<"."textarea"." "."class=\"form-control\""."name=comentario cols=40 rows=10>";
			echo "<"."/textarea".">";
			echo "</div></div>";

			echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"Tabla\"id =\"Tabla\"> ".$idiom['Tabla'].":</label>";
			echo "<div class=\"input-group col-sm-4\">";
			echo "<"."select"." "."class=\"form-control\""."required id=tabla name=tabla><option value='0'>".$idiom['SelecTab']."</option>";
				
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


			echo "<input type=\"image\" id=\"altaSesion\" name=\"altaSesion\" alt=\"Submit\" value=\"altaSesion\" onclick=\"enviarAltaSesion();\" src=\"..\Archivos\agregar.png\" width=\"20\" height=\"20\">";  	
			echo "<input type=\"image\" title=\"Volver\" id=\"Volver\" name=\"Volver\" alt=\"Submit\" value=\"Volver\" onclick=\"enviarPrincipalSesiones();\" src=\"..\Archivos\cancelar.png\" width=\"20\" height=\"20\">";

?>
<?php
		}
	}

?>
</body>
</html>