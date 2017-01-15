<?php

class Tabla_Borrar{

private $valores;
private $volver;

function __construct($valores,$volver){
    $this->datos = $valores;
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
                <form class="form-horizontal" method="post"action="../Controlador/TABLA_Controller.php">
                    <fieldset><legend> <?=$this->idiom['ConsultarTabla'].":"?></legend>
                        <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['id_Tabla'].":"?></label>
                            <div class="input-group col-sm-3">
                                <input class="form-control" type=text readonly id=nombre name=id_Tabla value = '<?= $this->datos['id_Tabla']?>'>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Nombre'].":"?></label>
                            <div class="input-group col-sm-3">
                                <input class="form-control" type=text readonly id=nombre name=Nombre value = '<?= $this->datos['Nombre']?>'>
                            </div>
                        </div>
                    </fieldset>
                    <input type="image" name="accion" alt="Submit" value="Borrar" onclick="document.doSubmit();" src="../Archivos/eliminar.png" width="20" height="20">
                </form>
            </div>
        </div>
    </div>
<?php
} // fin del metodo render
} // fin de la clase
?>
