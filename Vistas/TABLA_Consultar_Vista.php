<?php

class TABLA_Consultar{


function __construct($array,$arrayE,$users,$volver){
	$this->datos = $array;
	$this->ejercicios = $arrayE;
	$this->volver = $volver;
    $this->usuarios = $users;
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
                        <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Nombre'].":"?></label>
                            <div class="input-group col-sm-3">
                                <input class="form-control" type=text readonly id=nombre name=Nombre value = '<?= $this->datos['Nombre']?>'>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="container well">
        <div class="row">
            <div class="col-xs-12">
                <legend> <?=$this->datos['Nombre'].":"?></legend>
                <table class="table table-striped">
                    <tr>
                        <th><?=$this->idiom['id_Ejercicio']?></th>
                        <th><?=$this->idiom['Nombre']?></th>
                        <th><?=$this->idiom['Tipo']?></th>
                        <th><?=$this->idiom['Repeticiones']?></th>
                        <th><?=$this->idiom['Peso']?></th>
                        <th><?=$this->idiom['Series']?></th>
                        <th><?=$this->idiom['Descripcion']?></th>
                    </tr>
                    <?php if($this->ejercicios != "Tabla vacia")foreach ($this->ejercicios  as $ejercicio){  ?>
                        <tr>
                            <td><?=$ejercicio['id_Ejercicio']?></td>
                            <td><?=$ejercicio['Nombre']?></td>
                            <td><?=$ejercicio['Tipo']?></td>
                            <td><?=$ejercicio['Repeticiones']?></td>
                            <td><?=$ejercicio['Peso']?></td>
                            <td><?=$ejercicio['Series']?></td>
                            <td><?=$ejercicio['Descripcion']?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <div class="container well">
        <div class="row">
            <div class="col-xs-12">
                <legend> <?=$this->idiom['Deportistas'].":"?></legend>
                <table class="table table-striped">
                    <tr>
                        <th><?=$this->idiom['Nombre']?></th>
                        <th><?=$this->idiom['Apellidos']?></th>
                        <th><?=$this->idiom['Telefono']?></th>
                        <th><?=$this->idiom['FechaNac']?></th>
                        <th><?=$this->idiom['DNI']?></th>
                        <th><?=$this->idiom['email']?></th>
                        <th><?=$this->idiom['Usuario']?></th>

                    </tr>
                    <?php if($this->usuarios != "Tabla vacia") foreach ($this->usuarios  as $usuario){  ?>
                        <tr>
                            <td><?=$usuario['Nombre']?></td>
                            <td><?=$usuario['Apellidos']?></td>
                            <td><?=$usuario['Telefono']?></td>
                            <td><?=$usuario['FechaNac']?></td>
                            <td><?=$usuario['DNI']?></td>
                            <td><?=$usuario['Email']?></td>
                            <td><?=$usuario['Usuario']?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>

<?php
} //fin metodo render

}
?>
