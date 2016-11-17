<?php 

class panel{ 
    
	function constructor($idioma){ 
        include '../plantilla/cabecera.php';
        $clase=new cabecera();
        $clase->crear($idioma);
        ?>

        <script type="text/javascript">

            function enviargalicia()
            {
                document.getElementById("galicia").submit();
                
            }
            function enviarespañol()
            {
                document.getElementById("español").submit();
            }
            function enviaringles()
              {
                document.getElementById("ingles").submit();
             }
             function enviarsalir(){
                document.getElementById("salir").submit();
             }
   </script>
        <?php 
        ?><form method="post" action="../Controlador/ControladorPrincipal.php">
                     <input type="image" id="salir" name="salir" alt="Submit" value="salir" onclick="enviarsalir();" align="right" src="../Archivos/salir.png" height="30" width="30">
                        </form>
        <?php 
        echo "<form name=\"idiomasform\"  method=\"post\" action=\"..\Controlador\ControladorPrincipal.php\">";
		echo "<input type=image id=\"gallego\" onclick=\"enviargalicia();\" name=\"idiomas\" alt =\"Submit\" src=\"..\Archivos\galicia.png\" align=\"right\" width=\"30\" value=\"gallego\" height=\"30\">";
        echo " ";
        echo "<input type=image id=\"español\" onclick=\"enviarespañol();\" name=\"idiomas\" alt =\"Submit\" src=\"..\Archivos\\españa.gif\" align=\"right\" width=\"30\" value=\"español\" height=\"30\">";
        echo " ";
        echo "<input type=image id=\"ingles\" onclick=\"enviaringles();\" name=\"idiomas\" alt =\"Submit\" src=\"..\Archivos\ingles.png\" align=\"right\" width=\"30\" value=\"ingles\" height=\"30\">";
		echo "</form>";
        
		?>
        <?php
        include'../plantilla/pie.php';
	?>

 <?php
 }
  }
?>