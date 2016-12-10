<?php

class ModelMedia extends Model {
    
     function getMedia($id){
        $gestor = new GestorMedia();
        return $gestor->get($id);
    }

    function insertMedia(Media $media){
        date_default_timezone_set('Europe/Madrid');
        $media->setFechaCreacion(date('Y-m-d'));
        $media->setVisible(1);
        if($media->getEstado() === 'alarma'){
            $media->setVisible(0);
        };
        $media->setIdgrupo(0);
        $gestor = new GestorMedia();
        $gestor->add($media);
    }
    
    function deleteMedia($id){
        $gestor=new GestorMedia();
        return $gestor->delete($id);
    }
    
     function editMedia(Media $media, $idpk){
        $gestor = new GestorMedia();
        return $gestor->saveMedia($media, $idpk);
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