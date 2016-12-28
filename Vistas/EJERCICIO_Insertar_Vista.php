<?php

class EJERCICIO_Insertar{

function __construct(){
    $this->volver = "EJERCICIO_Controller.php";
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
        <form class="form-horizontal" method="post"action="..\Controlador\EJERCICIO_Controller.php">
            <fieldset>
                <legend> <?= $this->idiom['InsertarEjercicio'] . ":" ?></legend>
                <input type = "hidden" name = "id_Ejercicio" value = "">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre" id="nombre"> <?= $this->idiom['Nombre'] . ":" ?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text required id=nombre name=Nombre>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre" id="nombre"> <?= $this->idiom['Tipo'] . ":" ?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text required id=nombre name=Tipo >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre" id="nombre"> <?= $this->idiom['Tiempo'] . ":" ?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=time id=nombre name=Tiempo>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre" id="nombre"> <?= $this->idiom['Repeticiones'] . ":" ?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=number id=nombre name=Repeticiones>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre" id="nombre"> <?= $this->idiom['Peso'] . ":" ?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=number id=nombre name=Peso >
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" for="nombre" id="nombre"> <?= $this->idiom['Series'] . ":" ?></label>
                    <div class="input-group col-sm-3">
                        <input class="form-control" type=text id=number name=Series>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre" id="nombre"> <?= $this->idiom['Descripcion'] . ":" ?></label>
                    <div class="input-group col-sm-3">
                        <textarea  class="form-control" id=textarea name=Descripcion></textarea>
                    </div>
                </div>
            </fieldset>
            <input type="image" name="accion" alt="Submit" value="Insertar" onclick="document.doSubmit()" src="..\Archivos\añadir.png" width="20" height="20">
        </form>
    </div></div></div>

    <?php


} //fin metodo render
}
