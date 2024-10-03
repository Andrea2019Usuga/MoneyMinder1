<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metas de Ahorro</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/metasDeAhorro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/MoneyMinder/public/js/metasDeAhorro.js" defer></script>


</head>
<body>

<?php
if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $username = $_SESSION['nombre_usuario'];
}
?>

<header>
    <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo">
    <div class="user-profile">
        <div class="user-details">
            <span><?php echo htmlspecialchars($username); ?></span>
            <button onclick="window.location.href='/MoneyMinder/index.php/editarPerfil'">Editar Perfil</button>
            <button type="button" onclick="cerrarSesion()">Cerrar Sesión</button>
        </div>
    </div>
</header>

<main>
    <aside class="sidebar">
        <button class="menu-item selected no-pointer">Menú principal</button>
        <a href="/MoneyMinder/index.php/menuPrincipalIngresos" class="menu-item">Ingresos</a>
        <a href="/MoneyMinder/index.php/gastos" class="menu-item">Gastos</a>
        <a href="/MoneyMinder/index.php/metasDeAhorro" class="menu-item selected">Metas de Ahorro</a>
        <a href="/MoneyMinder/index.php/tipsAhorro" class="menu-item">Tips de Ahorro</a>
        <a href="/MoneyMinder/index.php/configuracion" class="menu-item">Configuración</a>
    </aside>

    <section class="content">
        <h1>Metas de Ahorro</h1>
        <div class="search-bar">
            <input type="text" placeholder="Buscar" class="search-input">
            <a href="/MoneyMinder/index.php/agregarMetaAhorro" class="add-button">Agregar Meta de Ahorro</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Monto Ahorrar</th>
                    <th>Monto Actual</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($metas) && !empty($metas)): ?>
                    <?php foreach ($metas as $meta): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($meta['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($meta['monto_ahorrar']); ?></td>
                            <td><?php echo htmlspecialchars($meta['monto_actual']); ?></td>
                            <td><?php echo htmlspecialchars($meta['fecha_inicio']); ?></td>
                            <td><?php echo htmlspecialchars($meta['fecha_fin']); ?></td>
                            <td>
                                <form action="/MoneyMinder/index.php/editarMetaAhorro" method="get" style="display: inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $meta['id']; ?>">
                                    <button class="edit-button" type="submit">✏️</button>
                                </form>
                                <form action="/MoneyMinder/index.php/eliminarMetaAhorro" method="post" style="display: inline-block;" class="delete-form">
                                    <input type="hidden" name="id" value="<?php echo $meta['id']; ?>">
                                    <button type="button" class="delete-button" data-id="<?php echo $meta['id']; ?>">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay metas de ahorro disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>
<script>
function cerrarSesion() {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Vas a cerrar tu sesión.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b4a7d6',
        cancelButtonColor: '#b4a7d6',
        confirmButtonText: 'Sí, cerrar sesión',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirigir a la ruta de cierre de sesión
            window.location.href = '/MoneyMinder/index.php/cerrarSesion';
        }
    });
}
</script>

<footer>
    <p>© 2024 Money Minder</p>
</footer>

<script>
function cerrarSesion() {
    window.location.href = '/MoneyMinder/index.php';
}

document.addEventListener('DOMContentLoaded', function () {
    // Agregar eventos a los botones de eliminar
    document.querySelectorAll('.delete-button').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Evitar el envío del formulario predeterminado
            const form = this.closest('.delete-form');
            const id = this.getAttribute('data-id');
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
                    // Enviar la solicitud de eliminación
                    form.submit();
                    Swal.fire(
                        'Eliminado!',
                        'La meta de ahorro ha sido eliminada.',
                        'success'
                    );
                }
            });
        });
    });
});
</script>

</body>
</html>