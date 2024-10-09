<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cuenta</title>
    <link rel="stylesheet" href="css/21eliminar cuenta.css">
    <script src="js/21eliminar cuenta.js" defer></script>
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
            <a href="configuracion.php" class="menu-item">Configuración</a>
           <!-- El menú que aparece en la vista -->
<div class="dropdown">
    <button class="menu-item selected dropdown-toggle" onclick="toggleDropdown()">Configuración</button>
    <div class="dropdown-content">
        <a href="index.php?controller=user&action=cambiarContrasena" class="menu-item">Cambiar contraseña</a>
        <a href="index.php?controller=user&action=eliminarCuenta" class="menu-item">Eliminar Cuenta</a>
        <a href="index.php?controller=support&action=soporteYayuda" class="menu-item">Soporte y ayuda</a>
    </div>
</div>

        </aside>
        <section class="content">
            <h1>Eliminar Cuenta</h1>
            <div class="delete-container">
                <p>Quieres eliminar tu cuenta</p>
                <div class="buttons">
                    <a href="21eliminar cuenta.html" class="btn no">No</a>
                    <a href="22notificación eliminar cuenta.html" class="btn yes">Sí</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
