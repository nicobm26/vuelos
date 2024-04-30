<?php

namespace Model;

class Vuelo extends ActiveRecord{
     // Base de Datos
    protected static $tabla = 'vuelo';
    protected static $columnasDB = ['id','aeropuertoOrigenId','aeropuertoDestinoId','fechaSalida','fechaLlegada','FechaSalida','avionId','tarifaId'];
 
    public $id;
    public $aeropuertoOrigen;
    public $aeropuertoDestino;
    public $precio;
    public $Capacidad_Pasajeros;    
    public $FechaSalida;    
    public $HoraSalida;
    public $FechaLlegada;
    public $HoraLlegada;
 
    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->aeropuertoOrigen = $args['aeropuertoOrigen'] ?? '';
        $this->aeropuertoDestino = $args['aeropuertoDestino'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->FechaSalida = $args['FechaSalida'] ?? '';
        $this->HoraSalida = $args['HoraSalida'] ?? '';
        $this->FechaLlegada = $args['FechaLlegada'] ?? '';        
        $this->HoraLlegada = $args['HoraLlegada'] ?? '';
    }

}