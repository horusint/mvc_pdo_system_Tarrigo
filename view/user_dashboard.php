<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header('Location: index.php?action=login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus UNSO</title>
    <link rel="stylesheet" href="dashboard_styles.css">
</head>
<body class="user-dashboard">
    <header>
        <div class="content">
            <div class="menu container">
                <a href="#" class="logo">
                    <img src="assets/logo_unso.png" alt="Logo UNSO">
                </a>
                <input type="checkbox" id="menu">
                <label for="menu">
                    <img src="assets/menu.png" class="menu-icon" alt="">
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="user_dashboard.php">Materias</a></li>
                        <li><a href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="container2">
        <div class="card">
            <img src="assets/materia_1.png" alt="Imagen 1">
            <h2>Infraestructuras críticas</h2>
        </div>
        <div class="card">
            <img src="assets/materia_2.png" alt="Imagen 2">
            <h2>Seguridad Ofensiva</h2>
        </div>
        <div class="card">
            <img src="assets/materia_3.png" alt="Imagen 3">
            <h2>Ciberdelitos</h2>
        </div>
        <div class="card">
            <img src="assets/materia_4.png" alt="Imagen 4">
            <h2>Auditorias y marcos normativos</h2>
        </div>
    </div>
</body>
</html>