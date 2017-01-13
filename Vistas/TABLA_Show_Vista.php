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
  <div class="container well">
        <div class="row">
            <div class="col-xs-12">
                <form name="formularioalta"  class="form-horizontal" action="../Controlador/TABLA_Controller.php" method="post">
                    <fieldset>
                        <input type="image" id="alta" name="accion" alt="Submit" value="Insertar" onclick="doSubmit();" src="../Archivos/agregar.png" width="20" height="20">
                    </fieldset>
                </form>
            </div>
        </div>
  </div>

    <?php    foreach ($this->datos as $dato){        ?>
        <div class="container well">
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" method="post" action="../Controlador/TABLA_Controller.php">
                        <fieldset>
                            <legend><?=$dato["Nombre"]?></legend>
                            <input type=hidden id=id_Tabla name=id_Tabla value='<?=$dato["id_Tabla"]?>'>
                            <input type=image name="accion" value="Consultar" alt ="Submit" src="../Archivos/lupa.png"      width="30"  height="30" >
                            <input type=image name="accion" value="Modificar" alt ="Submit" src="../Archivos/lapiz.png"     width="30"  height="30" >
                            <input type=image name="accion" value="Borrar"    alt ="Submit" src="../Archivos/eliminar.png" width="30"  height="30" >
                            <br>
                            <?=$this->idiom['id_Tabla'].":".$dato["id_Tabla"];?>
                            <br>
                            <?=$this->idiom['Nombre'].":"." ".$dato["Nombre"];?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    include '../plantilla/pie.php';

} //fin metodo render
}
