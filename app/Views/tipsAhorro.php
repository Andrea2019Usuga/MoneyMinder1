<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips de Ahorro</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/tipsAhorro.css">
    <script src="/MoneyMinder/public/js/tipsAhorro.js"></script>
</head>
<body>
<?php
//porcion de codigo para guardar el nombre de usuario
if (isset($_SESSION['usuario_id'])) {
    //asignar a variable
    $userid = $_SESSION['usuario_id'];
    $username= $_SESSION['nombre_usuario'];
}
?>    
    <header>
       <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo">
       
        <div class="user-profile">
            <div class="user-details">
                <span><?php echo ($username)?></span>
                <button onclick="window.location.href='16Editar perfil.html'">Editar Perfil</button>
                <button type="button" onclick="cerrarSesion()">Cerrar Sesión</button>
            </div>
        </div>
    </header>
    <main>
        <aside class="sidebar">
            <button class="menu-item selected no-pointer">Menú principal</button>
            <a href="/MoneyMinder/index.php/menuPrincipalIngresos" class="menu-item">Ingresos</a>
            <a href="/MoneyMinder/index.php/gastos" class="menu-item">Gastos</a>
            <a href="/MoneyMinder/index.php/metasDeAhorro" class="menu-item">Metas de ahorro</a>
            <a href="/MoneyMinder/index.php/tipsAhorro" class="menu-item selected">Tips de ahorro</a>
            <a href="/MoneyMinder/index.php/configuracionCambiarContrasena" class="menu-item">Configuración</a>
        </aside>
        <section class="content">
            <h1>Tips de Ahorro</h1>
            <div class="tips-container">
                <img src="/MoneyMinder/public/img/tipAhorroUno.jpeg" alt="Tip de Ahorro 1">
                <img src="/MoneyMinder/public/img/tipAhorroDos.jpeg" alt="Tip de Ahorro 2">
                <img src="/MoneyMinder/public/img/tipAhorroTres.jpeg" alt="Tip de Ahorro 3">
                <img src="/MoneyMinder/public/img/tipAhorroCuatro.jpeg" alt="Tip de Ahorro 4">
            </div>
        </section>
 </section>
   
 
    </main>
    <footer>
        <p>© 2024 Money Minder</p>
    </footer>
</body>
</html>
