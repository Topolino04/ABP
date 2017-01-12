<?php

class Asistencia
{


    private $id_actividad;
    private $fecha;
    private $deportista;
    private $asistencia;

    function __construct($id_actividad = null, DateTime $fecha = null,$deportista = null,$asistencia = null){

        $this->id_actividad = $id_actividad;
        $this->fecha = $fecha;
        $this->deportista = $deportista;
        $this->asistencia = $asistencia;

    }

    function conexionBD(){
        include "../DataBase/datos_BD.php";
        $mysqli = mysqli_connect($host, $user, $pass, $name);
        if (!$mysqli) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        return $mysqli;
    }
    function listarAsistenciasDeActividad($id_actividad){
        $mysqli=$this->conexionBD();
        $sql = "SELECT * FROM deportista_reserva_actividad WHERE Actividad_id_Actividad = {$id_actividad}";
        if($result = $mysqli->query($sql)){
            $toret = array();
            foreach ($result as $tupla){
                array_push($toret, new Asistencia($tupla["Actividad_id_Actividad"], new DateTime($tupla["Fecha"]),$tupla["Deportista_id_Usuario"],$tupla["Asistencia"]));
            }
            return $toret;
        }
        return null;
    }
    function listarDeportisdasQueAsistenActividad($id_actividad){
        $mysqli=$this->conexionBD();
        $sql = "SELECT DISTINCT Deportista_id_Usuario FROM deportista_reserva_actividad WHERE Actividad_id_Actividad = {$id_actividad}";
        if($result = $mysqli->query($sql)){
            $toret = array();
            foreach ($result as $tupla) {
                array_push($toret, $tupla["Deportista_id_Usuario"]);
            }
            return $toret;
        }
        return null;
    }
    function listarFechasDeReservas($id_actividad){
        $mysqli=$this->conexionBD();
        $sql = "SELECT DISTINCT Fecha FROM deportista_reserva_actividad WHERE Actividad_id_Actividad = {$id_actividad}";
        if($result = $mysqli->query($sql)) {
            $toret = array();
            foreach ($result as $tupla) {
                array_push($toret, new DateTime($tupla["Fecha"]));
            }
            return $toret;
        }
        return null;
    }
    function update(){
        $mysqli=$this->conexionBD();
        $sql = "UPDATE deportista_reserva_actividad SET Asistencia = '{$this->asistencia}'  WHERE Deportista_id_Usuario = '{$this->deportista}'AND Actividad_id_Actividad = '{$this->id_actividad}' AND Fecha = '{$this->fecha->format('Y-m-d H:i:s')}'";
        if($result = $mysqli->query($sql)) {
            return "La modificación se ha realizado con éxito";
        }
        return 'Error en la consulta sobre la base de datos';
    }

    /**
     * @return mixed
     */
    public function getIdActividad()
    {
        return $this->id_actividad;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return mixed
     */
    public function getDeportista()
    {
        return $this->deportista;
    }

    /**
     * @return mixed
     */
    public function getAsistencia()
    {
        return $this->asistencia;
    }
}
?>