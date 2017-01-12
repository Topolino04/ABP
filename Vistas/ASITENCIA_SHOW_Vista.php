<?php

class ASISTENCIA_SHOW_Vista{


    function __construct($actividad_id,$actividad_nom,$fechas,$users,$datos,$volver){
        $this->actividad_id = $actividad_id;
        $this->actividad_nom = $actividad_nom;
        $this->volver = $volver;
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
        <div class="container well">
            <div class="row">
                <div class="col-xs-12">
                    <legend> <?=$this->idiom["Tabla_asistencia_de"]." "?> <?= $this->actividad_nom.":"?></legend>
                    <table class="table table-striped table-condensed" >
                        <tr>
                            <th> <?=$this->idiom["DNI"]?></th>
                        <?php
                            foreach ($this->fechas as $fecha){
                                echo"<th> {$fecha->format("m-d")}</th>";
                            }
                        ?>
                        </tr>
                        <?php
                            foreach ($this->usuarios as $user){
                                echo "<td>$user</td>";
                                foreach ($this->fechas as $fecha){
                                    ?>
                                    <td><input type='checkbox'  <?= check($this->datos,$user,$fecha)?>></td>
                                    <?php
                                }
                            }
                        ?>
                        <tr>

                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <?php
    } //fin metodo render
/*
// changed the city ids so we can easily see city_a and city_b
$tableRows[0]=array("id"=>1, "id_city_a"=>1, "id_city_b"=>11, "distance"=>0);
$tableRows[1]=array("id"=>2, "id_city_a"=>1, "id_city_b"=>12, "distance"=>8);
$tableRows[2]=array("id"=>3, "id_city_a"=>1, "id_city_b"=>13, "distance"=>6);
$tableRows[3]=array("id"=>4, "id_city_a"=>2, "id_city_b"=>11, "distance"=>8);
$tableRows[4]=array("id"=>5, "id_city_a"=>2, "id_city_b"=>12, "distance"=>0);
$tableRows[5]=array("id"=>6, "id_city_a"=>2, "id_city_b"=>13, "distance"=>9);
$tableRows[6]=array("id"=>7, "id_city_a"=>3, "id_city_b"=>11, "distance"=>6);
$tableRows[7]=array("id"=>8, "id_city_a"=>3, "id_city_b"=>12, "distance"=>9);
$tableRows[8]=array("id"=>9, "id_city_a"=>3, "id_city_b"=>13, "distance"=>0);
*/
}

function check(Array $datos, $user, DateTime $fecha){
    foreach ($datos  as $dato){
        if($dato->getDeportista() == $user && $dato->getFecha() == $fecha && $dato->getAsistencia()){

            return "checked";
        }
    }
    return "";
}
?>
