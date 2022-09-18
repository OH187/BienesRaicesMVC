<?php 
//Aqui estamos agregando las url válidas dentro de nuestra pagina web
    require_once __DIR__ . '/../includes/app.php';

    use Controllers\BlogController;
use Controllers\LoginController;
use MVC\Router; //Haciendo uso de la clase con su respectivo namespace
    use Controllers\PropiedadController;
    use Controllers\VendedorController;
    use Controllers\PaginasController; //Llama a la clase y archivo en controllers

    $router = new Router(); //Llamado o instancia de la clase 

                                     // ZONA PRIVADA
    //Si no esta la url o direccion en este apartado no existirá la página
    $router->get('/admin', [PropiedadController::class, 'index']); //Controlador asociado con la ruta y el metodo
    $router->get('/propiedades/crear', [PropiedadController::class, 'crear']); //
    $router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
    $router->post('/propiedades/crear', [PropiedadController::class, 'crear']); //post es esclusivo si quieres enviar datos desde un formulario
    $router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
    $router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminarRegistro']);

    
    $router->get('/vendedores/crear', [VendedorController::class, 'crear']);
    $router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
    $router->post('/vendedores/crear', [VendedorController::class, 'crear']);
    $router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
    $router->post('/vendedores/eliminar', [VendedorController::class, 'eliminarRegistro']); //El primer metodo es el que estara en el formulario

    $router->get('/blog/crear', [BlogController::class, 'crear']);
    $router->get('/blog/actualizar', [BlogController::class, 'actualizar']);
    $router->post('/blog/crear', [BlogController::class, 'crear']);
    $router->post('/blog/actualizar', [BlogController::class, 'actualizar']);
    $router->post('/blog/eliminar', [BlogController::class, 'eliminarRegistro']);

                                        //ZONA PUBLICA
    $router->get('/', [PaginasController::class, 'index']);
    $router->get('/nosotros', [PaginasController::class, 'nosotros']);
    $router->get('/propiedades', [PaginasController::class, 'propiedades']);
    $router->get('/propiedad', [PaginasController::class, 'propiedad']);
    $router->get('/blog', [PaginasController::class, 'blog']);
    $router->get('/entrada', [PaginasController::class, 'entrada']);
    $router->get('/contacto', [PaginasController::class, 'contacto']);
    $router->post('/contacto', [PaginasController::class, 'contacto']); //Por metodo post


                            //LOGIN Y AUTENTICACION
    $router->get('/login', [LoginController::class, 'login']);
    $router->post('/login', [LoginController::class, 'login']);  
    $router->get('/logout', [LoginController::class, 'logout']);  


    $router->comprobarRutas(); //Llama el metodo que se encuentra dentro de la clase