<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="view/styles.css">
</head>
<body class="container my-4">
    <h1 class="text-center mb-4">Recuperar Contraseña</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" action="?action=forgotPassword" class="row g-3">
        <div class="col-md-12">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Enviar enlace de recuperación</button>
        </div>

        <div class="col-12 text-center">
            <a href="index.php">Volver al inicio de sesión</a>
        </div>
    </form>
</body>
</html>
