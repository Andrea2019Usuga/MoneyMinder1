<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal Ingresos</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/6menu principal ingresos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/MoneyMinder/public/js/menuPrincipalIngresos.js"></script>
</head>
<body>
    <header>
        <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo">
        
        <div class="user-profile">
            <span class="user-initials">NN</span>
            <div class="user-details">
                <span>Nombre Completo Usuario</span>
                <button onclick="window.location.href='16Editar perfil.html'">Editar Perfil</button>
                <button type="button" onclick="cerrarSesion()">Cerrar Sesión</button>
            </div>
        </div>
    </header>
    <main>
        <aside class="sidebar">
            <button class="menu-item selected no-pointer">Menú principal</button>
            <a href="6menu principal ingresos.html" class="menu-item selected">Ingresos</a>
            <a href="9gastos.html" class="menu-item">Gastos</a>
            <a href="12metas de ahorro.html" class="menu-item">Metas de ahorro</a>
            <a href="15tips de ahorro.html" class="menu-item">Tips de ahorro</a>
            <a href="18configuracion idioma.html" class="menu-item">Configuración</a>
        </aside>
        <section class="content">
            <h1>Ingresos</h1>
            <div class="search-bar">
                <input type="text" placeholder="Buscar" class="search-input">
                <a href="/MoneyMinder/index.php/agregarIngreso" class="add-button">Agregar ingreso</a>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($ingresos) && is_array($ingresos)): ?>
                        <?php foreach ($ingresos as $ingreso): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($ingreso['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($ingreso['monto']); ?></td>
                                <td><?php echo htmlspecialchars($ingreso['fecha']); ?></td>
                                <td>
                                    <button class='edit-button' onclick="location.href='/MoneyMinder/index.php?action=editarIngreso&id=<?php echo $ingreso['id']; ?>'">✏️</button>
                                    <button class='delete-button' onclick="location.href='/MoneyMinder/index.php?action=eliminarIngreso&id=<?php echo $ingreso['id']; ?>'">🗑️</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No hay ingresos disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>

    <script>
    function cerrarSesion() {
        window.location.href = 'http://localhost/MoneyMinder/index.php';
    }
    </script>

    <footer>
        <p>© 2024 Money Minder</p>
    </footer>
</body>
</html>
