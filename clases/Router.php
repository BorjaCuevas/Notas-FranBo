<?php

class Router {

    private $rutas = array();

    function __construct() {
        $this->rutas['index'] = new Route('Model', 'View', 'Controller');
        $this->rutas['nota'] = new Route('ModelNotas', 'View', 'ControllerNotas');
        $this->rutas['usuario'] = new Route('ModelUsuario', 'View', 'ControllerUsuario');
        $this->rutas['login'] = new Route('ModelLogin', 'View', 'ControllerLogin');
        $this->rutas['activar'] = new Route ('ModelActivar', 'View', 'ControllerActivar');
        $this->rutas['borrar'] = new Route ('ModelBorrar', 'View', 'ControllerBorrar');
        $this->rutas['grupo'] = new Route('ModelGrupos', 'View', 'ControllerGrupos');
        $this->rutas['grupousuario'] = new Route('ModelGruposUsuarios', 'View', 'ControllerGruposUsuarios');
        $this->rutas['gestiongrupogrupousuario'] = new Route ('ModelGestionGrupoGrupoUsuario', 'View', 'ControllerGestionGrupoGrupoUsuario');
        
    }

    function getRoute($ruta) {
        if (!isset($this->rutas[$ruta])) {
            return $this->rutas['index'];
        }
        return $this->rutas[$ruta];
    }

}