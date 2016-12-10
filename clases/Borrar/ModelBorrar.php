<?php

class ModelBorrar extends ModelGestionGrupoGrupoUsuario {
    
    function borrarUsuario($email, $iduser){
        $gestor = new GestorUsuario;
        return $gestor->activarUsuario($email, $iduser);
    }
    
}