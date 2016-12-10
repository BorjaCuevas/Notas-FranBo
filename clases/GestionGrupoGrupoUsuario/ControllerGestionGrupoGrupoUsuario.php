<?php

class ControllerGestionGrupoGrupoUsuario extends ControllerGruposUsuarios {
    
    function doinsertgrupogrupousuario($email = '') {
        $invitado = Request::read('invitarUsuario');
        $relacion = 'miembro'; //Request::read('relacionInvitado')
        if($invitado != ''){
            $idgrupo = self::doinsertgrupo();
            $grupo = self::getIdGrupo($idgrupo);
            self::createGrupoUsuario($grupo);
            self::createGrupoUsuario($grupo, $invitado, $relacion);
            header('location:index.php');
        }else{
            if(strlen($email) === 0){
                $idgrupo = self::doinsertgrupo();
                $grupo = self::getIdGrupo($idgrupo);
                self::createGrupoUsuario($grupo);
                header('location:index.php');
            }else{
                $idgrupo = self::doinsertgrupo($email);
                $grupo = self::getIdGrupo($idgrupo);
                self::createGrupoUsuario($grupo, $email);
                header('location:index.php');
            }
        }
        
    }
    
    function invitar(){
        $invitado = Request::read('invitado');
        $idgrupo = Request::read('idgrupo');
        $relacion = Request::read('relacion');
        self::createGrupoUsuario($idgrupo, $invitado, $relacion);
        header('location:index.php');
    }
    
    function responderinvitacion(){
        $idgrupo = Request::read('idgrupoinvitacion');
        $respuesta = Request::read('respuesta');
        $email = $this->getSession()->getUser()->getEmail();
        if($respuesta === '0'){
            self::activarmiembro($idgrupo, $email);
        }else{
            self::deletegrupousuario($idgrupo, $email);
        }
        header('location:index.php');
    }
    
    function deleteGruposUsuarios($email){
        $grupos = self::lookForGruposDueño($email);
        self::dodeletegrupodueño($email);
        self::deleteallgrupousuario($email);
    }
    
} 
