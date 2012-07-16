<?php
function autoloader($nombre_clase) {
    $ruta = str_replace('_', '/', $nombre_clase);

    require_once $ruta . '.php';
}

spl_autoload_register('autoloader');