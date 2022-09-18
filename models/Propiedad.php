<?php 
namespace Model;


class Propiedad extends ActiveRecord{

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 
    'estacionamiento', 'creado', 'vendedores_id'];

    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    
public function __construct($args = 0)
{
    $this->id = $args['id'] ?? NULL; //?? '' me permite poner un vacio si no resive nada, para que no de error
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y-m-d');
    $this->vendedores_id = $args['vendedores_id'] ?? '';
}


public function validar(){
    if(!$this->titulo){
        self::$errores[] = 'Debes colocar un titulo';
    }
    if(!$this->precio){
        self::$errores[] = "Tiene que colocar el precio";
    }
    if(strlen($this->descripcion) < 50){
        self::$errores[] = "La descripcion es importante y debe ser mayor a 50 caracteres";
    }
    if(!$this->habitaciones){
        self::$errores[] = "El numero de habitaciones es obligatorio";
    }
    if(!$this->wc){
        self::$errores[] = "Coloque la cantidad de baños";
    }
    if(!$this->estacionamiento){
        self::$errores[] = "El numero de estacionamientos es obligatorio";
    }
    if(!$this->vendedores_id){
        self::$errores[] = "Debe especificar el vendedor asignado";
    }
    if(!$this->imagen) {
        self::$errores[] = "La imagen es obligatoria";
    }

    return self::$errores;
}

}