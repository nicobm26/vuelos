<?php

namespace Controllers;

use Model\VueloInfo;
use MVC\Router;

class VueloController{

    public static function index(Router $router){
        $vuelos = new VueloInfo();
        $consulta = $vuelos->consultarVuelos();
        $vuelos = $vuelos->consultarSQL($consulta);

        $router->mostrarVista("vuelos/index",[
            "vuelos" => $vuelos
        ]);
    }


    public static function consultarTodosVuelos(Router $router){
        $vuelos = new VueloInfo();
        $consulta = $vuelos->consultarVuelos();
        $vuelos = $vuelos->consultarSQL($consulta);
        echo json_encode($vuelos);     
    }




    
}