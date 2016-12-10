<?php

class ControllerBorrar extends ControllerGestionGrupoGrupoUsuario {
    
    function dodelete(){
        $sesion = Session::getInstance();
        $usuario = new ModelUsuario();
        $email = $this->getSession()->getUser()->getEmail();
        $contraseña = Request::read('contraseña');
        $usuarioBd = $usuario->getUsuario($email);
        
        if(Util::verificarClave($contraseña, $usuarioBd->getPassword())){
            $grupos = self::lookForGruposDueño($email);
            // self::deleteallgrupousuario($email); NO NECESARIO POR DELETE CASCADE
            self::dodeletegrupodueño($grupos);
            self::deleteusuario($email);
            $sesion->destroy();
        }else{
            header('location:index.php?error');
        }
        header('location:index.php');
    }
    
}