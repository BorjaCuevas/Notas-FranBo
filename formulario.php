<?php
require_once 'clases/AutoLoad.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>usuarios</title>
    </head>
    <body>
        
        <form action="index.php?ruta=usuario&accion=doinsert">
            
            <input type='hidden' name='ruta' value='usuario' />
            <input type='hidden' name='accion' value='doinsert' />
            <input type='email' name='email' required placeholder='correo electrónico' value="borjacuevas15@gmail.com" /><br/>
            <input type='password' name='password' placeholder='clave de acceso' value="kiko"/><br/>
            <input type='password' name='password2' placeholder='Repita la clave de acceso' value="kiko"/><br/>
            <input type='text' name='nombre' required placeholder='Introduzca su nombre' value="fran" /><br/>
            <input type='text' name='apellido' required placeholder='Introduzca sus apellidos' value="delgado gomez" /><br/>
            <input type='text' name='direccion' required placeholder='Introduzca su direccion' value="micasa" /><br/>
            <input type='text' name='movil' required placeholder='Introduzca su movil' value="689160200"/><br/>
            <input type='submit' value='alta' /><br/>
        </form>
    </body>
</html>