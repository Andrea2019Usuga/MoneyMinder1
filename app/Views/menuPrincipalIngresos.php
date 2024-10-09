<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal Ingresos</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/menuPrincipalIngresos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/MoneyMinder/public/js/menuPrincipalIngresos.js" defer></script>
</head>
<body>

<?php
// Porción de código para guardar el nombre de usuario
if (isset($_SESSION['usuario_id'])) {
    $userid = $_SESSION['usuario_id'];
    $username = $_SESSION['nombre_usuario'];
}
?>

<header>
    <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo">
    
    <div class="user-profile">
        <div class="user-details">
            <span><?php echo htmlspecialchars($username); ?></span>
            <a href="/MoneyMinder/index.php/editarPerfil" class="add-button">Editar Perfil</a>
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

    <!-- Botón de Configuración -->
    <div class="configuracion-menu">
        <button class="menu-item">Configuración</button>

        <!-- Opciones de Configuración (inicialmente ocultas) -->
        <div class="config-options">
            <a href="/MoneyMinder/index.php/cambiarContrasena" class="menu-item">Cambiar contraseña</a>
            <a href="/MoneyMinder/index.php/eliminarCuenta" class="menu-item">Eliminar cuenta</a>
            <a href="/MoneyMinder/index.php/soporteYayuda" class="menu-item">Soporte y Ayuda</a>
        </div>
    </div>
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
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($ingresos)) { ?> <!-- Verificar si hay ingresos -->
                    <?php foreach ($ingresos as $ingreso): ?> <!-- Iterar sobre los ingresos -->
                        <tr>
                            <td><?= htmlspecialchars($ingreso['nombre']); ?></td>
                            <td><?= htmlspecialchars($ingreso['monto']); ?></td>
                            <td><?= htmlspecialchars($ingreso['fecha']); ?></td>
                            <td>
                                <a href="/MoneyMinder/index.php/editarIngreso?id=<?= $ingreso['id']; ?>" class="edit-button">✏️</a>
                                <form action="/MoneyMinder/index.php/editarIngreso" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $ingreso['id']; ?>">
                                    <button type="button" class="delete-button" onclick="confirmDelete(this)">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php } else { ?> <!-- Si no hay ingresos -->
                    <tr>
                        <td colspan="4">No hay ingresos registrados</td> <!-- Actualizar colspan -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>

<script>
function cerrarSesion() {
    window.location.href = 'http://localhost/MoneyMinder/index.php';
}

function confirmDelete(button) {
    const form = button.closest('form');
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no se puede deshacer.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire(
                'Eliminado!',
                'El ingreso ha sido eliminado.',
                'success'
            );
        }
    });
}
</script>

<footer>
    <p>© 2024 Money Minder</p>
</footer>
</body>
</html>
