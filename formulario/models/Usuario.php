<?php

class Usuario {
    public $nombre;
    public $username;
    public $password;
    public $email;
    public $telefono;

    /**
     * Valida los datos ingresados para el inicio de sesión
     * @return array
     */
    public function validarLogin(){
        $errores = [];
        if(!$this->username){
            $errores[] = "El nombre de usuario es obligatorio";
        }
        if(!$this->password){
            $errores[] = "El password es obligatorio";
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