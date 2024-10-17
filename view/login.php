<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="view/styles.css">
</head>
<body>

    <div class="container">

        <div class="logo">
            <img src="view/assets/logo_unso.png" alt="Logo" width="400"> 
        </div>

        <!-- Notificación de mensaje -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="toast-container p-3">
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Notificación</strong>
                        <button type="button" class="btn-close" data-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <?= $_SESSION['message']; ?>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <!-- Formulario de login -->
        <div class="content">

            <form action="?action=login" method="post">
                <div class="form-group">
                    <input type="text" name="email" placeholder="Usuario">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-login">Iniciar sesión</button>
            </form>

            <a href="?action=forgotPassword" class="forgot-password">¿Olvidaste tu contraseña?</a>
            <a href="?action=register" class="btn btn-register mt-3">Crear cuenta</a>     
        </div>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
