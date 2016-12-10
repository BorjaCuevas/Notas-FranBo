<?php

class ControllerNotas extends Controller {
    
    function doinsertNota() {
        $nota = new Notas();
        $nota->read();
        
        $this->getModel()->insertNotas($nota);
        
        header('Location: index.php?&grupo=' . Request::read('idgrupo'));
        exit();
    }
    
    function dodelete(){
        $id = Request::read('id');
        $r = $this->getModel()->deleteNota($id);
        header('Location: index.php?ruta=usuario&accion=viewlist&op=delete&r=' . $r);
        exit();
    }
    
    function doedit(){
        $nota = new Notas();
        $nota->read();
        $notapk = Request::read('id');
        $r = $this->getModel()->editNota($nota, $notapk);
        header('Location: index.php?ruta=usuario&accion=viewlist&op=edit&r=' . $r);
        exit();
    }
}