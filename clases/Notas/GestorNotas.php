<?php

class GestorNotas {
    
    const TABLA = 'nota';/*Recordar que la tabla se llama nota*/
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    private static function _getCampos(Notas $objeto) {
        $campos = $objeto->get();
        return $campos;
    }
    

    function add(Notas $objeto) {
        return $this->db->insertParameters(self::TABLA, self::_getCampos($objeto), false);
    }
    
    function delete($id) {
        return $this->db->deleteParameters(self::TABLA, array('id' => $id));
    }
    
    /*Para coger de la base de datos una nota (líneas de la base de datos) por su id de nota*/
    function get($id) {
        $this->db->getCursorParameters(self::TABLA, '*', array('id' => $id));
        if ($fila = $this->db->getRow()) {
            $objeto = new Notas();
            $objeto->set($fila);
            return $objeto;
        }
        
        return 0;
    }
    
    /*Para coger de la base de datos todas las notas pertenecientes a un idGrupo*/
    function getList($idGrupo) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idGrupo' => $idGrupo));
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Notas();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
    
    /*Para coger de la base de datos todas las notas*/
    function getAll() {
        $this->db->getCursorParameters(self::TABLA);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Notas();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }

    /*Guardar una nota. unset sirve para borrar la variable entonces las borras y las guardas por las nuevas 
    lo puse de esas variables porque creo que es lo que puede modificar un usuario de una nota normal*/
    function saveNota(Notas $objeto, $idpk) {
        $campos = $this->_getCampos($objeto);
        unset($campos['titulo']);
        unset($campos['texto']);
        unset($campos['Visible']);
    }
}