<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\LoginController;
use MVC\Router;
use Controllers\PaginasController;
use Controllers\ComprarController;
use Controllers\MedidaController;
use Controllers\VueloController;

$router = new Router();


//Panel administracion
$router->get("/", [VueloController::class, 'index']);
$router->post("/", [VueloController::class, 'index']);

$router->get("/consultarVuelos", [VueloController::class, 'consultarTodosVuelos']);
$router->get("/vuelo", [VueloController::class, 'vueloInformacion']);
$router->post("/vuelo", [VueloController::class, 'vueloInformacion']);
//$router->get("/admin", [LoginController::class, 'contactanos']);

// $router->post("/contactanos", [PaginasController::class, 'contactanos']);


//Login y Autenticacion
$router->get("/login", [LoginController::class, 'login']);
$router->post("/login", [LoginController::class, 'login']);
$router->get("/registrar", [LoginController::class, 'registrar']);
$router->post("/registrar", [LoginController::class, 'registrar']);
$router->get("/mensaje", [LoginController::class, 'mensaje']);
$router->get("/logout", [LoginController::class, 'logout']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();


