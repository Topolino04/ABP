<?php

class TABLA_Insertar{

function __construct(){
    $this->volver = "TABLA_Controller.php";
  
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
                <form class="form-horizontal" method="post"action="../Controlador/TABLA_Controller.php">
                    <fieldset><legend> <?=$this->idiom['InsertarTabla'].":"?></legend>
                        <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Nombre'].":"?></label>
                            <div class="input-group col-sm-3">
                                <input class="form-control" type=text required id=nombre name=Nombre>
                                <input type=hidden required id=id_Tabla name=id_Tabla>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="accion" value="Insertar">
                    <input class="btn btn-default" type="submit" value="<?=$this->idiom['InsertarTabla']?>">
                </form>
            </div>
        </div>
    </div>


<?php
} //fin metodo render

}
