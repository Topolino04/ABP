<?php 
class notificacionVista{

  function crear($idioma,$aviso,$form,$insertado){ 

       include("../Funciones/cargadodedatos.php");
         if($aviso!=null){
          echo "<script> alert(\"".$idiom['alerta']."\")</script>";
        }
        if($insertado!=null){
        	  echo "<script> alert(\"".$idiom['notificacioninsertada']."\")</script>";
        }

      echo "<div class=\"container well\">";
      echo "<div class=\"row\">";
      echo "<div class=\"col-xs-12\">";
      echo "<form enctype=\"multipart/form-data\" class=\"form-horizontal\" method=\"post\"  name=\"formulario\" id=\"formulario\" action=\"..\Controlador\Notificacion_Controller.php?enviarnoti\">";
      echo "<fieldset><legend>".$idiom['notificacion']."</legend>";
      echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"usuario\"id =\"usuario\"> ".$idiom['Usuario'].":</label>";
			echo "<div class=\"input-group col-sm-3\">";
			echo "<ul>";
			for($numar=0;$numar<count($form);$numar++)
							{echo "<li>";
							echo "<input type=\"checkbox\" name=\"usuario[]\" value=\"".$form[$numar]["usuario"]."\">".$form[$numar]["usuario"]."";
							echo "</li>";
							}
							echo "</ul>";
						echo "</div></div>";	
      echo "<div class=\"form-group\"><label class=\"col-sm-2 control-label\" for=\"cuenta\"id =\"cuenta\"> ".$idiom['mensaje'].":</label>";
      echo "<div class=\"input-group col-sm-3\">";
      echo "<textarea rows=\"4\" cols=\"50\" name=\"mensaje\" form=\"formulario\"></textarea>";
      echo "</div></div>";
      echo "<a href=\"..\Controlador\Notificacion_Controller.php?enviarnoti\"><input type=\"image\" src=\"..\Archivos\añadir.png\" width=\"20\" height=\"20\" mouseover='encriptar();'></a>";
      echo "</fieldset>";
      echo "</form>";
      include '../plantilla/pie.php';
      }
  }
?>

  