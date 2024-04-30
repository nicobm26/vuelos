<?php

namespace Model;

class Asiento extends ActiveRecord{
     // Base de Datos
    protected static $tabla = 'asiento';
    protected static $columnasDB = ['id','claseAsiento','fila','letra','vueloId'];

    public $id;
    public $claseAsiento;
    public $fila;
    public $letra;
    public $vueloId;    
   
    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->claseAsiento = $args['claseAsiento'] ?? '';
        $this->fila = $args['fila'] ?? '';
        $this->letra = $args['letra'] ?? '';
        $this->vueloId = $args['vueloId'] ?? '';
    }
   
}