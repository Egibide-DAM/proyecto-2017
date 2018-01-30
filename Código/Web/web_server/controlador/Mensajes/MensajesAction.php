<?php
/**
 * Created by PhpStorm.
 * User: 9fdam03
 * Date: 25/01/2018
 * Time: 19:52
 */


include_once __DIR__.'/../../modelo/Mensajes/dal_mensaje.php';

class MensajesAction
{

    public static function findAllMensajes ()
    {

        $dal_mensaje = new dal_mensaje();

        return $dal_mensaje->getAllMensajes();

    }

}