<?php
session_start();
require_once '../clases/vendor/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('notausuario');
$cliente->setClientId('988580451283-a8dsi3b3f1sk377ohk5is7tgpp4kb8kb.apps.googleusercontent.com');
$cliente->setClientSecret('5zjaElzDDAdT8MAo2JGoDlQN');
$cliente->setRedirectUri('https://proyecto-borja200.c9users.io/Credenciales/GuardarCredenciales.php');
$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
$cliente->setAccessType('offline');
if (!$cliente->getAccessToken()) {
   $auth = $cliente->createAuthUrl();
   header("Location: $auth");
}
