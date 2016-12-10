<?php

class ModelGrupos extends ModelUsuario {
    
    function getGrupo($id){
        $gestor = new GestorGrupos();
        return $gestor->gets($id);
    }
    
    function getlastgrupo($email){
        $gestor = new GestorGrupos();
        return $gestor->getGrupoNombre($email, 'DESC');
    }
    
    function getPersonal($nombre){
        $gestor = new GestorGrupos();
        return $gestor->getGrupoNombre($nombre);
    }

    function insertGrupos(Grupos $grupo){
        $gestor = new GestorGrupos();
        return $gestor->add($grupo);
    }
    
    function deleteGrupos($idgrupo){ 
        $gestor = new GestorGrupos();
        $gestor->deleteGrupo($idgrupo);
    }
    
}