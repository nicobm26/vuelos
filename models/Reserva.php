<?php

namespace Model;

class Reserva extends ActiveRecord{
     // Base de Datos
    protected static $tabla = 'reserva';
    protected static $columnasDB = ['id','pasajeroId','codigoReserva','tarjetaId','vueloId','vueloId'];

    public $id;
    public $pasajeroId;
    public $codigoReserva;
    public $tarjetaId;
    public $vueloId;    
   
    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->pasajeroId = $args['pasajeroId'] ?? '';
        $this->codigoReserva = $args['codigoReserva'] ?? '';
        $this->tarjetaId = $args['tarjetaId'] ?? '';
        $this->vueloId = $args['vueloId'] ?? '';
    }
   
}