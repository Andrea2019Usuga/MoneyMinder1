document.addEventListener("DOMContentLoaded", function() {
    const backToLoginButton = document.querySelector(".button-link button");

    backToLoginButton.addEventListener("click", function() {
        window.location.href = "2Inicio sesion.html";
    });
});