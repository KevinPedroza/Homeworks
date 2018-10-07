<?php

    $username = $argv[1];
    $pass = $argv[2];
    $dbname = $argv[3];
    $host = $argv[4];
    $table = $argv[5];

    try{
        $conexion = new PDO("mysql:host=$host;dbname=$dbname","$username","$pass");
    }catch(PDOExceptio $e){
        echo "Error: " . $e->getMessage();
        die();  
    }

    $file = fopen($argv[6],"w");

    $articulos = $conexion->prepare("SELECT * FROM $table");
    $articulos->execute();
    $articulos = $articulos->fetchAll();

    foreach ($articulos as $articulo) {
        fwrite($file, $articulo["name"] . "," . $articulo["last_name"] . "," . $articulo["id"] . "," . $articulo["phone"] . "," . "\r\n");
    }
    echo "Se guardo!";

    fclose($file);
?>