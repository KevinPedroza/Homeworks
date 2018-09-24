<?php
    
    if($_POST){
        $errores="";    

        if(empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) ){
            $errores .= "Fill all the Information!";
        }else{
            $nombre = filter_var($_POST["nombre"],FILTER_SANITIZE_STRING);
            $apellido = filter_var($_POST["apellido"],FILTER_SANITIZE_STRING);
            $correo = $_POST["email"];
        }

    }   

    require "views/index.view.php";
?>