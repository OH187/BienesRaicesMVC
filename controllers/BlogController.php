<?php 
namespace Controllers;
use Model\Vendedores;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Blog;

class BlogController{

    public static function crear(Router $router){
        $entrada = new Blog();
        $vendedores = Vendedores::all();
        

         //Arreglo para mensajes de errores
        $errores = Blog::getErrores();

            //Ejecuta el método después que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Crea una nueva instancia o llamado de la clase Propiedad
        $entrada = new Blog($_POST['entrada']);

        //Genera un nombre único para guardarlo en la BD, más no guarda el archivo como tal
        $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";//md5'Genera un codigo'(uniqid'genera un id unico'(rand(),true))

        if($_FILES['entrada']['tmp_name']['imagen']){ //['propiedad']['tmp_name']['imagen']
        //Realiza un resize o cambio de tamaño con Intervention Image, y genera el archivo para guardarlo en el servidor o carpeta
        $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800, 600); //fit combina cortar con darle un nuevo tamaño
        $entrada->setImagen($nombreImagen);
        }        
        
        $errores = $entrada->validar(); //Esto llenara el arreglo de errores si hay algun error (validación)


                //Revisa que arreglo de errores este vacio para insertar
                if (empty($errores)) {

                    //Creando carpeta con php y guardandola en la carpeta del servidor
                    if(!is_dir(CARPETAS_IMAGENES_BLOG)){ //CARPETAS_IMAGENES es una constante en la carpeta de funciones.php
                        mkdir(CARPETAS_IMAGENES_BLOG);
                    }

                                //Subiendo archivos
                //Guarda la imagen en el servidor con una funcion de Intervention Image
                $image->save(CARPETAS_IMAGENES_BLOG. $nombreImagen);
                    
                //Guarda la imagen en el servidor
                $entrada->guardar();
            }  
        }

        $router ->render('blog/crear', [ //Permite agregarlo a la vista, de lo contrario es como si no existiera
            'entrada' => $entrada,
            'vendedores' =>$vendedores,
            'errores' => $errores

        ]);
    }


    public static function actualizar(Router $router){ //Simplemente asignado una variable para usar el router
        $id = validarId('/admin'); //Lo que esta en parentesis es a donde nos a direccionar
        $entrada = Blog::find($id);
        $errores = Blog::getErrores();
        $vendedor = Vendedores::all();

     
        
    //Ejecuta el método después que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){ //metodo implementado por el usuario  

        //Asignar los atributos y validarlos
        $args = $_POST['entrada'];//Estos valores son los que el usuario ingresa guardados en un arreglo
        $entrada->sincronizar($args);//Esto sincroniza o manda a llamar el metodo de la clase y los valida con lo ingresado
 

        //Validación
        $errores = $entrada->validar(); //Esto se trae la funcion o el metodo de validacion de la clase Propiedad

                                        //Subir archivos
         //Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";//md5'Genera un codigo'(uniqid'genera un id unico'(rand(),true))
        if($_FILES['entrada']['tmp_name']['imagen']){
            $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800, 600); //make es metodo propio de Intervention Image
            $entrada->setImagen($nombreImagen); //Reescribiendo la imagen      
        }
        
              //Revisa que arreglo de errores este vacio para insertar
        if (empty($errores)) {   
            if($_FILES['entrada']['tmp_name']['imagen']){
            //Almacenar la imagen
            $image->save(CARPETAS_IMAGENES_BLOG . $nombreImagen);
            } 
            $entrada->guardar();
        }
    }

    $router->render('blog/actualizar', [
        'entrada' => $entrada,
        'errores' => $errores,
        'vendedores' => $vendedor
    ]);
    }

   
    //Metodo que vamos a utilizar y a llamar desde el archivo index.php
    public static function eliminarRegistro(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT); //Filtros para los datos del id

            if($id){
                $tipo = $_POST['tipo']; //El tipo, vienen del name en el formulario asociado como un arreglo, pero toma la primera palabra
                if(validarTipoContenido($tipo)){
                    $entrada = Blog::find($id);
                    $entrada->eliminar();                
                }
            }
        }
    }
}