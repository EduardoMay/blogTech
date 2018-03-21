<?php session_start();

include '../services/config.php';
include '../services/funciones.php';

session_destroy();

header('Location: '.RUTA.'index.html');