<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cuenta</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/eliminarCuenta.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/MoneyMinder/public/js/eliminarCuenta.js"defer></script>
</head>
<body>
    <header>
        <img src="img/logo.jpeg" alt="Money Minder Logo" class="logo">
    </header>
    <main>
        <aside class="sidebar">
            <button class="menu-item selected no-pointer">Menú principal</button>
            <a href="/MoneyMinder/index.php/menuPrincipalIngresos" class="menu-item">Ingresos</a>
            <a href="/MoneyMinder/index.php/gastos" class="menu-item">Gastos</a>
            <a href="/MoneyMinder/index.php/metasDeAhorro" class="menu-item">Metas de ahorro</a>
            <a href="/MoneyMinder/index.php/tipsAhorro" class="menu-item">Tips de ahorro</a>
            <div class="dropdown">
                <button class="menu-item selected dropdown-toggle" onclick="toggleDropdown()">Configuración</button>
                <div class="dropdown-content">
                    <a href="/MoneyMinder/index.php/configuracionCambiarContrasena" class="menu-item">Cambiar contraseña</a>
                    <a href="/MoneyMinder/index.php/eliminarCuenta" class="menu-item selected">Eliminar Cuenta</a>
                    <a href="/MoneyMinder/index.php/preguntasFrecuentes" class="menu-item">Preguntas frecuentes</a>
                </div>
            </div>
        </aside>
        <section class="content">
            <h1>Eliminar Cuenta</h1>
            <div class="delete-container">
                <p>¿Estás seguro de que deseas eliminar tu cuenta? Esta acción es irreversible.</p>
                <form action="/MoneyMinder/index.php/eliminarCuentaConfirm" method="POST">
                    <div class="buttons">
                        <button type="submit" name="confirmar" value="no" class="btn no">No</button>
                        <button type="submit" name="confirmar" value="si" class="btn yes">Sí</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
