<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Configuración</title>
<link rel="stylesheet" href="/MoneyMinder/public/css/configuracion.css">
<script src="/MoneyMinder/public/js/configuracion.js" defer></script>
</head>


<body>
    <header>
        <img src="img/logo.jpeg" alt="Money Minder Logo" class="logo">
    </header>
    <main>
        <aside class="sidebar">
            <button class="menu-item selected no-pointer">Menú principal</button>
            <a href="6menu principal ingresos.html" class="menu-item">Ingresos</a>
            <a href="9gastos.html" class="menu-item">Gastos</a>
            <a href="12metas de ahorro.html" class="menu-item">Metas de ahorro</a>
            <a href="15tips de ahorro.html" class="menu-item">Tips de ahorro</a>
            <a href="configuracion.html" class="menu-item">Configuración</a>

            
            <div class="dropdown">
    <button class="menu-item selected dropdown-toggle" onclick="toggleDropdown()">Configuración</button>
    <div class="dropdown-content">
        <a href="index.php?controller=user&action=cambiarContrasena" class="menu-item">Cambiar contraseña</a>
        <a href="index.php?controller=user&action=eliminarCuenta" class="menu-item">Eliminar Cuenta</a>
        <a href="index.php?controller=support&action=soporteYayuda" class="menu-item">Soporte y ayuda</a>
    </div>
        </aside>
        <section class="content">
            <div class="language-container">
                <div class="language-section">
                    <h2>Idioma</h2>
                    <div class="language-option">
                        <input type="radio" id="spanish" name="language" value="es" checked>
                        <label for="spanish">Español</label>
                    </div>
                    <div class="language-option">
                        <input type="radio" id="english" name="language" value="en" checked>
                        <label for="english">Inglés</label>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
