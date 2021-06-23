<?php
class Mensaje{
    function __construct($usuario,$id) {
        $this->usuario=serialize($usuario); // Esto es una instancia de usuario
        $this->id= isset($id) ? $id : time(); // Si el id existe, entonces usa ID, sino, usa el EPOCH
        //setValor($valor); // valor del mensaje en tipo String
        $this->valor="";
    }
    function setValor($valor){
        if (isset($valor)) {
            if ($valor !== "") {
                $this->valor = $valor;
                return 0;
            }
        }
        return -1;
    }
}