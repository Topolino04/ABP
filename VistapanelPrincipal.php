<?php 

class panel{ 
    
	function constructor($idioma){ 

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

       
      
        
		?>
        <?php
        include'../plantilla/pie.php';
	?>

 <?php
 }
  }
?>