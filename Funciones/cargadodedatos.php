<?php 
 		
               include('../plantilla/cabecera.php');
        include("../Funciones/comprobaridioma.php");
        include("../Archivos/ArrayNotificaciondeusuario.php");
       
        //comprobamos el idioma
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        //
        //cargamos las notificaciones en la cabecera
        $datos=new datos();
        $formulario=$datos->array_consultar();
        $clase=new cabecera();
        $clase->crear($idiom,$formulario);
        //
        include('../plantilla/menulateral.php'); 
        $menus=new menulateral();
        $menus->crear($idiom);
        //



?>