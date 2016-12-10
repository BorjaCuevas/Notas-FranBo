<?php

class ModelGruposUsuarios extends ModelGrupos {
    
    function activargrupousuario($id, $email){
        $gestor = new GestorGruposUsuarios();
        return $gestor->activargrupousuario($id, $email);
    }
    
    function getGruposUsuariosId ($id){
        $gestor = new GestorGruposUsuarios();
        return $gestor->getId($id);
    }
    
    function getGruposUsuariosEmail ($email){
        $gestor = new GestorGruposUsuarios();
        if(is_string($email)){
            return $gestor->getEmail($email);
        }else{
            return $gestor->getEmail($email->getEmail());
        }
        
    }
    
    function insertGruposUsuarios(GruposUsuarios $grupousuario){
        $gestor = new GestorGruposUsuarios();
        return $gestor->add($grupousuario);
    }
    
    
    function deletegrupousuario($id, $email){
        $grupousuario = new GestorGruposUsuarios();
        return $grupousuario->delet($id, $email);
    }
    
    function deleteall($email){
        $grupousuario = new GestorGruposUsuarios();
        return $grupousuario->deleteall($email);
    }
}