<?php

class ControllerUsuario extends Controller {
    
    // function doactivar() {
    //     $email = Request::read('email');
    //     $iduser = Request::read('iduser');
    //     $r = $this->getModel()->activarUsuario($email, $iduser);
    //     if($r>0){
    //         header('Location: index.php?ruta=grupo&accion=createdefault&email=' . $email);
    //         $this->getModel()->addData('contenido', 'activación realizada correctamente, ya se puede autentificar');
    //     } else {
    //         $this->getModel()->addData('contenido', 'activación incorrecta, posiblemente ya estuviera activado');
    //     }
    //     header('Location: index.php');
    // }
    
    function doinsert() {
        $usuario = new Usuario();
        $grupo = new Grupos();
        $usuario->read();
        
        $usuarioBd = $this->getModel()->getUsuario($usuario->getEmail());
        $mensaje = 'https://proyecto-borja200.c9users.io/index.php?ruta=activar&accion=doactivar&email='
                . $usuario->getEmail() . '&iduser='. sha1($usuario->getEmail() . Constantes::SECRETO);
        $r = 0;
        $clave2 = Request::read('password2');
        if($usuario->isValid() && $usuario->getPassword() === $clave2 && $usuarioBd === 0){
            $r = $this->getModel()->insertUsuario($usuario);
            Util::enviarCorreo($usuario->getEmail(), 'Alta', $mensaje);
        }else{
            header('Location: index.php?op=insert&r=0');
            exit();
        }
        header('Location: index.php?op=insert&r=' . $r);
        exit();
    }
    
    function doedit() {
        $usuarioWeb = new Usuario();
        $usuarioWeb->read();
        $usuarioBd = $this->getModel()->getUsuario($usuarioWeb->getEmail());
        if($usuarioWeb->isValid() && Util::verificarClave($usuarioWeb->getPassword(), $usuarioBd->getPassword()) 
        && $usuarioWeb->getEmail() === $this->getSession()->getUser()->getEmail() && Request::read('newpassword1') === Request::read('newpassword2')){
            $usuarioWeb->setPassword(Request::read('newpassword1'));
            $r = $this->getModel()->editUsuario($usuarioWeb);
            $this->getSession()->setUser($usuarioWeb);
            header('Location: index.php?op=login&r=' . $r);
            exit();
        }else{
            header('Location: index.php?op=insert&r=0');
            exit();
        }
        $this->getSession()->destroy();
        header('Location: index.php?op=login&r=0');
        exit();
    }
    
   
    function deleteusuario($email){
        return $this->getModel()->deleteUsuario($email);
    }
    
    /*
    function doedit(){
        $usuario = new Usuario();
        $usuario->read();
        $emailpk = Request::read('emailpk');
        $r = $this->getModel()->editUsuario($usuario, $emailpk);
        header('Location: index.php?ruta=usuario&accion=viewlist&op=edit&r=' . $r);
        exit();
    }
    
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