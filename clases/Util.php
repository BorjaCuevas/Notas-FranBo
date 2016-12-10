<?php

class Util {
    
    static function encriptar($cadena, $coste = 10) {
        $opciones = array(
            'cost' => $coste
        );
        return password_hash($cadena, PASSWORD_DEFAULT, $opciones);
    }

    static function renderFile($file, $data) {
        if (!file_exists($file)) {
            echo 'Error: ' . $file . '<br>';
            return '';
        }
        $contenido = file_get_contents($file);
        return self::renderText($contenido, $data);
    }

    static function renderText($text, $data) {
        foreach ($data as $indice => $dato) {
            $text = str_replace('{' . $indice . '}', $dato, $text);
        }
        return $text;
    }
    
    static function verificarClave($claveSinEncriptar, $claveEncriptada){
        return password_verify($claveSinEncriptar, $claveEncriptada);
    }
    static function enviarCorreo ($destino, $asunto, $mensaje){
        require_once 'clases/vendor/autoload.php';
        
        $cliente = new Google_Client();
        $cliente->setApplicationName('Cliente web 1');
        $cliente->setClientId('988580451283-a8dsi3b3f1sk377ohk5is7tgpp4kb8kb.apps.googleusercontent.com');
        $cliente->setClientSecret('5zjaElzDDAdT8MAo2JGoDlQN');
        $cliente->setAccessToken(file_get_contents('Credenciales/token.conf'));
        if ($cliente->getAccessToken()) {
            $service = new Google_Service_Gmail($cliente);
            try {
                $mail = new PHPMailer();
                $mail->CharSet = "UTF-8";
                $mail->From = Constantes::CORREO;
                $mail->FromName = Constantes::ALIAS;
                $mail->AddAddress($destino);
                $mail->AddReplyTo(Constantes::CORREO, Constantes::ALIAS);
                $mail->Subject = $asunto;
                $mail->Body = $mensaje;
                $mail->preSend();
                $mime = $mail->getSentMIMEMessage();
                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
                $mensaje = new Google_Service_Gmail_Message();
                $mensaje->setRaw($mime);
                $service->users_messages->send('me', $mensaje);
                return true;
            } catch (Exception $e) {
                var_dump($e);
                return $e;
            }
        } else {
            var_dump('Token');
            return 'token';
        }
    }
}


