<?php
session_start(); // SI VAN A UTILIZAR SESIONES, COPIEN Y PEGUEN ESTA INSTRUCCION EN TODAS LAS PÁGINAS HTML
include("DTO/Constantes.php");
include("DTO/Mensaje.php");
include("DTO/Usuario.php");
if(!isset($_SESSION[KEY_ERROR]))$_SESSION[KEY_ERROR]=0;
if(!isset($_SESSION[KEY_MENSAJES])) $_SESSION[KEY_MENSAJES] = serialize([]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Foro de consultas</title>
        <style>
            *{margin:0;padding:0;}
            body{
                width: 80%;
                position:relative;
                margin-left:auto;
                margin-right:auto;
                left:0;
                right:0;
            }
            #formulario_comentario textarea{
                resize: none;
                width:320px;
                height:80px;
            }
            #formulario_comentario input[type="submit"]{
                width:100px;
                height:40px;
                cursor:pointer;
            }
            .comentario, #formulario_comentario{
                width: 45%;
                margin: 35px 0px 35px 10px;
            }
            .comentario img{
                width:64px;
                height:64px;
                border-radius:100%;
                border: 2.5px solid #0099ee;
            }
            .comentario p{
                border: 2.5px solid #eeeeee;
            }
            .comentario, .comentario p{
                min-height:50px;
            }
            
        </style>
    </head>
    <body>
        <p>¿Qué te parece la palta?</p>
        <form id="formulario_comentario" action="CTR/Publicar.php" method="GET">
            <textarea name="<?php echo(KEY_MENSAJE); ?>" placeholder="Escriba un comentario"></textarea><br>
            <input type="submit" value="Publicar"/>
        </form>
        <?php
            $array_mensajes = unserialize($_SESSION[KEY_MENSAJES]);
            if($_SESSION[KEY_ERROR] < 0){
                switch($_SESSION[KEY_ERROR]){
                    case -1:
                        printAlert(ERROR_MESSAGE_0);
                        break;
                    default:
                        break;
                }
                $_SESSION[KEY_ERROR] = 0;
            }
            else {
                //var_dump($array_mensajes);
                //foreach($array_mensajes as $array_magico => $mensaje){
                for($i = sizeof($array_mensajes);$i--;){
                    $mensaje= unserialize($array_mensajes[$i]);
                    $usuario = unserialize($mensaje->usuario);
                    ?>
                    <div class="comentario">
                        <img src="<?php echo("img/profiles/".$usuario->nick.".png");?>" />
                        <u><?php echo($usuario->nick." dice:"); ?></u>
                        <p><?php echo($mensaje->valor);?></p>
                    </div>
                    <?php
                }
            }
        ?>
        
    </body>
</html>
