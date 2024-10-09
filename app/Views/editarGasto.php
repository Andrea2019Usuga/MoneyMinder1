<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gasto</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/editarGasto.css">
</head>
<body>
    <main>
        <div class="form-container">
            <h1>Editar Gasto</h1>
            <form action="/MoneyMinder/index.php/actualizarGasto" method="post">
                <?php if (isset($gasto)): ?>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($gasto['id']); ?>">

                    <div class="form-group">
                        <label for="nombre">Nombre del Gasto:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($gasto['nombre']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="monto">Monto:</label>
                        <input type="number" id="monto" name="monto" value="<?php echo htmlspecialchars($gasto['monto']); ?>" min="0" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($gasto['fecha']); ?>" required>
                    </div>

                    <button type="submit" class="submit-button">Guardar</button>
                <?php else: ?>
                    <p>No se encontró el gasto.</p>
                <?php endif; ?>
            </form>
        </div>
    </main>
    <footer>
        <p>© 2024 Money Minder.</p>
    </footer>
</body>
</html>
