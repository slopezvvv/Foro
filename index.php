<?php
session_start(); // SI VAN A UTILIZAR SESIONES, COPIEN Y PEGUEN ESTA INSTRUCCION EN TODAS LAS PÁGINAS HTML
include("DTO/Constantes.php");
if(!isset($_SESSION[KEY_ERROR]))$_SESSION[KEY_ERROR]=0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Foro de consultas</title>
        <style>
            *{margin:0;padding:0;}
            #comentarios textarea{
                resize: none;
                width:320px;
                height:80px;
            }
            #comentarios input[type="submit"]{
                width:100px;
                height:40px;
                cursor:pointer;
            }
            
        </style>
    </head>
    <body>
        <?php
            if($_SESSION[KEY_ERROR] < 0){
                switch($_SESSION[KEY_ERROR]){
                    case -1:
                        printAlert(ERROR_MESSAGE_0);
                        break;
                    default:
                        break;
                }
            }
            else if(isset($_GET[KEY_MENSAJE])) echo($_GET[KEY_MENSAJE]);
        ?>
        <form id="comentarios" action="CTR/Publicar.php" method="GET">
            <textarea name="<?php echo(KEY_MENSAJE); ?>" placeholder="Escriba un comentario"></textarea><br>
            <input type="submit" value="Publicar"/>
        </form>
    </body>
</html>
