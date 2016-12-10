<?php

class Usuario {
    
    private $email, $password, $falta, $tipo, $estado,$nombre,$apellido,$direccion,$movil;
    
    function __construct($email = null, $password = null, $falta = null, $tipo = null, $estado = null,$nombre = null,$apellido =null,$direccion = null,$movil = null) {
        $this->email = $email;
        $this->password = $password;
        $this->falta = $falta;
        $this->tipo = $tipo;
        $this->estado = $estado;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->movil = $movil;
    }
    
    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getFalta() {
        return $this->falta;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEstado() {
        return $this->estado;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getApellido() {
        return $this->apellido;
    }
    function getDireccion() {
        return $this->direccion;
    }
    function getMovil() {
        return $this->movil;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setFalta($falta) {
        $this->falta = $falta;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    
    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    
    function setMovil($movil) {
        $this->movil = $movil;
    }
    
    
    function __toString() {
        $r = '';
        foreach($this as $key => $valor) {
            $r .= "$key => $valor - ";
        }
        return $r;
    }
    
    function read(ObjectReader $reader = null){
        if($reader===null){
            $reader = 'Request';
        }
        foreach($this as $key => $valor) {
            $this->$key = $reader::read($key);
        }
    }
    
    function get(){
        $nuevoArray = array();
        foreach($this as $key => $valor) {
            $nuevoArray[$key] = $valor;
        }
        return $nuevoArray;
    }
    
    function set(array $array, $inicio = 0) {
        $this->email = $array[0 + $inicio];
        $this->password = $array[1 + $inicio];
        $this->falta = $array[2 + $inicio];
        $this->tipo = $array[3 + $inicio];
        $this->estado = $array[4 + $inicio];
        $this->nombre = $array[5 + $inicio];
        $this->apellido = $array[6 + $inicio];
        $this->direccion = $array[7 + $inicio];
        $this->movil = $array[8 + $inicio];
    }
    
    function isValid() {
        if($this->email === null || $this->password === null){
            return false;
        }
        return true;
    }

}