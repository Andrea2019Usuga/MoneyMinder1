<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gasto</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/editarGasto.css">
    <script src="js/11editar gasto.js" defer></script>
</head>
<body>
    <main>
        <div class="form-container">
            <h1>Editar Gasto</h1>
            <form action="/MoneyMinder/index.php/actualizarGasto" method="post">
             <input type="hidden" name="id" value="<?php echo htmlspecialchars($gasto['id']); ?>"> <!-- Campo oculto para el ID -->

                 <div class="form-group">
                  <label for="nombre">Nombre del Gasto:</label>
                  <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($gasto['nombre']); ?>">
                </div>

               <div class="form-group">
                  <label for="monto">Monto:</label>
                 <input type="number" id="monto" name="monto" value="<?php echo htmlspecialchars($gasto['monto']); ?>" min="0" step="0.01" required>
                 <small>Ingrese el monto (número general, sin formato especial).</small>
                </div>

               <div class="form-group">
                 <label for="fecha">Fecha:</label>
                 <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($gasto['fecha']); ?>">
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