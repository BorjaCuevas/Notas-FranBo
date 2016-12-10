<?php

class GruposUsuarios {
    
    private $idgrupo, $email, $estado, $relacion;
    
    
    function __construct() {
        $this->idgrupo;
        $this->email;
        $this->estado;
        $this->relacion;
    }
    
    function getIdgrupo(){
        return $this->idgrupo;
    }
    
    function getEmail(){
        return $this->email;
    }
    
    function getEstado(){
        return $this->estado;
    }
    
    function getRelacion(){
        return $this->relacion;
    }
    
    function setIdGrupo($idgrupo){
        $this->idgrupo=$idgrupo;
    }
    
    function setEmail($email){
        $this->email=$email;
    }
    
    function setEstado($estado){
        $this->estado=$estado;
    }
    
    function setRelacion($relacion){
        $this->relacion=$relacion;
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
        $this->idgrupo = $array[0 + $inicio];
        $this->email = $array[1 + $inicio];
        $this->estado = $array[2 + $inicio];
        $this->relacion = $array[3 + $inicio];
    }
    
}