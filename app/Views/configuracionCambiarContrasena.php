<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Configuración cambiar contraseña</title>
<link rel="stylesheet" href="/MoneyMinder/public/css/configuracionCambiarContrasena.css">
<script src="/MoneyMinder/public/js/configuracionCambiarContrasena.js"></script>
</head>


<body>
    <header>
    <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo">
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
                    <a href="/MoneyMinder/index.php/configuracionCambiarContrasena" class="menu-item selected">Cambiar contraseña</a>
                    <a href="/MoneyMinder/index.php/eliminarCuenta" class="menu-item">Eliminar Cuenta</a>
                    <a href="/MoneyMinder/index.php/preguntasFrecuentes" class="menu-item">Preguntas frecuentes</a>
                </div>
            </div>
        </aside>
        <section class="content">
            <h2>Cambiar Contraseña</h2>
            <form action="2Inicio sesion.html">
                <div class="form-group">
                    <label for="new-password">Contraseña actual</label>
                    <input type="password" id="new-password" name="new-password">
                    <small>La contraseña debe contener mínimo 8 caracteres</small>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Contraseña nueva</label>
                    <input type="password" id="confirm-password" name="confirm-password">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirmar Contraseña nueva</label>
                    <input type="password" id="confirm-password" name="confirm-password">
                </div>
                <div id="button-container">
                    <button type="submit" class="update-button">Actualizar</button>
                  </div>
            </form>
        </section>
    </main>
</body>
</html>
