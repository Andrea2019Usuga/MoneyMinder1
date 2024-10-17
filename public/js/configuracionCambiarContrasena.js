function toggleDropdown() {
    var dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('show');
}

// Cerrar el menú desplegable si el usuario hace clic fuera de él
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-toggle')) {
        const dropdowns = document.getElementsByClassName("dropdown-content");
        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}