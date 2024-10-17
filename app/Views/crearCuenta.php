<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/crearCuenta.css" />
    
  </head>
  <body>
    <main>
      <section class="form-container">
        <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo-login" />
        <h1>Crear Cuenta</h1>
        <form id="registration-form" action="/MoneyMinder/index.php/crearUsuario" method="post">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" required />
          <div id="tooltip-nombre" class="tooltip"></div>

          <label for="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" required />
          <div id="tooltip-apellido" class="tooltip"></div>

          <label for="fecha-nacimiento">Fecha de nacimiento</label>
          <input
            type="date"
            id="fecha-nacimiento"
            name="fecha-nacimiento"
            required
          />
          <div id="tooltip-fecha-nacimiento" class="tooltip"></div>

          <label for="correo">Correo electrónico</label>
          <input type="email" id="correo" name="correo" required />
          <div id="tooltip-correo" class="tooltip"></div>

          <label for="contrasena">Contraseña</label>
          <input type="password" id="contrasena" name="contrasena" required minlength="8" />
          <div id="tooltip-contrasena" class="tooltip"></div>

          <div id="button-container">
            <button id="register-button" type="submit">Registrar</button>
          </div>
        </form>
      </section>
      <section class="right-side"></section>
    </main>
    <script src="/MoneyMinder/public/js/crearCuenta.js"></script>
  </body>
</html>