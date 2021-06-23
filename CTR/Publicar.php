<?php
session_start();
include('../DTO/Constantes.php');
include('../DTO/Usuario.php');
include('../DTO/Mensaje.php');
$usuario = new Usuario("Anonimo");
$mensaje = new Mensaje($usuario, null);
$_SESSION[KEY_ERROR] = $mensaje->setValor($_GET[KEY_MENSAJE]);
// Todos los mensajes que vaya a recibir publicar se van a guardar
// dentro de un array mágico y que se va a guardar dentro de la sesión como objeto
$array_mensajes = unserialize($_SESSION[KEY_MENSAJES]);
if($_SESSION[KEY_ERROR] === 0) {
    array_push($array_mensajes, serialize($mensaje));
    $_SESSION[KEY_MENSAJES] = serialize($array_mensajes);
}

header("Location: ../index.php");
//$mensajesLista = [];
//array_push($mensajesLista,$mensaje);
//
//for($i = 0; $i < sizeof($mensajesLista);$i++){
//    $m = &$mensajesLista[$i];
//    echo($m->id."</br>");
//    echo($m->valor);
//}