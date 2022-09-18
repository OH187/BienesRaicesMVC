<?php 
namespace Controllers;
use Model\Vendedores;
use MVC\Router;

class VendedorController{
    
    public static function crear(Router $router){
        $vendedor = new Vendedores();

         //Arreglo para mensajes de errores
        $errores = Vendedores::getErrores();

            //Ejecuta el método después que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Crea una nueva instancia o llamado de la clase Propiedad
        $vendedor = new Vendedores($_POST['vendedor']);
        $errores = $vendedor->validar(); //Esto llenara el arreglo de errores si hay algun error (validación)

                //Revisa que arreglo de errores este vacio para insertar
                if (empty($errores)) {

                //Guarda la imagen en el servidor
                $vendedor->guardar();
            }  
        }

        $router ->render('vendedores/crear', [ //Permite agregarlo a la vista, de lo contrario es como si no existiera
            'vendedor' =>$vendedor,
            'errores' => $errores

        ]);
    }


    public static function actualizar(Router $router){ //Simplemente asignado una variable para usar el router
        
        $id = validarId('/admin'); //Lo que esta en parentesis es a donde nos a direccionar
        $vendedor = Vendedores::find($id);
        $errores = Vendedores::getErrores();
    
        
    //Ejecuta el método después que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){ //metodo implementado por el usuario  

        //Asignar los atributos y validarlos
        $args = $_POST['vendedor'];//Estos valores son los que el usuario ingresa guardados en un arreglo
        $vendedor->sincronizar($args);//Esto sincroniza o manda a llamar el metodo de la clase y los valida con lo ingresado

        //Validación
        $errores = $vendedor->validar(); //Esto se trae la funcion o el metodo de validacion de la clase Propiedad

             //Revisa que arreglo de errores este vacio para insertar
             if (empty($errores)) {   
                $vendedor->guardar();
            }
            
        }
        
        //Este será el metod utilizado en index.php 
        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor, //Lo que esta en ' ' es el nombre del campo a tomar en el formulario
            'errores' => $errores 
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
                    $vendedor = Vendedores::find($id);
                    $vendedor->eliminar();                
                }
            }
        }
    }
}