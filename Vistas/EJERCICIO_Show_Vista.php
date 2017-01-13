<?php
session_start();

class EJERCICIO_Show{

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
                <form name="formularioalta"  class="form-horizontal" action="../Controlador/EJERCICIO_Controller.php" method="post" >
                    <fieldset>
                        <input type="image" id="alta" name="accion" alt="Submit" value="Insertar" onclick="doSubmit();" src="..\Archivos\añadir.png" width="20" height="20"></input>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?php

    foreach ($this->datos as $dato){


        echo "<div class=\"container well\">";
        echo "<div class=\"row\">";
        echo "<div class=\"col-xs-12\">";
        echo "<form class=\"form-horizontal\" method=\"post\" action=\"../Controlador/EJERCICIO_Controller.php\">";
        echo "<fieldset><legend>".$dato["Nombre"]."</legend>";
        echo "<input type=hidden id=id_Ejercicio name=id_Ejercicio value='{$dato["id_Ejercicio"]}'>";
        echo "<input type=image id=\"modificar\" name=\"accion\"  value=\"Modificar\" alt =\"Submit\" src=\"../Archivos/lapiz.png\" width=\"30\"  height=\"30\" ></input>";
        echo "<input type=image id=\"eliminar\" name=\"accion\" value=\"Borrar\" alt =\"Submit\" src=\"../Archivos/eliminar.png\" width=\"30\"  height=\"30\" >";
        echo"<br>";
        echo $this->idiom['id_Ejercicio'].":".$dato["id_Ejercicio"];
        echo "<br>";
        echo $this->idiom['Tipo'].":"." ".$dato["Tipo"];
        echo "<br>";
        echo $this->idiom['Repeticiones'].":"." ".$dato["Repeticiones"];
        echo "<br>";
        echo $this->idiom['Peso'].":"." ".$dato["Peso"];
        echo "<br>";
        echo $this->idiom['Series'].":"." ".$dato["Series"];
        echo "<br>";
        echo $this->idiom['Descripcion'].":"." ".$dato["Descripcion"];
        echo "<br>";
        echo"</fieldset>";
        echo"</form>";
        echo "</div>";
        echo "</div>";

        echo "</div>";


    }


    ?>
    </div></div></div>

    <?php
    include '../plantilla/pie.php';
} //fin metodo render

}
