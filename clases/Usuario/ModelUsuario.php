<?php

class ModelUsuario extends Model {
    
    function getUsuario($email){
        $gestor = new GestorUsuario();
        return $gestor->get($email);
    }

    function insertUsuario(Usuario $usuario){
        date_default_timezone_set('Europe/Madrid');
        $usuario->setFalta(date('Y-m-d'));
        $usuario->setTipo('usuario');
        $usuario->setEstado(0);
        $usuario->setPassword(Util::encriptar($usuario->getPassword()));
        $gestor = new GestorUsuario;
        return $gestor->add($usuario);
    }
    
    function activarUsuario($email, $iduser){
        $gestor = new GestorUsuario;
        return $gestor->activarUsuario($email, $iduser);
    }
    
    function editUsuario(Usuario $usuario){
        $usuario->setPassword(Util::encriptar($usuario->getPassword()));
        $gestor = new GestorUsuario;
        return $gestor->saveUsuario($usuario, $usuario->getEmail());
    }
    
    function deleteUsuario($email){
        $gestor=new GestorUsuario();
        return $gestor->delete($email);
    }
    
    /*function getList(){
        $gestor = new GestorUsuario();
        return $gestor->getList();
    }
    
    
    
    function getUsuario($email){
        $gestor = new GestorUsuario();
        return $gestor->get($email);
    }
    
    function editUsuario(Usuario $usuario, $emailpk){
        $gestor = new GestorUsuario();
        return $gestor->saveUsuario($usuario, $emailpk);
    }*/
}