<?php

class ControllerActivar extends ControllerGestionGrupoGrupoUsuario {
    
    function doactivar() {
        $email = Request::read('email');
        $iduser = Request::read('iduser');
        $r = $this->getModel()->activarUsuario($email, $iduser);
        if($r>0){
            self::doinsertgrupogrupousuario($email);
            $this->getModel()->addData('contenido', 'activación realizada correctamente, ya se puede autentificar');
        } else {
            $this->getModel()->addData('contenido', 'activación incorrecta, posiblemente ya estuviera activado');
        }
        header('Location: index.php');
    }
    
}