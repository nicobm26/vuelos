<?php

namespace Model;

class Pasajero extends ActiveRecord{
     // Base de Datos
    protected static $tabla = 'pasajero';
    protected static $columnasDB = ['id','identificacion','password','nombre','pais','ciudad','direccion','codigoPostal','numeroTelefonico', 'email', 'confirmado','token'];
 
    public $id;
    public $identificacion;
    public $password;
    public $nombre;
    public $pais;    
    public $ciudad;    
    public $direccion;
    public $codigoPostal;
    public $numeroTelefonico;
    public $email;
    public $confirmado;
    public $token;
 
    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->identificacion = $args['identificacion'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->codigoPostal = $args['codigoPostal'] ?? '';        
        $this->numeroTelefonico = $args['numeroTelefonico'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }
   
    // Mensajes de validacion para la creacion de una cuenta
    public function validarNuevaCuenta(){

        if (!empty($this->identificacion) && !preg_match("/^[0-9]+$/", $this->identificacion)) {
            self::$alertas['error'][] = 'El número de identificacion solo acepta numeros';
        }

        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }else if (! preg_match("/^[a-zA-Z ]+$/", $this->nombre)){
            self::$alertas['error'][] = 'El nombre no puede llevar numeros o caraceteres especiales';
        }

        // No es obligatorio el telefono, pero si debe tener el formato de 10 numeros
        if(!empty($this->numeroTelefonico)  && !preg_match("/^[0-9]{10}$/", $this->numeroTelefonico)){
            self::$alertas['error'][] = 'El numero de telefono solo puede tener 10 numeros';
        }

        if(empty($this->email) ){
            self::$alertas['error'][] = 'El correo es obligatorio';
        }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El correo no tiene el formato correcto';
        }

        if(!$this->password){
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }else if(strlen($this->password) < 6){
            self::$alertas['error'][] = "La contraseña no es válida. Debe contener al menos 6 caracteres";
        }
        return self::$alertas;
    }

    public function validarCorreo(){
        if(empty($this->email) ){
            self::$alertas['error'][] = 'El correo es obligatorio';
        }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El correo no tiene el formato correcto';
        }
        return self::$alertas;
    }

    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }else if( strlen($this->password) < 6){
            self::$alertas['error'][] = "La contraseña no es válida. Debe contener al menos 6 caracteres";
        }
        return self::$alertas;
    }

    public function validarLogin(){
        $this->validarCorreo();
        $this->validarPassword();
        return self::$alertas;
    }

    public function validarNoCrearUsuariosExistentes($resultadoidentificacion , $resultadoCorreo){
        if( $resultadoidentificacion==null && $resultadoCorreo !==null){
            //Error, correo ya registrado
            self::$alertas['error'][] = 'El correo ya esta registrado';
        }else if($resultadoidentificacion!==null && $resultadoCorreo==null){
            //Error, identificacion ya registrada
            self::$alertas['error'][] = 'La identificacion ya esta registrada';    
        }else if($resultadoidentificacion!==null && $resultadoCorreo!==null){
            //En teoria nunca tendria que llegar aca, porque solo hay 3 casos posibles
            self::$alertas['error'][] = 'El correo y la identificacion ya estan registradas';
        }
        return self::$alertas;
    }

    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken(){
        // $this->token = uniqid();
        $this->token = bin2hex(random_bytes(8)); // "8" genera un string aleatorio de 16 caracteres, un poco mas seguro
    }

    public function comprobarPasswordAndVerificado($passwordUser){
        $resultado = password_verify($passwordUser, $this->password);
        // debuguear($resultado);
        if( !$resultado || !$this->confirmado){
            self::$alertas['error'][] = "Clave Incorrecta";
        }else{
            return true;
        }
    }   
}