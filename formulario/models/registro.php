<?php

class registro {
    public $nombre;
    public $email; 
    public $telefono;
    public $username;
    public $password;

    /**
     * Valida los datos ingresados para el registro
     * @return array
     */
    public function validarLogin(){
        $errores = [];
        if(!$this->nombre){
            $errores[] = "El nombre es obligatorio";
        }
        if(!$this->email){
            $errores[] = "El email es obligatorio";
        }
        if(!$this->telefono){
            $errores[] = "El teléfono es obligatorio";
        }
        if(!$this->username){
            $errores[] = "El nombre de usuario es obligatorio";
        }
        if(!$this->password){
            $errores[] = "La contraseña es obligatoria";
        }
        return $errores;
    }

    public function login(){
        return true;
    }

    /**
     * Sincroniza los atributos de la clase con los valores del arreglo.
     * Ejemplo de uso:
     * ```
     * php
     * $data = ['nombre' => 'Alex', 'email' => 'prueba@test.pe', 'telefono' => '6559222'];
     * $usuario->sincronizar($data);
     * ```
     * 
     */
    public function sincronizar($args = []){
        foreach ($args as $key => $value) {
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }
}