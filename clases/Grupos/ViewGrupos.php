<?php

class ViewGrupos extends View {

    protected $modelo;

    function __construct(Model $modelo) {
        $this->modelo = $modelo;
    }

    function getModel() {
        return $this->modelo;
    }
    
    function drawGroups($grupos){
        $salida = '';
        foreach($grupos as $nombre => $id){
            $salida .= '<option value="' . $id . '" >' . $nombre . '</option>';
        }
        return $salida;
    }
    
}