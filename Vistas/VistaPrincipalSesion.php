<?php
	class Sesionvista{

		function crear($form,$idioma){

			include("../Funciones/comprobaridioma.php");
        include '../plantilla/cabecera.php';
        include('../plantilla/menulateral.php');
        $clase=new cabecera();
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        $clase->crear($idiom);
        $menus=new menulateral();
        $menus->crear($idiom);
    		?>
<script type="text/javascript">

            function enviaralta(){

                document.getElementById("alta").submit();

            }
            function enviarmodificar(){

            	document.getElementById("modificar").submit();
            }
            function enviareliminar(){

            	document.getElementById("eliminar").submit();
            }
   </script>
   <form name="formularioalta"  class="form-horizontal" action="../Controlador/ControladorSesiones.php" method="post" >
			<fieldset>
			<input type="image" id="alta" name="Alta" alt="Submit" value="Alta" onclick="enviaralta();" src="../Archivos/añadir.png" width="20" height="20"></input>
			</fieldset>
			</form>

<?php

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">";
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"../Controlador/ControladorSesiones.php\">";
			echo "<fieldset><legend>".$idiom['Sesion']."</legend>";
			echo "<input type=image id=\"modificar\" name=\"Modificar\"  value=\"Modificar\" onclick=\"enviarmodificar();\" alt =\"Submit\" src=\"../Archivos/lapiz.png\" width=\"30\"  height=\"30\" ></input>";
			echo "<input type=hidden id=sesion name=sesion value=".$form[$numar]["Sesion"].">";
			echo "<input type=image id=\"eliminar\" name=\"Eliminar\" value=\"Eliminar\" onclick=\"return confirm('¿Está seguro?');\" alt =\"Submit\" src=\"../Archivos//eliminar.png\" width=\"30\"  height=\"30\" >";
			echo"<br>";
			echo $idiom['Monitor'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['Deportista'].":".$form[$numar]["duracion"];
			echo "<br>";
			echo $idiom['Fecha'].":"." ".$form[$numar]["hora"];
			echo "<br>";
			echo $idiom['Ejercicio'].":"." ".$form[$numar]["lugar"];
			echo "<br>";
			echo $idiom['Comentario'].":"." ".$form[$numar]["plazas"];
			echo "<br>";


			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";

			echo "</div>";


		 	}


?>
	</div></div></div>

	</div>
<?php
include '../plantilla/pie.php';
}
}
?>
