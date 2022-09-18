<?php 
namespace Model;

class Admin extends ActiveRecord{

    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id' ,'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar(){
        if(!$this->email){
            self::$errores[] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$errores[] = 'El password es obligatorio';
        }
        return self::$errores;
    }
    
    public function existeUsuario(){
        $query = "SELECT * FROM " . self::$tabla .  " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if(!$resultado->num_rows){//num_rows se toma de debuguear resultado (muestra 1 si es true y o si es false)
            self::$errores[] = 'El usuario no existe';
            return; //Para que ya no se sig ejecutando
        }
        return $resultado;
    }

    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object(); //Devuelve una fila de datos en forma de arreglo

        //password_verify(password a verificar, password registrado en la BD);
        $autenticado = password_verify($this->password, $usuario->password);
        if(!$autenticado){
            self::$errores[] = 'Password incorrecto';
        }
        return $autenticado;
    }

    public function autenticar(){
        session_start();

        //Llenar el arreglo de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin'); //Manda a la pagina de administrador
    }

}
