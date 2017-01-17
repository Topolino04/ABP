<?php 
class comprobacion{

function comprobaridioma($idioma){
if (isset($_SESSION['idioma'])){
    if($_SESSION['idioma']=="español"){
        $idiom=$idioma->español();
    }elseif($_SESSION['idioma']=="gallego"){
        $idiom=$idioma->gallego();
    }elseif($_SESSION['idioma']=="ingles"){
       $idiom=$idioma->ingles();
    }
}else{
    $idiom=$idioma->español();
}
return $idiom;
}

}