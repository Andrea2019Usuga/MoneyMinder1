<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Meta de Ahorro</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/editarMetaAhorro.css">
   
</head>
<body>
    <main>
        <div class="form-container">
            <h1>Editar Meta de Ahorro</h1>
            <form action="/MoneyMinder/index.php/actualizarMetaAhorro" method="post">
                <?php if (isset($metaAhorro)): ?>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($metaAhorro['id']); ?>"> <!-- Campo oculto para el ID -->

                    <div class="form-group">
                        <label for="nombre">Nombre de la Meta de Ahorro:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($metaAhorro['nombre']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="monto_ahorrar">Monto a Ahorrar:</label>
                        <input type="number" id="monto_ahorrar" name="monto_ahorrar" value="<?php echo htmlspecialchars($metaAhorro['monto_ahorrar']); ?>" min="0" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="monto_actual">Monto Actual:</label>
                        <input type="number" id="monto_actual" name="monto_actual" value="<?php echo htmlspecialchars($metaAhorro['monto_actual']); ?>" min="0" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de Inicio:</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo htmlspecialchars($metaAhorro['fecha_inicio']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha_fin">Fecha de Fin:</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo htmlspecialchars($metaAhorro['fecha_fin']); ?>" required>
                    </div>

                    <button type="submit" class="submit-button">Guardar</button>
                <?php else: ?>
                    <p>No se encontró la meta de ahorro.</p>
                <?php endif; ?>
            </form>
        </div>
    </main>
    <footer>
        <p>© 2024 Money Minder.</p>
    </footer>
</body>
</html>
