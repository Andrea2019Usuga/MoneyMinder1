document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("loginForm");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const errorMessage = document.getElementById("error-message");
  
    form.addEventListener("submit", function (event) {
      // Prevenir el envío del formulario
      event.preventDefault();
  
      // Validar campos
      const emailValue = email.value.trim();
      const passwordValue = password.value.trim();
  
      if (emailValue === "" || passwordValue === "") {
        showError("Por favor, diligencie todos los campos.");
      } else if (!validateEmail(emailValue)) {
        showError("Correo electrónico no válido.");
      } else if (!validatePassword(passwordValue)) {
        showError("La contraseña debe tener al menos 8 caracteres.");
      } else {
        // Redirigir al usuario a la página principal si los datos son correctos
        window.location.href = "6menu principal ingresos.html";
      }
    });
  
    function validateEmail(email) {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email);
    }
  
    function validatePassword(password) {
      return password.length >= 8;
    }
  
    function showError(message) {
      errorMessage.textContent = message;
      errorMessage.style.display = "block";
    }
  });