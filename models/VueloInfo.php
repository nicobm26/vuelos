<?php

namespace Model;

class VueloInfo extends ActiveRecord{
     // Base de Datos
    protected static $tabla = 'vuelo';
    protected static $columnasDB = ['id','aeropuertoOrigen','aeropuertoDestino','precio','Capacidad_Pasajeros','FechaSalida','HoraSalida','FechaLlegada','HoraLlegada'];
 
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


    private function generarConsultaBase(){
        return "
        SELECT 
        vuelo.id, aeropuerto.nombre AS \"aeropuertoOrigen\", aeropuerto2.nombre AS \"aeropuertoDestino\", 
        tarifa.precio AS \"precio\", avion.capacidadPasajeros AS Capacidad_Pasajeros, horario.fecha AS FechaSalida,
        horario.hora AS HoraSalida, horario2.fecha AS FechaLLegada, horario2.hora AS HoraLlegada from vuelo
        JOIN avion 
            ON vuelo.avionId = avion.id        
        join aeropuerto 
            on vuelo.aeropuertoOrigenId = aeropuerto.id
        join aeropuerto as aeropuerto2
            on	 vuelo.aeropuertoDestinoId = aeropuerto2.id
        JOIN horario 
            ON vuelo.fechaSalida = horario.id
        JOIN horario AS horario2 
            ON vuelo.fechaLlegada = horario2.id
        JOIN tarifa 
            ON vuelo.tarifaId = tarifa.id
        ";
    }

    public function consultarTodosVuelos() {
        return $this->generarConsultaBase();
    }

    public function consultarPorFecha($fechaSalida) {
        return $this->generarConsultaBase() . " WHERE horario.fecha = '$fechaSalida'";
    }

    public function consultarPorPrecio($precio) {
        return $this->generarConsultaBase() . " WHERE tarifa.precio <= '$precio'";
    }

    public function consultarPorPrecioYFecha($precio, $fecha) {
        return $this->generarConsultaBase() . " WHERE tarifa.precio <= '$precio' AND horario.fecha = '$fecha'";
    }
}