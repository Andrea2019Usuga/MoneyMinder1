document.addEventListener('DOMContentLoaded', function() {
    // Selección de elementos de la página
    const introSection = document.querySelector('.intro');
    const mainImageSection = document.querySelector('#index-main-image img');
    const loginButton = document.querySelector('.button-container form:first-child button');

    // Cambio de color de fondo en la sección de introducción
    if (introSection) {
        introSection.addEventListener('mouseover', function() {
            introSection.style.backgroundColor = '#f0f0f0';
        });

        introSection.addEventListener('mouseout', function() {
            introSection.style.backgroundColor = '';
        });
    }

    // Agregar borde a la imagen principal al hacer clic
    if (mainImageSection) {
        mainImageSection.addEventListener('click', function() {
            mainImageSection.style.border = '2px solid #000';
        });
    }

    // Cambio de texto en el botón de "Iniciar sesión"
    if (loginButton) {
        loginButton.addEventListener('click', function() {
            loginButton.textContent = 'Iniciando sesión...';
        });
    }
});
