<?php
include "datos_BD.php";
// Create connection
$conn = new mysqli($host, $user, $pass);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "DROP DATABASE IF EXISTS ".$name;
//echo $sql."<br>";
$conn->query($sql);
$sql = "CREATE DATABASE ".$name;
if ($conn->query($sql) === TRUE) {
    //echo $sql."<br>";
    echo "Database created successfully";
    ejecutarSQL("Script_BD.sql",$conn);
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
function ejecutarSQL($_rutaArchivo, $_conexionDB){
    $queries = explode(';', file_get_contents($_rutaArchivo));
    foreach($queries as $query){
        if($query != ''){
            $_conexionDB->query($query); // Asumo un objeto conexión que ejecuta consultas
            //echo $query."<br>";
        }
    }
}

?>
