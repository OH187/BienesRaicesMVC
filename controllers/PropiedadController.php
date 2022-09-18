<?php 
namespace Controllers;
use Model\Propiedad;
use Model\Vendedores;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Blog;

class PropiedadController{

    public static function index(Router $router){

        $propiedades = Propiedad::all(); //Llamando a la BD
        $vendedores = Vendedores::all(); //Llamando a la BD
        $entradas = Blog::all();
    
        //Muestra el mensaje de exito
        $resultado = $_GET['resultado'] ?? NULL;
        
        $router->render('propiedades/admin', [  ////Permite agregarlo a la vista, de lo contrario es como si no existiera y este metodo se encuentra en el archivo de Router
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'entradas' => $entradas,
            'resultado' =>$resultado
        ]);
    }


    public static function crear(Router $router){
        $propiedad = new Propiedad();
        $vendedor = Vendedores::all();

         //Arreglo para mensajes de errores
        $errores = Propiedad::getErrores();

            //Ejecuta el método después que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Crea una nueva instancia o llamado de la clase Propiedad
        $propiedad = new Propiedad($_POST['propiedad']);

        //Genera un nombre único para guardarlo en la BD, más no guarda el archivo como tal
        $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";//md5'Genera un codigo'(uniqid'genera un id unico'(rand(),true))

        if($_FILES['propiedad']['tmp_name']['imagen']){ //['propiedad']['tmp_name']['imagen']
        //Realiza un resize o cambio de tamaño con Intervention Image, y genera el archivo para guardarlo en el servidor o carpeta
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600); //fit combina cortar con darle un nuevo tamaño
        $propiedad->setImagen($nombreImagen);
        }        
        
        $errores = $propiedad->validar(); //Esto llenara el arreglo de errores si hay algun error (validación)


                //Revisa que arreglo de errores este vacio para insertar
                if (empty($errores)) {

                    //Creando carpeta con php y guardandola en la carpeta del servidor
                    if(!is_dir(CARPETAS_IMAGENES)){ //CARPETAS_IMAGENES es una constante en la carpeta de funciones.php
                        mkdir(CARPETAS_IMAGENES);
                    }

                                //Subiendo archivos
                //Guarda la imagen en el servidor con una funcion de Intervention Image
                $image->save(CARPETAS_IMAGENES. $nombreImagen);

                //Guarda la imagen en el servidor
                $propiedad->guardar();
            }  
        }

        $router ->render('propiedades/crear', [ //Permite agregarlo a la vista, de lo contrario es como si no existiera
            'propiedad' => $propiedad,
            'vendedores' =>$vendedor,
            'errores' => $errores

        ]);
    }


    public static function actualizar(Router $router){ //Simplemente asignado una variable para usar el router
        $id = validarId('/admin'); //Lo que esta en parentesis es a donde nos a direccionar
        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedor = Vendedores::all();

     
        
    //Ejecuta el método después que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){ //metodo implementado por el usuario  

        //Asignar los atributos y validarlos
        $args = $_POST['propiedad'];//Estos valores son los que el usuario ingresa guardados en un arreglo
        $propiedad->sincronizar($args);//Esto sincroniza o manda a llamar el metodo de la clase y los valida con lo ingresado
 

        //Validación
        $errores = $propiedad->validar(); //Esto se trae la funcion o el metodo de validacion de la clase Propiedad

                                        //Subir archivos
         //Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";//md5'Genera un codigo'(uniqid'genera un id unico'(rand(),true))
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600); //make es metodo propio de Intervention Image
            $propiedad->setImagen($nombreImagen); //Reescribiendo la imagen      
        }
        
              //Revisa que arreglo de errores este vacio para insertar
        if (empty($errores)) {   
            if($_FILES['propiedad']['tmp_name']['imagen']){
            //Almacenar la imagen
            $image->save(CARPETAS_IMAGENES . $nombreImagen);
            } 
            $propiedad->guardar();
        }
    }

    $router->render('propiedades/actualizar', [
        'propiedad' => $propiedad,
        'errores' => $errores,
        'vendedores' => $vendedor
    ]);
    }

    public static function eliminarRegistro(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            

            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();                
                }
            }
            
        }
    }
}