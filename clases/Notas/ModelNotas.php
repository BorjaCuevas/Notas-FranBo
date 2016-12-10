<?php

class ModelNotas extends Model {
    
     function getNotas($id){
        $gestor = new GestorNotas();
        return $gestor->getList($id);
    }
    

    function insertNotas(Notas $nota){
        date_default_timezone_set('Europe/Madrid');
        $nota->setFechaCreacion(date('Y-m-d'));
        $nota->setVisible(1);
        if($nota->getEstado() === 'alarma'){
            $nota->setVisible(0);
        };
        $gestor = new GestorNotas();
        return $gestor->add($nota);
    }
    
    function deleteNotas($id){
        $gestor=new GestorNotas();
        return $gestor->delete($id);
    }
    
     function editNota(Notas $nota, $idpk){
        $gestor = new GestorNotas();
        return $gestor->saveNota($nota, $idpk);
    }
    /*
    function getList(){
        $gestor = new GestorUsuario();
        return $gestor->getList();
    }
    
    
    
    function getUsuario($email){
        $gestor = new GestorUsuario();
        return $gestor->get($email);
    }
    
   */
}