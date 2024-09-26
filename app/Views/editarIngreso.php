<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ingreso</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/editarIngreso.css">
    <script src="js/8editar ingreso.js" defer></script>
</head>
<body>
    <main>
        <div class="form-container">
            <h1>Editar ingreso</h1>
            <form action="/MoneyMinder/index.php/actualizarIngreso" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($ingreso['id']); ?>"> <!-- Campo oculto para el ID -->

                <div class="form-group">
                    <label for="nombre">Nombre del Ingreso:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($ingreso['nombre']); ?>">
                </div>

                <div class="form-group">
                    <label for="monto">Monto:</label>
                    <input type="number" id="monto" name="monto" value="<?php echo htmlspecialchars($ingreso['monto']); ?>">
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($ingreso['fecha']); ?>">
                </div>

                <button type="submit" class="submit-button">Guardar</button>
            </form>
        </div>
    </main>
    <footer>
        <p>© 2024 Money Minder.</p>
    </footer>
</body>
</html>
