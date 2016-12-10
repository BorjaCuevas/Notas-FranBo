<?php
require "clases/AutoLoad.php"

$sesion = new Session("login");

?>
<form action="index.php?ruta='login'&accion='dologin'">
    <input type='hidden' name='ruta' value='login' />
    <input type='hidden' name='accion' value='dologin' />
    <label>Correo:</label>
    <input type="text" name="correo"/>
    <br>
    <label>Contraseña</label>
    <input type="text" name="pass"/>
    <br>
    <input type="submit" name="enviar" value="Logear"/>
</form>