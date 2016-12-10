<?php

class ControllerMedia extends ControllerNotas {
    
    function doinsertmedia() {
        $nota = new Notas();
        $gestor = new GestorNotas();
        $nota->read();
        $r = $this->getModel()->insertNotas($nota);
        
        header('Location: index.php?op=insert&r=' . $r);
        exit();
    }
    
    function doinsertnomedia() {
        $nota = new Notas();
        $nota->read();
        
        self::doinsert($nota);
        $r = $this->getModel()->insertNotas($nota);
        
        header('Location: index.php?op=insert&r=' . $r);
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
    /*
    
    
    function doinsert() {
        $usuario = new Usuario();
        $usuario->read();
        if($usuario->isValid()){
            $r = $this->getModel()->insertUsuario($usuario);
            header('Location: index.php?ruta=usuario&accion=viewlist&op=insert&r=' . $r);
            exit();
        }else{
            $this->viewinsert($usuario);
        }
    }
    
    function viewedit(){
        $id = Request::read('email');
        $usuario = $this->getModel()->getUsuario($id);
        $email = $usuario->getEmail();
        
        $form = <<<ABC
        $error<br>
        <form action="index.php">
            <input type='text' value="$email" name='email' required placeholder='email' /><br/>
            <input type='password' name='password' placeholder='clave de acceso' /><br/>
            <input type='hidden' value="$email" name='emailpk'/><br/>
            <input type='hidden' name='ruta' value='usuario' />
            <input type='hidden' name='accion' value='doedit' />
            <input type='submit' value='edicion' /><br/>
        </form>
ABC;
        $this->getModel()->addData('form', $form);
    }
    
    function viewinsert(Usuario $usuario = null) {
        $error = "";
        if($usuario == null){
            $usuario = new Usuario();
        }else{
            $error = "Ha habido un error";
        }
        $email = $usuario->getEmail();
        
        $form = <<<ABC
        $error<br>
        <form action="index.php">
            <input type='email' name='email' value='$email' required placeholder='correo electrónico' /><br/>
            <input type='password' name='password' placeholder='clave de acceso' /><br/>
            <input type='hidden' name='ruta' value='usuario' />
            <input type='hidden' name='accion' value='doinsert' />
            <input type='submit' value='alta' /><br/>
        </form>
ABC;
        $this->getModel()->addData('form', $form);
    }
    
    function viewlist(){
        $lista = $this->getModel()->getList();
        $datoFinal = <<<DEF
        <script>
        var confirmarBorrar = function(evento) {
            var objeto = evento.target;
            var r = confirm('Borrar?');
            if (r) {
            } else {
                evento.preventDefault();
            }
        }
        var a = document.getElementsByClassName('borrar');
        for (var i = 0; i < a.length; i++) {
            a[i].addEventListener('click', confirmarBorrar, false);
        }
        </script>
DEF;
        $dato = '';
        foreach($lista as $usuario) {
            $dato .= $usuario;
            $dato .= '<a class="borrar" href="index.php?ruta=usuario&accion=dodelete&email=' . $usuario->getEmail() . '">borrar este Usuario</a> ';
            $dato .= '<a href="index.php?ruta=usuario&accion=viewedit&email=' . $usuario->getEmail() . '">editar este Usuario</a>';
            $dato .= '<br>';
        }
        $dato .= $datoFinal;
        $dato .= '<a href="index.php?ruta=usuario&accion=viewinsert" > Insertar</a>';
        $this->getModel()->addData('lista', $dato);
    }*/
}