<?php

class ControllerLogin extends ControllerGruposUsuarios {
    
    function dologin() {
        $grupo= new Grupos();
        $usuarioWeb = new Usuario();
        $usuarioWeb->read();
        
        $usuarioBd = $this->getModel()->getUsuario($usuarioWeb->getEmail());
       
        if($usuarioWeb->getEmail() === $usuarioBd->getEmail()){
            if(Util::verificarClave($usuarioWeb->getPassword(), $usuarioBd->getPassword())
            && $usuarioBd->getEstado()=='1'){
                $r = $this->getSession()->setUser($usuarioBd);
                header('Location: index.php?op=login&r=' . $r);
                exit();
            }
        }
        $this->getSession()->destroy();
        header('Location: index.php?op=login&r=0');
        exit();
    }
    
    function dologout(){
        $this->getSession()->destroy();
        header('Location: index.php');
        exit();
    }
}