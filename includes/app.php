<?php 
//Este archivo es el principal donde se orquestará o donde se llamará cada archivo importante (clases, funciones,etc)
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectar a la base de datos
$db = conectarDB();

use Model\ActiveRecord; //Manda a llamar la clase con el namespaces

//Con esto, todos los objetos que se crearán tendrán una referencia a la BD
ActiveRecord::setDB($db);