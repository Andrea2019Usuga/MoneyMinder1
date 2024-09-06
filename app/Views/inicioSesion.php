<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Money Minder</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/2inicio sesion.css">
</head>
<body>
    <main>
        <section class="form-container">
            <!-- Se añadió el logo encima del título -->
            <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo-login" />
            <h1>Iniciar sesión</h1>
            <form id="loginForm" method="post" action="/MoneyMinder/index.php/login">
                <label for="email">Correo:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required minlength="8">
                <div class="button-container">
                    <button type="submit">Ingresar</button>
                </div>
            </form>
            <div class="remember-forgot">
    <label class="checkbox-container">
        <input type="checkbox" id="remember" name="remember">
        <span>Recordar sesión</span>
    </label>
    
</div>

        </section>
        <section class="side-background"></section>
    </main>
    <script src="/MoneyMinder/public/js/iniciosesion.js"></script>
</body>
</html>