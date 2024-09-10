<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Ingreso</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/agregarIngreso.css">
    <script src="js/7agregar ingreso.js" defer></script>
</head>
<body>
    <main>
        <div class="form-container">
            <h1>Agregar ingreso</h1>
            <form action="/MoneyMinder/index.php/agregarIngreso" method="post">
                <div class="form-group">
                    <label for="nombre-ingreso">Nombre Ingreso</label>
                    <input type="text" id="nombre-ingreso" name="nombre_ingreso" required>
                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="number" id="monto" name="monto" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <div class="date-inputs">
                        <input type="number" id="dia" name="dia" placeholder="Día" min="1" max="31" required>
                        <input type="number" id="mes" name="mes" placeholder="Mes" min="1" max="12" required>
                        <input type="number" id="año" name="año" placeholder="Año" required>
                    </div>
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