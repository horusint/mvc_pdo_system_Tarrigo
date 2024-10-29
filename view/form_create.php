<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="view/styles.css">
</head>
<body>
    <script src="view/main.js" defer></script>
    <div class="container">
        <div class="logo">
            <img src="view/assets/logo_unso.png" alt="Logo" width="400"> 
        </div>

        <div class="form-wrapper">
            <a href="index.php">
                <img src="view/assets/cerrar.png" class="close-btn" alt="Cerrar" width="10">
            </a>
            <div class="content">
                <!-- Agregar un formulario con validaciones -->
                <form method="POST" action="?action=register" class="form-container">
                    <div class="form-group">
                        <input type="text" id="dni" name="dni" placeholder="DNI" pattern="\d+" title="Ingrese solo números" required>
                    </div>

                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                    </div>

                    <div class="form-group">
                        <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
                    </div>

                    <div class="form-group">
                        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>
                    </div>

                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Contraseña" required>
                    </div>

                    <div class="form-group">
                        <input type="password" id="repeat_password" name="repeat_password" placeholder="Repetir Contraseña" required>
                    </div>

                    <?php if (isset($error)): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-register">Crear Cuenta</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
