<?php

class GestorGrupos {
    
    const TABLA = 'grupo';/*Recordar que la tabla se llama grupo*/
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    private static function _getCampos(Grupos $objeto) {
        $campos = $objeto->get();
        return $campos;
    }
    

    function add(Grupos $objeto) {
        return $this->db->insertParameters(self::TABLA, self::_getCampos($objeto));
    }
    
    function deleteGrupo($id) {
        return $this->db->deleteParameters(self::TABLA, array('id' => $id));
    }
    
    /*Para coger de la base de datos una nota (líneas de la base de datos) por su id de nota*/
    function get($id) {
        $array = array('id' => $id);
        $this->db->getCursorParameters(self::TABLA, '*', $array);
        if ($fila = $this->db->getRow()) {
            $objeto = new Grupos();
            $objeto->set($fila);
            return $objeto;
        }
        
        return 0;
    }
    
    function gets($id) {
        $array = array('id' => $id);
        $this->db->getCursorParameters(self::TABLA, '*', $array);
        while ($fila = $this->db->getRow()) {
            $objeto = new Grupos();
            $objeto->set($fila);
            $salida[] = $objeto;
        }
        
        return $salida;
    }
    
    function getGrupoNombre($nombre, $limite = '') {
        if(strlen($limite) === 0){
            $this->db->getCursorParameters(self::TABLA, '*', array('nombre' => $nombre));
        }else{
            $this->db->getCursorParameters(self::TABLA, '*', array('nombre' => $nombre), ' 1 ', $limite);
        }
        if ($fila = $this->db->getRow()) {
            $objeto = new Grupos();
            $objeto->set($fila);
            var_dump($objeto);
            exit();
            return $objeto;
        }
        return 0;
    }
    
    

    /*Guardar una nota. unset sirve para borrar la variable entonces las borras y las guardas por las nuevas 
    lo puse de esas variables porque creo que es lo que puede modificar un usuario de una nota normal
    function saveNota(Notas $objeto, $idpk) {
        $campos = $this->_getCampos($objeto);
        unset($campos['titulo']);
        unset($campos['texto']);
        unset($campos['Visible']);
    }*/
}