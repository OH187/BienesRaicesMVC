<?php
function conectarDB() : mysqli{ //host, usuario, clave, bd 
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud'); //Conexion a base de datos
    if(!$db){
        echo "¡Error! No se pudo conectar";
        exit;
    }
    return $db;
}