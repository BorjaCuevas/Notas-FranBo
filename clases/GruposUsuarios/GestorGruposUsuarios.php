<?php

class GestorGruposUsuarios {
    
    const TABLA = 'grupousuario';/*Recordar que la tabla se llama grupousuario*/
    private $db;

    function __construct() {
        $this->db = new DataBase();
    }

    private static function _getCampos(GruposUsuarios $objeto) {
        $campos = $objeto->get();
        return $campos;
    }
    
    function activargrupousuario($id, $email){
        return $this->db->updateParameters(self::TABLA, array('estado' => 0), array('idgrupo' => $id, 'email' => $email));
    }

    function add(GruposUsuarios $objeto) {
        return $this->db->insertParameters(self::TABLA, self::_getCampos($objeto), false);
    }
    
    /*TEORICAMENTE ESTO LO HACE AUTOMATICAMENTE LA BASE DE DATOS SI BORRAS UN GRUPO O USUARIO
    POR EL DELETE_CASCADE
    function delete($idgrupo) {
        return $this->db->deleteParameters(self::TABLA, array('id' => $id));
    }*/
    
    /*Para coger de la base de datos una grupoUsuario por su idgrupo e email*/
    function get($id, $email) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idgrupo' => $id, 'email' => $email));
        if ($fila = $this->db->getRow()) {
            $objeto = new GruposUsuarios();
            $objeto->set($fila);
            return $objeto;
        }
        
        return 0;
    }
    
    /*Para coger de la base de datos una grupoUsuario por su idgrupo*/
    function getId($id) {
        $this->db->getCursorParameters(self::TABLA, '*', array('idgrupo' => $id));
        if ($fila = $this->db->getRow()) {
            $objeto = new GruposUsuarios();
            $objeto->set($fila);
            return $objeto;
        }
        
        return 0;
    }
    
    /*Para coger de la base de datos una grupoUsuario por su email*/
    function getEmail($email) {
        $this->db->getCursorParameters(self::TABLA, '*', array('email' => $email));
        $respuesta = array();
        
        while ($fila = $this->db->getRow()) {
            $objeto = new GruposUsuarios();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
    
    /*Para coger de la base de datos todas los gruposUsuarios*/
    function getAll() {
        $this->db->getCursorParameters(self::TABLA);
        $respuesta = array();
        while ($fila = $this->db->getRow()) {
            $objeto = new Grupos();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }
    
    function delet($id, $email){
        return $this->db->deleteParameters(self::TABLA, array('idgrupo' => $id, 'email' => $email));
    }
    
    function deleteall($email){
        return $this->db->deleteParameters(self::TABLA, array('email' => $email));
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