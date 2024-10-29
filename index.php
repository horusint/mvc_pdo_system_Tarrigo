<?php
session_start();

// Carga el archivo de seguridad, lo instancia y establece encabezados para iniciar una sesión segura
require_once 'headers.php';  
$security = new Security();
$security->setSecurityHeaders();
$security->secureSessionStart();

require 'controller/controller.php';

$controller = new Controller();   
$controller->handleRequest();
?>
