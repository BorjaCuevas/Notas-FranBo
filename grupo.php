<?php
require_once 'clases/AutoLoad.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>notas</title>
    </head>
    <body>
        
        <form action="index.php?ruta=grupo&accion=doinsert">
            
            <input type='hidden' name='ruta' value='grupo' />
            <input type='hidden' name='accion' value='doinsert' />
            <input type='text' name='nombre' value="prueba" /><br/>
            <input type="radio" name="tipo" value="privado" checked/>
            <input type='submit' value='crear' /><br/>
        </form>
    </body>
</html>