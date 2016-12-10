<?php

class ModelActivar extends ModelGestionGrupoGrupoUsuario {
    
    function activarUsuario($email, $iduser){
        $gestor = new GestorUsuario;
        return $gestor->activarUsuario($email, $iduser);
    }
    
}