<?php
    #DIRECCION DE LA PAGINA
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        define('RUTA','http://localhost/blog/');
    } elseif ($_SERVER['HTTP_HOST'] == '192.168.1.71') {
        define('RUTA','http://192.168.1.71/blog/');
    }

    $bd_config = [
        'db_name' => 'blog',
        'user' => 'root',
        'pass' => ''
    ];