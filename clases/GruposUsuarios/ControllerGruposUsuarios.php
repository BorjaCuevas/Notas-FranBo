<?php

class ControllerGruposUsuarios extends ControllerGrupos {
    
    function createGrupoUsuario($grupo, $email = '', $relacion = '') {
        $grupousuario = new GruposUsuarios();
        $grupousuario->setIdGrupo($grupo[0]->getId());
        if(strlen($relacion) === 0){
            if(strlen($email) === 0){
                $grupousuario->setEmail($this->getSession()->getUser()->getEmail());
            }else{
                $grupousuario->setEmail($email);
            }
            $grupousuario->setRelacion('dueño');
            $grupousuario->setEstado('0');
        }else{
            $grupousuario->setEmail($email);
            $grupousuario->setRelacion($relacion);
            $grupousuario->setEstado('-1');
        }
        
        return $this->getModel()->insertGruposUsuarios($grupousuario);
    }
    
    function deletegrupousuario($id, $email){
        return $this->getModel()->deletegrupousuario($id, $email);
    }
    
    function deleteallgrupousuario($email){
        return $this->getModel()->deleteall($email);
    }
    
    function lookForGruposDueño($email=''){
        $grupos = $this->getModel()->getGruposUsuariosEmail($email);
        
        foreach($grupos as $grupo){
            if($grupo->getRelacion() === 'dueño'){
                $salida[] = $grupo;
            }
        }
        return $salida;
    }
    
    function activarmiembro($id, $email){
        return $this->getModel()->activargrupousuario($id, $email);
    }
}