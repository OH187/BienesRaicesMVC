<?php 
namespace Controllers;

use Model\Blog;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index(Router $router){
        $propiedades = Propiedad::get(3); //get(limite o cantidad a mostrar)
        $entradas = Blog::get(2); //get(limite o cantidad a mostrar)
        $vendedores = Vendedores::all();
        $inicio = true;
        
        $router->render('paginas/index', [ //Esto permite llamar el layout.php o pagina maestra que contiene header y footer
            'propiedades' => $propiedades,
            'entradas' => $entradas,
            'vendedores' => $vendedores,
            'inicio' => $inicio
        ]);
    }
    

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');//Esto permite llamar el layout.php o pagina maestra que contiene header y footer
    }

    
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades'=> $propiedades
        ]);
    }


    public static function propiedad(Router $router){
        $id = validarId('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }


    public static function blog(Router $router){
        $entradas = Blog::all();
        $vendedores = Vendedores::all();
        $router->render('paginas/blog', [
            'entradas' => $entradas,
            'vendedores' => $vendedores
        ]);
    }

    public static function entrada(Router $router){
        $id = validarId('/blog');
        $entrada = Blog::find($id);
        $vendedores = Vendedores::all();

        $router->render('paginas/entrada',[
            'entrada' => $entrada,
            'vendedores' => $vendedores
        ]);
    }

    //Con este metodo enviaremos la informacion en forma de correo que mande el usuario
    public static function contacto(Router $router){
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            //Crear una nueva instancia de phpmailer
            $mail = new PHPMailer(); //Como esta orientada a objetos por eso creamos una nueva instacia

            //configurar el SMTP (Protocolo Simple de Transferencia de Email) es el protocolo de envio de email
                    //Los siguientes datos son los que requiere la libreria PHPMailer() para funcionar
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io'; //Este host se tomó de la configuración de mailtrap (en la web) para Laravel
            $mail->SMTPAuth = true; //Sirve para utenticarnos
            $mail->Username = '27f6f9a9c84a98'; //Se trae del usuario creado en la cuenta de mailtrap
            $mail->Password = 'ed2d1da3ad41cb';
            $mail->SMTPSecure = 'tls'; //(Transport Layer Security, seguridad de la capa de transporte) como un tunel seguro
            $mail->Port = 2525; //Puerto tomado siempre de la configuracion que te da mailtrap

                            //Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com'); //Es quien envia el mensaje
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com'); //A que correo va dirigido
            $mail->Subject = 'Tienes un Nuevo Mensaje'; //Es lo primero que va a leer el usuario

                                    //Habilitar el HTML
            $mail->isHTML(true); //Metodo que nos da la libreria
            $mail->CharSet = 'UTF-8'; //Para que muestre los acentos correctamente 
            
                                //Definif el contenido con el html
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: '. $respuestas['nombre'] .'</p>';

            //Enviar de forma condicional el metodo de contacto
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Eligió ser contactado al telefono: '. $respuestas['telefono'] .'</p>';
                $contenido .= '<p>El día: '. $respuestas['fecha'] .'</p>';
                $contenido .= '<p>A la hora: '. $respuestas['hora'] .'</p>';
            }else{
                //Es email y obtendremos el email
            $contenido .= '<p>Eligió ser contactado por email: '. $respuestas['email'] .'</p>';
            }

            $contenido .= '<p>Mensaje: '. $respuestas['mensaje'] .'</p>';
            $contenido .= '<p>Tipo: '. $respuestas['tipo'] .'</p>';
            $contenido .= '<p>Precio: $'. $respuestas['precio'] .'</p>';
            $contenido .= '</html>'; //El .= me sirve para concatenar, y no solo tome el ultimo valor y los demas datos se pierdan

            $mail->Body = $contenido;
            $mail->AltBody = 'Texto alternativo sin HTML';

                                    //Enviar el email
            if($mail->send()){ //$mail->send(); retorna true o false dependiendo si se envio o no
                $mensaje = "Mensaje enviado correctamente";
            }  else{
                $mensaje = "No se pudo enviar el mensaje";
            }
        }
        $router->render('paginas/contacto', [ //La direccion indidca donde sra enviada la informacion
            'mensaje' => $mensaje
        ]);
    }
}