<?php

// Llaves de accesos a variables globales
const KEY_MENSAJE = "mensaje";
const KEY_ERROR = "error";
// Variables de mensajes de error
const ERROR_MESSAGE_0 = "El comentario no puede ir vacio. Intente nuevamente.";

// Imprime un alert en javascript
const ALERT_0 = "<script>alert('";
const ALERT_1 = "');</script>";
function printAlert($m){
    echo(ALERT_0.$m.ALERT_1);
}