<?php

class GestorMedia {
    
    const TABLA = 'media';
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    private static function _getCampos(Media $objeto) {
        $campos = $objeto->get();
        return $campos;
    }
    

    function add(Media $objeto) {
        return $this->db->insertParameters(self::TABLA, self::_getCampos($objeto), false);
    }
    
    function delete($id) {
        return $this->db->deleteParameters(self::TABLA, array('id' => $id));
    }
    

    function get($id) {
        $this->db->getCursorParameters(self::TABLA, '*', array('id' => $id));
        if ($fila = $this->db->getRow()) {
            $objeto = new Media();
            $objeto->set($fila);
            return $objeto;
        }
        
        return 0;
    }
    
    
    function getList($id) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idNota' => $id));
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Media();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
    
    function getAll() {
        $this->db->getCursorParameters(self::TABLA);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Media();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }


    function saveMedia(Media $objeto, $idpk) {
        $campos = $this->_getCampos($objeto);
        unset($campos['titulo']);
        unset($campos['texto']);
    }
}