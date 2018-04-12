<?php
    #DIRECCION DE LA PAGINA
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        define('RUTA','http://localhost/blog/');
    } elseif ($_SERVER['HTTP_HOST'] == '192.168.1.71') {
        define('RUTA','http://192.168.1.71/blog/');
    } elseif ($_SERVER['HTTP_HOST'] == '192.168.13.22') {
        define('RUTA','http://192.168.13.22/blog/');
    }

    // CONSTANTES
    define("BACK", "<script>javascript:history.back()</script>");

    $bd_config = [
        'db_name' => 'blog',
        'user' => 'root',
        'pass' => ''
    ];