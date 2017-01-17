<?php
session_start();

class EJERCICIO_Show
{

    private $datos;
    private $volver;

    function __construct($array, $volver)
    {
        $this->datos = $array;
        $this->volver = $volver;
        include("../Idiomas/idiomas.php");
        $idioma = new idiomas();
        include("../Funciones/cargadodedatos.php");
        $this->idiom = $idiom;
        $this->render();
    }

    function render()
    {
        ?><br>
        <div class="container well">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-default" href="../Controlador/EJERCICIO_Controller.php?accion=Insertar"><?=$this->idiom["InsertarEjercicio"]?> </a>
                </div>
            </div>
        </div>
        <?php

        foreach ($this->datos as $dato) { ?>
            <div class="container well">
                <div class="row">
                    <div class="col-md-6">
                        <legend><?= $dato["Nombre"] ?></legend>
                        <div class="btn-group ">
                            <a class="btn btn-default" href="../Controlador/EJERCICIO_Controller.php?accion=Modificar&amp;id_Ejercicio=<?=$dato["id_Ejercicio"]?>"><?=$this->idiom["ModificarEjercicio"]?> </a>
                            <a class="btn btn-default" href="../Controlador/EJERCICIO_Controller.php?accion=Borrar&amp;id_Ejercicio=<?=$dato["id_Ejercicio"]?>"><?=$this->idiom["BorrarEjercicio"]?> </a>
                        </div>
                        <div class="form-group" style="padding-top: 10px">
                            <label class="col-sm-3 control-label" for="nombre"
                                   id="nombre"> <?= $this->idiom['id_Ejercicio'] . ":" ?></label>
                            <div class="input-group">
                                <input class="form-control" type=text readonly id=nombre name=id_Tabla
                                       value='<?= $dato['id_Ejercicio'] ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="nombre"
                                   id="nombre"> <?= $this->idiom['Tipo'] . ":" ?></label>
                            <div class="input-group">
                                <input class="form-control" type=text readonly id=nombre name=id_Tabla
                                       value='<?= $dato['Tipo'] ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="nombre"
                                   id="nombre"> <?= $this->idiom['Repeticiones'] . ":" ?></label>
                            <div class="input-group">
                                <input class="form-control" type=text readonly id=nombre name=id_Tabla
                                       value='<?= $dato['Repeticiones'] ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="nombre"
                                   id="nombre"> <?= $this->idiom['Peso'] . ":" ?></label>
                            <div class="input-group">
                                <input class="form-control" type=text readonly id=nombre name=id_Tabla
                                       value='<?= $dato['Peso'] ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="nombre"
                                   id="nombre"> <?= $this->idiom['Series'] . ":" ?></label>
                            <div class="input-group">
                                <input class="form-control" type=text readonly id=nombre name=id_Tabla
                                       value='<?= $dato['Series'] ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="nombre"
                                   id="nombre"> <?= $this->idiom['Series'] . ":" ?></label>
                            <div class="input-group">
                                <input class="form-control" type=text readonly id=nombre name=id_Tabla
                                       value='<?= $dato['Series'] ?>'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
        include '../plantilla/pie.php';
    } //fin metodo render

}
