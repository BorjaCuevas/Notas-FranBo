<?php

class View {

    protected $modelo;

    function __construct(Model $modelo) {
        $this->modelo = $modelo;
    }

    function getModel() {
        return $this->modelo;
    }
//se guardan los datos que me da el modelo utilizando $this->getModel()->getData()
/*
    tenemos que meter 
    titulo
    subtitulo
    contenido
    plantilla tenemos que meternos en data
*/
    function render() {
        $plantilla = './Plantillas/materialize';+
        $this->getModel()->addData('plantilla', $plantilla);
        $archivos = $this->getModel()->getFiles();
        foreach($archivos as $placeholder => $archivo) {
            $this->getModel()->addData($placeholder, 
                Util::renderFile($plantilla . '/' . $archivo, $this->getModel()->getData()));
        }
        return Util::renderFile($plantilla . '/index.html', $this->getModel()->getData());
    }
    

}//materialize/css/estilo.css