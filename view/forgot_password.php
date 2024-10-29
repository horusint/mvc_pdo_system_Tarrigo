<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'controller/csrf_token.php';

$csrf_token = (new csrf_check())->generate_csrf_token();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="view/styles.css">
</head>
<body>   
    <div class="container">
        <div class="logo">
            <img src="view/assets/logo_unso.png" alt="Logo" width="400"> 
        </div>
        <div class="content">
            <form method="POST" action="?action=forgotPassword">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                <button type="submit" class="btn-recovery">Enviar mail de recuperación</button>
                <?php if (isset($error)): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
            </form>
            <a href="index.php" class="return-link">Regresar a la página principal</a>
        </div>
    </div>
    <script src="view/main.js" defer></script>
</body>
</html>
