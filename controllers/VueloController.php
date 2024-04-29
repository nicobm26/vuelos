<?php

namespace Controllers;

use Model\VueloInfo;
use MVC\Router;

class VueloController{

    public static function index(Router $router){
        $vueloInfo = new VueloInfo();
        $vuelos = [];
        $vuelo = [];
        if(isset($_GET['fecha'])){          
            $fecha = $_GET['fecha'];    
            $consulta = $vueloInfo->consultarPorFecha($fecha);            
            $vuelo = $vueloInfo->consultarSQL($consulta);
            // debuguear("fecha");
        }elseif($_SERVER['REQUEST_METHOD'] === "GET"){
            $consulta = $vueloInfo->consultarVuelos();
            $vuelos = $vueloInfo->consultarSQL($consulta);
            // debuguear($vuelos);
        }       
        $router->mostrarVista("vuelos/index",[
            "vuelos" => $vuelos,
            "vuelo" => $vuelo
        ]);
    }


    public static function consultarTodosVuelos(){
        $vuelos = new VueloInfo();
        $consulta = $vuelos->consultarVuelos();
        $vuelos = $vuelos->consultarSQL($consulta);
        echo json_encode($vuelos);     
    }




    
}