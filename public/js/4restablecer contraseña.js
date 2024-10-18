document
  .getElementById("reset-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    var email = document.getElementById("email").value;

    // Aquí puedes agregar una llamada a una API para enviar el código de restablecimiento.
    // Ejemplo de petición fetch (suponiendo que tienes un endpoint para manejar esto):
    /*
    fetch('https://tu-api-endpoint.com/restablecer-contrasena', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        // Manejar respuesta exitosa
        alert('Código de restablecimiento enviado. Revisa tu correo electrónico.');
    })
    .catch(error => {
        // Manejar errores
        console.error('Error:', error);
        alert('Hubo un problema al enviar el código de restablecimiento.');
    });
    */

    // Simulación de envío exitoso
    setTimeout(function () {
      window.location.href = "5anuncio restablecer contraseña.html";
    }, 1000);
  });