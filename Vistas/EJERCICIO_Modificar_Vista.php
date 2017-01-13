<?php

class EJERCICIO_Modificar{

private $valores;
private $volver;

function __construct($valores,$volver){
    $this->valores = $valores;
    $this->volver = $volver;
   include("../Idiomas/idiomas.php");
    $idioma=new idiomas();
    include("../Funciones/cargadodedatos.php");
    $this->idiom=$idiom;
    $this->render();
}

function render(){
    ?><br>
    <div class="container well">
    <div class="row">
        <div class="col-xs-12">
        <form class="form-horizontal" method="post"action="../Controlador/EJERCICIO_Controller.php?id_Ejercicio=<?=$this->valores['id_Ejercicio']?>&amp;accion=Borrar">
            <fieldset><legend> <?=$this->idiom['ModificarEjercicio'].":"?></legend>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['id_Ejercicio'].":"?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text readonly id=nombre name=id_Ejercicio value = "<?=$this->valores['id_Ejercicio']?>">
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Nombre'].":"?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text required id=nombre name=Nombre value = "<?=$this->valores['Nombre']?>">
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Tipo'].":"?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text required id=nombre name=Tipo value = "<?=$this->valores['Tipo']?>">
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Tiempo'].":"?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text id=nombre name=Tiempo value = "<?=$this->valores['Tiempo']?>">
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Repeticiones'].":"?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text id=nombre name=Repeticiones value = "<?=$this->valores['Repeticiones']?>">
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Peso'].":"?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text id=nombre name=Peso value = "<?=$this->valores['Peso']?>">
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Series'].":"?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text id=nombre name=Series value = "<?=$this->valores['Series']?>">
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Descripcion'].":"?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text id=nombre name=Descripcion value = "<?=$this->valores['Descripcion']?>">
                    </div>
                </div>
            </fieldset>
            <input type="image"  name="accion" alt="Submit" value="Modificar" onclick="document.doSubmit();" src="../Archivos/lapiz.png" width="20" height="20">
        </form>
        </div></div></div>
    <?php

} // fin del metodo render
} // fin de la clase
?>
