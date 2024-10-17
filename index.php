<?php
// Iniciar sesión
session_start();

require 'controller/controller.php';

$controller = new Controller();   
    // Manejar la solicitud y mostrar la vista correspondiente
    $controller->handleRequest();
?>
