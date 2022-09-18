<?php 
namespace Model;


class Blog extends ActiveRecord{

    protected static $tabla = 'blog';
    protected static $columnasDB = ['id', 'titulo', 'fecha', 'texto', 'imagen', 'vendedorId'];

    
    public $id;
    public $titulo;
    public $fecha;
    public $texto;
    public $imagen;
    public $vendedorId;

public function __construct($args = 0)
{
    $this->id = $args['id'] ?? NULL; //?? '' me permite poner un vacio si no resive nada, para que no de error
    $this->titulo = $args['titulo'] ?? '';
    $this->fecha = date('Y-m-d');
    $this->texto= $args['texto'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->vendedorId = $args['vendedorId'] ?? '';
}

public function validar(){
    if(!$this->titulo){
        self::$errores[] = 'Debes colocar un titulo';
    }
    if(strlen($this->texto) < 50){
        self::$errores[] = "Tiene que colocar un texto mayor a 50 caracteres";
    }
    if(!$this->imagen){
        self::$errores[] = "Agregue una imagen";
    }
    if(!$this->vendedorId){
        self::$errores[] = "Debe asignar un vendedor al blog";
    }
    return self::$errores;
}

}