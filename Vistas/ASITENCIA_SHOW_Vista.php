<?php

class ASISTENCIA_SHOW_Vista{


    function __construct($actividad_id,$actividad_nom,$fechas,$users,$datos){
        $this->actividad_id = $actividad_id;
        $this->actividad_nom = $actividad_nom;
        $this->fechas = $fechas;
        $this->usuarios = $users;
        $this->datos = $datos;
        $idiom = null;
        $idioma=new idiomas();
        include("../Funciones/cargadodedatos.php");
        $this->idiom=$idiom;
        $this->render();
    }

    function render(){
        ?><br>
        <form method="post" action="../Controlador/ControladorActividades.php">
        <div class="container well">
            <div class="row">
                <div class="col-xs-12">
                    <legend> <?=$this->idiom["Tabla_asistencia_de"]." "?> <?= $this->actividad_nom.":"?></legend>
                    <table class="table table-striped table-condensed" >
                        <tr>
                            <th> <?=$this->idiom["DNI"]?></th>
                        <?php
                            foreach ($this->fechas as $fecha){
                                echo"<th> {$fecha->format("d/m H:i")}</th>";
                            }
                        ?>
                        </tr>
                        <?php
                            foreach ($this->usuarios as $user){
                                echo "<tr>";
                                echo "<td>$user</td>";
                                foreach ($this->fechas as $fecha){
                                   echo check($this->datos,$user,$fecha);
                                }
                                echo "</tr>";
                            }
                        ?>
                    </table>
                    <input type="hidden" name="actividad_id"  value="<?=$this->actividad_id ?>">
                    <input type="hidden" name="actividad_nom" value="<?=$this->actividad_nom?>">
                    <input align=right type=image name="Asistencia"  value="vuelta" alt ="Submit" src="./../Archivos/lapiz.png" width="30" height="30">

                </div>
            </div>
        </div>
        </form>
        <?php
    } //fin metodo render
}

function check(Array $datos, $user, DateTime $fecha){
    $toret = "<td></td>";
    foreach ($datos  as $dato){
        if($dato->getDeportista() == $user && $dato->getFecha() == $fecha ){
            $toret =  "<td><input type='checkbox' name = '{$user}{$fecha->format("Y-m-d_H:i:s")}'";
            if($dato->getAsistencia()){
                $toret = $toret."checked";
            }
            $toret = $toret."></td>";
        }
    }
    return $toret;
}
?>
