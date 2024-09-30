<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Gasto</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/agregarGasto.css">
    <script src="/MoneyMinder/index.php/prueba"></script>
    <script src="/MoneyMinder/public/js/agregarGasto.js"></script>
</head>
<body>
    <main>
        <div class="form-container">
            <h1>Agregar Gasto</h1>
            <!-- Cambiamos el action para que apunte a la ruta del controlador correspondiente -->
            <form action="/MoneyMinder/index.php/guardarGasto" method="post">

                <div class="form-group">
                    <label for="nombre-ingreso">Nombre Gasto</label>
                    <input type="text" id="nombre-gasto" name="nombre-gasto" required>
                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="number" id="monto" name="monto" value="<?php echo htmlspecialchars($gasto['monto']); ?>" min="0" step="0.01" required>
                    <small>Ingrese el monto (número general, sin formato especial).</small>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <div class="date-inputs">
                        <input type="number" id="dia" name="dia" placeholder="Día" min="1" max="31" required>
                        <input type="number" id="mes" name="mes" placeholder="Mes" min="1" max="12" required>
                        <input type="number" id="año" name="año" placeholder="Año" required>
                    </div>
              </div>
               <!-- Cambiamos el enlace "Guardar" por un botón de tipo submit -->
               <button type="submit" class="submit-button">Guardar</button>
            </form>
        </div>
    </main>
    <footer>
        <p>© 2024 Money Minder.</p>
    </footer>
</body>
</html>