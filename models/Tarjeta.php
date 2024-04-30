<?php

namespace Model;

class Tarjeta extends ActiveRecord{
     // Base de Datos
    protected static $tabla = 'tarjeta';
    protected static $columnasDB = ['id','fechaVencimiento','nombre','empresa'];

    public $id;
    public $fechaVencimiento;
    public $nombre;
    public $empresa;  
   
    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->fechaVencimiento = $args['fechaVencimiento'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->empresa = $args['empresa'] ?? '';
    }
   
}