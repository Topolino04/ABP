<?php

class Mensaje{

private $string;
private $volver;

function __construct($string, $volver){
	$this->string = $string;
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

    <fieldset><legend> <?=$this->idiom[$this->string]?></legend>

    <a class="btn-default btn" href='<?=$this->volver?>'> <?=$this->idiom['Volver'] ?></a>
<?php
} //fin metodo render

}
