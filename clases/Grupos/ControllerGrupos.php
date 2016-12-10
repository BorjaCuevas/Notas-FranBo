<?php

class ControllerGrupos extends ControllerUsuario {
    
    function doinsertgrupo($email = '') {
        $sesion = Session::getInstance();
        $grupo = new Grupos();
        $grupo->read();
        $grupo->setTipo('personal');
        if(strlen($email) === 0){
            $salida = $this->getModel()->insertGrupos($grupo);
            $grupo->setNombre($sesion->getUser()->getEmail() . '//' . $grupo->getNombre());
        }else{
            $grupo->setNombre($email . '//personal');
            $salida = $this->getModel()->insertGrupos($grupo);
        }
        return $salida;
    }
    
    function getIdGrupo($id){
        $model = $this->getModel();
        return $model->getGrupo($id);
    }
    
    function lastgrupo($email = ''){
        $sesion = Session::getInstance();
        $model = $this->getModel();
        if(strlen($email) === 0){
            $email = $sesion->getUser();
        }else{
            $email .= '//personal';
        }
        
        return $model->getlastgrupo($email);
    }
    
    function getGrupos(){
        $model = $this->getModel();
        $email = $this->getSession->getUser();
        $grupos = $model->getGrupos($email);
        return self::drawGroups($grupos);
    }
    
    function drawGroups($grupos){
        $view = new ViewGrupos();
        foreach($grupos as $grupo){
            $salida[$grupo->getNombre()] = $grupo->getId();
        }
         return $view->drawGroups($salida);
    }
    
    function dodeletegrupo(){//NO HACE FALTA BORRAR TB EN GRUPO-USUARIO XK ES DELETECASCADE EN BD
        $grupo = new Grupos();
        $grupo->read();
        $r = $this->getModel()->deleteGrupos($id);
        header('Location: index.php?ruta=grupo&accion=viewlist&op=delete&r=' . $r);
        exit();
    }
    
    function dodeletegrupodueño($grupos){//NO HACE FALTA BORRAR TB EN GRUPO-USUARIO XK ES DELETECASCADE EN BD
        foreach($grupos as $grupo){
            $id[] = $grupo->getIdgrupo();
        }
        return $this->getModel()->deleteGrupos($id);
    }
    
}