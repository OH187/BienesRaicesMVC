<?php

// __DIR__ permite a php buscar libremente y más detalladamente a traves de todo el documento
/* Esto me permite crear una constante que me lleve directo a los archivos y asi pueda utilizarla en cualquier parte
solamente usando el nombre de esa constante */
define('TEMPLATES_URL', __DIR__ . '/templates'); 
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETAS_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/imagenes/'); 
define('CARPETAS_IMAGENES_BLOG',$_SERVER['DOCUMENT_ROOT'] . '/imagenesBlog/'); 

function incluirTemplates(string $nombre, bool $inicio = false){
    include TEMPLATES_URL ."../${nombre}.php"; 
    //Al usar esta funcion nos incluye un archivo .php con el nombre especificado en la carpeta templates de este proyecto
}

function estaAutenticado(){ //Valor a retornar (despues de los :)
    session_start(); //Se inicia sesion
    if(!$_SESSION['login']){  //Si no esta autorizado lo manda a la paguna principal
        header('Location: /');
        // header('Location: /'); //Si es usuario no esta autenticado lo manda a la pagina principal
    }
}

function debuguear($variable){
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
    exit;   
}  

//Escapar y sanitizar del HTML
function s($html) : string{
    $sanitizar = htmlspecialchars(($html));
    return $sanitizar;
}

//Validar tipo de contenido (vendedor o propiedad)
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad', 'entrada'];

    return in_array($tipo, $tipos);
}

//Muestra los mensajes de alerta
function mostrarNotificaciones($codigo){
    $mensaje = '';

    switch($codigo){
        case 1:
            $mensaje = 'Registro creado correctamente';
            break;
        case 2:
            $mensaje = 'Registro actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Registro eliminado correctamente';
            break;

        default;
        $mensaje = false;
        break;
    }
    return $mensaje;
}

function validarId( $url){
             //Obtenemos el id o valor que le mandamos en la url y lo cancela si es string
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    //Aqui verificamos que sea un id valido, de lo contrario lo manda a la página principal
    if(!$id){
        header("Location: ${url}");
    } 
    return $id;
}