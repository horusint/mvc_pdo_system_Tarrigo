<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="view/styles.css">
</head>
<body class="container my-4">
    <h1 class="text-center mb-4">Crear Usuario</h1>

    <form method="POST" action="?action=create" class="row g-3">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="col-md-6">
            <label for="rol" class="form-label">Rol:</label>
            <select class="form-select" id="rol" name="rol_id" required>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?= $rol['id'] ?>"><?= $rol['rol_nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-success">Crear</button>
            <a href="?" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</body>
</html>
