<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar meta de ahorro</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/agregarMetaAhorro.css">
    <script src="/MoneyMinder/public/js/agregarMetaAhorro.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <main>
        <div class="form-container">
            <h1>Agregar meta de ahorro</h1>
            <form action="/MoneyMinder/index.php/guardarMetaAhorro" method="post">
                <div class="form-group">
                    <label for="nombre-meta">Nombre meta de ahorro</label>
                    <input type="text" id="nombre-meta" name="nombre-meta" required>
                </div>
                <div class="form-group">
                    <label for="monto-ahorrar">Monto a ahorrar</label>
                    <input type="number" id="monto-ahorrar" name="monto-ahorrar" required>
                </div>
                <div class="form-group">
                    <label for="monto-actual">Monto actual</label>
                    <input type="number" id="monto-actual" name="monto-actual" required>
                </div>
                <div class="form-group">
                    <label for="fecha-inicio">Fecha de inicio</label>
                    <div class="date-inputs">
                        <input type="number" id="dia-inicio" name="dia-inicio" placeholder="Día" min="1" max="31" required>
                        <input type="number" id="mes-inicio" name="mes-inicio" placeholder="Mes" min="1" max="12" required>
                        <input type="number" id="año-inicio" name="año-inicio" placeholder="Año" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha-fin">Fecha de fin</label>
                    <div class="date-inputs">
                        <input type="number" id="dia-fin" name="dia-fin" placeholder="Día" min="1" max="31" required>
                        <input type="number" id="mes-fin" name="mes-fin" placeholder="Mes" min="1" max="12" required>
                        <input type="number" id="año-fin" name="año-fin" placeholder="Año" required>
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
