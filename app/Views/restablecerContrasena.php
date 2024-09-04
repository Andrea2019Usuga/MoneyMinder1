<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - Money Minder</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/restablecerContrasena.css">
</head>
<body>
    <main>
        <section class="form-container">
        <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo-login">
            <h1>Restablecer Contraseña</h1>
        
            <div class="description-container">
                <p class="description">
                    Para restablecer tu contraseña, ingresa tu <br>correo electrónico a continuación y <br> envíalo. Se enviará a tu correo electrónico <br> un código único de restablecimiento.
                </p>
                
                <form id="reset-form" action="/MoneyMinder/index.php/requestReset" method="post">


                 <label for="email"><br>Correo electrónico</label>
                 <input type="email" id="email" name="email" required>
                 <div class="button-container">
                 <button type="submit">Enviar código</button>
                 </div>
             </form>


            </div>
        </section>
        
        <section class="side-background"></section>
    </main>
   
</body>
</html>