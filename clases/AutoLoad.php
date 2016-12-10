<?php

class AutoLoad {
    /*static function load($clase) {
        
        $archivo = './clases/' . $clase . '.php';
        if(file_exists($archivo)){
            require_once $archivo;
        }
    }*/
    
    static function load($clase) {
        $posibilities = array('Grupos', 'Notas', 'Usuario', 'GruposUsuarios', 'Media', 'Activar', 'GestionGrupoGrupoUsuario', 'Login', 'FileUpload', 'Borrar');
        $archivo = './clases/' . $clase . '.php';
        
        foreach($posibilities as $posibility){
            if(strpos($clase, $posibility) !== false){
                $archivo = './clases/' . $posibility . '/' . $clase . '.php';
            }
        }
        
        if(file_exists($archivo)){
            require_once $archivo;
        }
    }
    
}

spl_autoload_register('AutoLoad::load');