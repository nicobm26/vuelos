<?php

namespace Controllers;

use Model\VueloInfo;
use MVC\Router;

class VueloController{

    public static function index(Router $router){        
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


    // public static function consultarTodosVuelos(){
    //     $vuelos = new VueloInfo();
    //     $consulta = $vuelos->consultarVuelos();
    //     $vuelos = $vuelos->consultarSQL($consulta);
    //     echo json_encode($vuelos);     
    // }
    
}