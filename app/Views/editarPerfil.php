<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/editarPerfil.css">
  </head>
  <body>
    <main>
      <section class="form-container">
        <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo-login">

        <h1>Editar Perfil</h1>

        <!-- Formulario para editar perfil -->
        <form id="edit-profile-form" action="/MoneyMinder/index.php/actualizarPerfil" method="post">
          
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" 
                 value="<?php echo isset($usuario['nombre']) ? htmlspecialchars($usuario['nombre']) : ''; ?>" 
                 required />
          <div id="tooltip-nombre" class="tooltip"></div>

          <label for="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" 
                 value="<?php echo isset($usuario['apellido']) ? htmlspecialchars($usuario['apellido']) : ''; ?>" 
                 required />
          <div id="tooltip-apellido" class="tooltip"></div>

          <label for="correo_electronico">Correo</label>
          <input type="email" id="correo_electronico" name="correo_electronico" 
                 value="<?php echo isset($usuario['correo_electronico']) ? htmlspecialchars($usuario['correo_electronico']) : ''; ?>" 
                 required />
          <div id="tooltip-correo" class="tooltip"></div>

          <label for="fecha-nacimiento">Fecha de Nacimiento</label>
          <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" 
                 value="<?php echo isset($usuario['fecha_nacimiento']) ? htmlspecialchars($usuario['fecha_nacimiento']) : ''; ?>" 
                 required />
          <div id="tooltip-fecha-nacimiento" class="tooltip"></div>

          <!-- Botón para guardar los cambios del perfil -->
          <button type="submit">Guardar Cambios</button>
        </form>
      </section>
    </main>
  </body>
</html>
