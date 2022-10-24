<?php
function conectarDB() : mysqli{ //host, usuario, clave, bd 
    $db = new mysqli('localhost', 'id19747668_root', 'Oscar118817!', 'id19747668_bienesraices_crud'); //Conexion a base de datos
    if(!$db){
        echo "¡Error! No se pudo conectar";
        exit;
    }
    return $db;
}