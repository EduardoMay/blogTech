<?php

require 'config/config.php';
require 'funciones/funciones.php';

session_destroy();

header('Location: '.RUTA.'index.html');