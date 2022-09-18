<?php 
//En esta parte podremos obtener la informacion a partir del tipo de metodo
namespace MVC;

class Router {

    public $rutasGET = []; //Tomará las rutas por el metodo GET
    public $rutasPOST = []; //Tomará las rutas por el metodo POST

    //Funcion o metodo que permite mostrar la url y su funcion asociada
    public function get($url, $funcion){//Toma la url de la pagina y ejecuta su metodo o funcion correspondiente
        $this->rutasGET[$url] = $funcion; //Lo agrega al arreglo vacío correspondiente y lo asocia a la funcion
    }

    //Funcion que permite mostrar la url y su funcion asociada
    public function post($url, $funcion){//Toma la url de la pagina y ejecuta su metodo o funcion correspondiente
        $this->rutasPOST[$url] = $funcion; //Lo agrega al arreglo vacío correspondiente y lo asocia a la funcion
    }

    public function comprobarRutas(){

        session_start();

        $auth = $_SESSION['login'] ?? NULL;


        //Arreglo de rutas protegidas o donde tiene que haber iniciado sesion para entrar
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', 
                                        '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar', 
                                        '/blog/crear', '/blog/actualizar', '/blog/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/'; //Toma la dirrecion de la url, este metodo se toma de la super global $_SERVER
        $metodo = $_SERVER['REQUEST_METHOD']; //Nos indica el tipo de metodo asociado en la obtencion de la información (GET o POST)
        
        if($metodo === 'GET'){
            $funcion = $this->rutasGET[$urlActual] ?? NULL; //Nos va a tomar la direccion de la url
        } else{
            $funcion = $this->rutasPOST[$urlActual] ?? NULL; //Nos va a tomar la direccion de la url por el metodo POST
        }

        //Si es una ruta protegida y el usuario no esta autenticado
        if(in_array($urlActual, $rutas_protegidas) && !$auth){ //permite verificar un dato en un arreglo
            header('Location: /');
        }

        if($funcion){
            // call_user_func() Nos permite llamar una funcion cuando no sabemos como se llama
            call_user_func($funcion, $this); //$this para que verifique en todo el archivo 
            
        }else{
            echo "Página no encontrada";
        }
    }

    //Muestra una vista
    public function render($view , $datos = []){ //renderiza o muestra una vista
        foreach($datos as $key => $value){
            $$key = $value; //$$ variable de variable le va a pasar la variable, porque no sabemos su nombre o se va ir creando una nueva variable con los datos
        }

        ob_start(); //Comenzará a guardar en memoria (en este caso la vista actual)
        include __DIR__ . "/views/$view.php"; //Llamamos el archivo que contiene la vista de administrador

        $contenido = ob_get_clean(); //Limpia la memoria
        include __DIR__ . "/views/layout.php";

    }
}
