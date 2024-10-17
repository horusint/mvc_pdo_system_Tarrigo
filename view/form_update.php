<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="view/styles.css">
</head>
<body class="container my-4">
    <h1 class="text-center mb-4">Actualizar Usuario</h1>

    <form method="POST" action="?action=update&id=<?= $user['id'] ?>" class="row g-3">
        <!-- ID del Usuario (deshabilitado) -->
        <div class="col-md-6">
            <label for="id" class="form-label">ID del Usuario:</label>
            <input type="number" class="form-control" id="id" value="<?= $user['id'] ?>" disabled>
            <input type="hidden" name="id" value="<?= $user['id'] ?>"> <!-- Campo oculto para enviar el ID -->
        </div>

        <!-- Nombre del Usuario (editable) -->
        <div class="col-md-6">
            <label for="nuevoNombre" class="form-label">Nuevo Nombre:</label>
            <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" value="<?= $user['nombre'] ?>" required>
        </div>

        <!-- Email del Usuario (editable) -->
        <div class="col-md-6">
            <label for="email" class="form-label">Nuevo Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
        </div>

        <!-- Rol del Usuario (editable con select) -->
        <div class="col-md-6">
            <label for="rol" class="form-label">Rol Actual:</label>
            <select class="form-select" id="rol" name="rol_id" required>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?= $rol['id'] ?>" <?= $user['rol_id'] == $rol['id'] ? 'selected' : '' ?>>
                        <?= $rol['rol_nombre'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Botón para actualizar -->
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="?" class="btn btn-secondary">Volver</a>
        </div>
    </form>

</body>
</html>
