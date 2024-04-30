<?php

namespace Controllers;

use Model\Tarjeta;
use Model\Asiento;
use Model\VueloInfo;
use Model\Reserva;
use MVC\Router;

class VueloController{

    public static function index(Router $router){
        isAuth();   
        if( $_SERVER['REQUEST_METHOD'] === 'GET' ){
            $vueloInfo = new VueloInfo();
            $vuelos = [];
            $fecha = $_GET['fecha'] ?? '';
            $precio = $_GET['precio'] ?? '';
            // debuguear($fecha);
            if( !empty($fecha) && !empty($precio) ){
                // debuguear("fecha y precio");
                $consulta = $vueloInfo->consultarPorPrecioYFecha($precio, $fecha);
                $vuelos = $vueloInfo->consultarSQL($consulta);
            }elseif(!empty($fecha) && empty($precio)){
                // debuguear("solo fecha");
                $consulta = $vueloInfo->consultarPorFecha($fecha);
                $vuelos = $vueloInfo->consultarSQL($consulta);
            }elseif( empty($fecha) && !empty($precio) ){
                // debuguear("solo precio");
                $consulta = $vueloInfo->consultarPorPrecio($precio);
                $vuelos = $vueloInfo->consultarSQL($consulta);
            }else{
                // debuguear("buscar todos, sin filtros");
                $consulta = $vueloInfo->consultarTodosVuelos();
                $vuelos = $vueloInfo->consultarSQL($consulta);
            }
           
            // debuguear($vuelos);
        }
        
        $router->mostrarVista("vuelos/index",[
            "vuelos" => $vuelos           
        ]);
    }

    public static function vueloInformacion(Router $router){
        isAuth(); 
        $id = $_GET['id'];
        $vuelo = new VueloInfo();
        $reserva = new Reserva();
        $asiento = new Asiento();

        $consulta = $vuelo->buscarVueloPorId($id);
        $arregloVuelo = $vuelo->consultarSQL($consulta);
        $vuelo = new VueloInfo();
        foreach ($arregloVuelo[0] as $clave => $valor) {
            $vuelo->$clave = $valor;
        }        

        $cantidadAsientosTotal = (int) $vuelo->Capacidad_Pasajeros;
        $cantidadReservas = (int) $reserva::totalReservas($vuelo->id);
        $asientosDisponibles = $cantidadAsientosTotal - $cantidadReservas;

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            // debuguear($_POST);
            $cantidadReservas = (int) $reserva::totalReservas($vuelo->id);
            // debuguear($cantidadReservas);
    
            if($cantidadReservas<=$cantidadAsientosTotal){        
                //Se puede hacer reservar, porque hay cupo
                $reserva->pasajeroId = $_SESSION['id'];
                $reserva->tarjetaId = $_POST['metodo_pago'];
                $reserva->vueloId = $vuelo->id;
                $reserva->guardar();

                $asiento->vueloId = $vuelo->id;
                $asiento->guardar();      
                
                header("Location: /");
            }        
            // debuguear($vuelo);
            // debuguear($cantidadAsientosTotal);
            // debuguear($cantidadAsientosOcupados);
        }
        $router->mostrarVista("/vuelos/vuelo",[
            "vuelo" => $vuelo,
            "tarjetas" => Tarjeta::all(),
            "asientosDisponibles" => $asientosDisponibles 
        ]);
    }


    public static function convertirArregloObjeto($arreglo){
        isAuth(); 
        $objeto = new VueloInfo();
        foreach ($arreglo[0] as $clave => $valor) {
            $objeto->$clave = $valor;
        }
        return $objeto;
    }


    // public static function consultarTodosVuelos(){
    //     $vuelos = new VueloInfo();
    //     $consulta = $vuelos->consultarVuelos();
    //     $vuelos = $vuelos->consultarSQL($consulta);
    //     echo json_encode($vuelos);     
    // }
    
}