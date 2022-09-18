<?php 
namespace Model;


class Vendedores extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

public function __construct($args = 0)
{
    $this->id = $args['id'] ?? NULL; //?? '' me permite poner un vacio si no resive nada, para que no de error
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
}

public function validar(){
    if(!$this->nombre){
        self::$errores[] = 'Debes colocar un nombre';
    }
    if(!$this->apellido){
        self::$errores[] = "Tiene que colocar el apellido";
    }
    if(!$this->telefono){
        self::$errores[] = "Agregue el numero de telefono";
    }
    if(!preg_match('/[0-9]{8}/', $this->telefono)){
        self::$errores[] = "Formato de teléfono no Válido";
    }

    return self::$errores;
}

}