<?php
session_start();
include('../DTO/Constantes.php');
include('../DTO/Usuario.php');
include('../DTO/Mensaje.php');
$usuario = new Usuario("Anonimo");
$mensaje = new Mensaje($usuario, null);
$_SESSION[KEY_ERROR] = $mensaje->setValor($_GET[KEY_MENSAJE]);

header("Location: ../index.php?".KEY_MENSAJE."=".$mensaje->valor);
//$mensajesLista = [];
//array_push($mensajesLista,$mensaje);
//
//for($i = 0; $i < sizeof($mensajesLista);$i++){
//    $m = &$mensajesLista[$i];
//    echo($m->id."</br>");
//    echo($m->valor);
//}