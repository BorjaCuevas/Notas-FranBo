<?php
class Notas {
    
    private $id,$titulo, $texto, $idgrupo, $estado, $fechaAlarma, $tipo, $fechaCreacion,$visible;
    
    /*Los comentados no hacen falta porque estan en default en la base de datos y a menos que quieras cambiarlos a otros
    no pueden estar en null*/
    function __construct(/*$id=null,*/$titulo = null, $texto = null, $idgrupo = null,/*$tipo = null, */ $visible = null) {
        //$this->id;//Como es AUTO_INCREMENT no será necesario que tenga este parametro
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->idgrupo = $idgrupo;
        //$this->estado;
        $this->fechaAlarma = $fechaAlarma;
        $this->fechaCreacion;
        $this->tipo;
        $this->visible = $visible;
        
    }
    function getId(){
        return $this->id;
    }
    function getTitulo() {
        return $this->titulo;
    }

    function getTexto() {
        return $this->texto;
    }

    function getIdgrupo() {
        return $this->idgrupo;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFechaAlarma() {
        return $this->fechaAlarma;
    }
    function getFechaCreacion() {
        return $this->fechaCreacion;
    }
    function getTipo() {
        return $this->tipo;
    }
    function getVisible() {
        return $this->visible;
    }
    
    /*function setId($id){
        $this->id=$id;
    }*/
    
    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setIdgrupo($idgrupo) {
        $this->idgrupo = $idgrupo;
    }

    function setFechaAlarma($fechaAlarma) {
        $this->fechaAlarma = $fechaAlarma;
    }

    function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }
    
    function setVisible($visible) {
        $this->visible = $visible;
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
  
    function set(array $array, $inicio = 0) {
        $this->id = $array[0 + $inicio];
        $this->titulo = $array[1 + $inicio];
        $this->idgrupo = $array[2 + $inicio];
        $this->texto = $array[3 + $inicio];
        $this->estado = $array[4 + $inicio];
        $this->fechaAlarma = $array[5 + $inicio];
        $this->tipo = $array[6 + $inicio];
        $this->fechaCreacion = $array[7 + $inicio];
        $this->visible = $array[8 + $inicio];

    }
    function get(){
        $nuevoArray = array();
        foreach($this as $key => $valor) {
            if($valor != null){
                $nuevoArray[$key] = $valor;
            }
        }
        return $nuevoArray;
    }
    

}