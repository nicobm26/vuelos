<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Pasajero;

class LoginController{

    public static function login(Router $router){        
        $alertas = [];
        $auth = new Pasajero($_POST);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // debuguear("holaa");
            $auth = new Pasajero($_POST);
            $alertas = $auth->validarLogin();
            if(empty($alertas)){    
                //1.Comprobar que exista email
                $usuario = Pasajero::where('email', $auth->email);

                if($usuario){
                     //Existe Usuario, Proseguir a verificar password   
                     if( $usuario->comprobarPasswordAndVerificado($auth->password)){
                        //Autenticar el usuario
                        if(!isset($_SESSION)) {  
                            session_start();
                        }
                        // $_SESSION['cedula'] = $usuario->cedula;
                        // $_SESSION['fullname'] = $usuario->nombres . " " . $usuario->apellidos;
                        // $_SESSION['correo'] = $usuario->correo;
                        // $_SESSION['login'] = true;                        

                        //Redireccionamiento   ///Re pensar, ya que nostros tenems            
                        header("Location: /");      
                    }
                }else{
                    Pasajero::setAlerta('error', 'Correo no registrado');
                }
            }
        }

        $alertas = Pasajero::getAlertas();

        $router->mostrarVista("/auth/login",[
            "alertas" => $alertas,
            "usuario" => $auth
        ]);
    }

    public static function registrar(Router $router){
        $alertas = [];
        $pasajero = new Pasajero();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // debuguear($_POST);
            $pasajero->sincronizar($_POST);
            $alertas = $pasajero->validarNuevaCuenta();
            if(empty($alertas)){
                $resultadoCedula = Pasajero::where("identificacion" , $pasajero->identificacion);
                // debuguear($resultadoCedula);
                $resultadoCorreo = Pasajero::where("email" , $pasajero->email);
                $alertas = $pasajero->validarNoCrearUsuariosExistentes($resultadoCedula,$resultadoCorreo);

                if(empty($alertas)){
                    //crear
                    $pasajero->hashPassword();

                     // Generar token unico
                    $pasajero->crearToken();
                                                                         
                    //  debuguear($pasajero);
                    // Enviar Email
                    $email = new Email($pasajero->email, $pasajero->nombre, $pasajero->token);                    
                    $email->enviarConfirmacion();

                    $resultado = $pasajero->guardar();

                    // if($resultado) {
                    //     header('Location: /mensaje');
                    // }                                         
                }
            }                                
        }
        $router->mostrarVista("/auth/registrar",[
            "pasajero" => $pasajero,
            "alertas"=> $alertas
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
        session_destroy();
        header('Location: /');
    }

    public static function mensaje(Router $router) {    
        $router->mostrarVista('auth/mensaje', [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }


}
