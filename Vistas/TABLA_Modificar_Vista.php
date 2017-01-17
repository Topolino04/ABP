<?php

class TABLA_Modificar{

private $valores;
private $volver;
private $ejercicios;

function __construct($valores,$arrayE,$usuarios,$volver){
    $this->datos = $valores;
    $this->ejercicios = $arrayE;
    $this->usuarios = $usuarios;
    $this->volver = $volver;

 include("../Idiomas/idiomas.php");
    $idioma=new idiomas();
    include("../Funciones/cargadodedatos.php");
    $this->idiom=$idiom;
    $this->render();
}

function render(){
    ?><br>
    <form class="form-horizontal" method="post"action="../Controlador/TABLA_Controller.php">
        <div class="container well">
            <div class="row">
                <div class="col-xs-12">
                    <fieldset><legend> <?=$this->idiom['ConsultarTabla'].":"?></legend>
                        <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['id_Tabla'].":"?></label>
                            <div class="input-group col-sm-3">
                                <input class="form-control" type=text readonly id=nombre name=id_Tabla value = '<?= $this->datos['id_Tabla']?>'>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" for="nombre"id ="nombre"> <?=$this->idiom['Nombre'].":"?></label>
                            <div class="input-group col-sm-3">
                                <input class="form-control" type=text required id=nombre name=Nombre value = '<?= $this->datos['Nombre']?>'>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="Modificar">
                        <input class="btn btn-default" type="submit" value="<?=$this->idiom['ModificarTabla']?>">
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="container well">
            <div class="row">
                <div class="col-xs-9">
                    <table class="table table-striped">
                        <tr>
                            <th><?=$this->idiom['id_Ejercicio']?></th>
                            <th><?=$this->idiom['Nombre']?></th>
                            <th><?=$this->idiom['Tipo']?></th>
                            <th><?=$this->idiom['Repeticiones']?></th>
                            <th><?=$this->idiom['Peso']?></th>
                            <th><?=$this->idiom['Series']?></th>
                        </tr>
                        <?php foreach ($this->ejercicios  as $ejercicio){  ?>
                            <tr>
                                <td><?=$ejercicio['id_Ejercicio']?></td>
                                <td><?=$ejercicio['Nombre']?></td>
                                <td><?=$ejercicio['Tipo']?></td>
                                <td><?=$ejercicio['Repeticiones']?></td>
                                <td><?=$ejercicio['Peso']?></td>
                                <td><?=$ejercicio['Series']?></td>
                                <td><input type = "checkbox" <?php  if($ejercicio["TRUE"]) echo "checked "; ?> name = check[] value = '<?=$ejercicio["id_Ejercicio"]?>'></td>
                            </tr>
                        <?php }?>
                    </table>
                    <input type="hidden" name="accion" value="Modificar">
                    <input class="btn btn-default" type="submit" value="<?=$this->idiom['ModificarTabla']?>">
                </div>
            </div>
        </div>
        <div class="container well">
            <div class="row">
                <div class="col-xs-9">
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

                        <?php foreach ($this->usuarios  as $usuario){  ?>
                            <tr>
                                <td><?=$usuario['Nombre']?></td>
                                <td><?=$usuario['Apellidos']?></td>
                                <td><?=$usuario['Telefono']?></td>
                                <td><?=$usuario['FechaNac']?></td>
                                <td><?=$usuario['DNI']?></td>
                                <td><?=$usuario['Email']?></td>
                                <td><?=$usuario['Usuario']?></td>
                                <td><input type = "checkbox" <?php  if($usuario["TRUE"]) echo "checked"?> name = check2[] value = "<?=$usuario["DNI"]?>" ></td>
                            </tr>
                        <?php }?>
                    </table>
                    <input type="hidden" name="accion" value="Modificar">
                    <input class="btn btn-default" type="submit" value="<?=$this->idiom['ModificarTabla']?>">
                </div>
            </div>
        </div>
    </form>
    <?php


} // fin del metodo render
} // fin de la clase
?>
