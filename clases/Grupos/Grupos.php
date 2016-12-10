<?php

class Grupos {
    
    private $id, $nombre, $tipo;
    
    /*Los comentados no hacen falta porque estan en default en la base de datos y a menos que quieras cambiarlos a otros
    no pueden estar en null*/
    function __construct(/*$id=null,*/$nombre = null, $tipo = 'personal') {
        //$this->id=$id; Como es AUTO_INCREMENT no será necesario que tenga este parametro
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }
    
    function getId(){
        return $this->id;
    }
    
    function getNombre(){
        return $this->nombre;
    }
    
    /*function setId($id){
        $this->id=$id;
    }*/
    
    function setNombre($nombre){
        $this->nombre=$nombre;
    }
    
    function setTipo($tipo){
        $this->tipo=$tipo;
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
        $this->id = $array[0 + $inicio];
        $this->nombre = $array[1 + $inicio];
        $this->titulo = $array[2 + $inicio];
    }
    
}