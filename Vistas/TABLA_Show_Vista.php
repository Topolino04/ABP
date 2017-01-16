<?php

class TABLA_Show{

private $datos;
private $volver;

function __construct($array, $volver){
    $this->datos = $array;
    $this->volver = $volver;
    
   include("../Idiomas/idiomas.php");
    $idioma=new idiomas();
    include("../Funciones/cargadodedatos.php");
    $this->idiom=$idiom;
    $this->render();
}

function render(){
    ?><br>
  <div class="container well ">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-default" href="../Controlador/TABLA_Controller.php?accion=Insertar"><?=$this->idiom["InsertarTabla"]?> </a>
            </div>
        </div>
  </div>

    <?php    foreach ($this->datos as $dato){        ?>
        <div class="container well">
            <div class="row">
                <div class="col-md-6">
                    <legend><?=$dato["Nombre"]?></legend>
                    <div class="btn-group ">
                        <a class="btn btn-default" href="../Controlador/TABLA_Controller.php?accion=Consultar&amp;id_Tabla=<?=$dato["id_Tabla"]?>"><?=$this->idiom["ConsultarTabla"]?> </a>
                        <a class="btn btn-default" href="../Controlador/TABLA_Controller.php?accion=Modificar&amp;id_Tabla=<?=$dato["id_Tabla"]?>"><?=$this->idiom["ModificarTabla"]?> </a>
                        <a class="btn btn-default" href="../Controlador/TABLA_Controller.php?accion=Borrar&amp;id_Tabla=<?=$dato["id_Tabla"]?>"><?=$this->idiom["BorrarTabla"]?> </a>
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label class="col-sm-3 control-label" for="nombre"id ="nombre"> <?=$this->idiom['id_Tabla'].":"?></label>
                        <div class="input-group">
                            <input class="form-control" type=text readonly id=nombre name=id_Tabla value = '<?= $dato['id_Tabla']?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Nombre'].":"?></label>
                        <div class="input-group">
                            <input class="form-control" type=text readonly id=nombre name=Nombre value = '<?= $dato['Nombre']?>'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    include '../plantilla/pie.php';

} //fin metodo render
}
