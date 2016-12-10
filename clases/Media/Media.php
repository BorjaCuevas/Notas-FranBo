 <?php

class Media extends Notas{
    
    protected $id;
    protected $idnota;
    private $tipo, $url, $texto;
    
    function __construct($id = null, $idnota = null, $tipo = null, $url = null, $texto = null) {
        $this->id = $id;
        $this->idnota= $idnota;
        $this->tipo = $tipo;
        $this->url = $url;
        $this->texto = $texto;
    
    }
    
    function getId() {
        return $this->id;
    }

    function getIdNota() {
        return $this->idnota;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getUrl() {
        return $this->url;
    }

    function getTexto() {
        return $this->texto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdNota($idnota) {
        $this->idnota = $idnota;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setTexto($texto) {
        $this->texto = $texto;
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
        $this->idnota = $array[1 + $inicio];
        $this->tipo = $array[2 + $inicio];
        $this->url = $array[3 + $inicio];
        $this->texto = $array[4 + $inicio];
    
    }
    
    function isValid() {
        if($this->email === null || $this->password === null){
            return false;
        }
        return true;
    }

}