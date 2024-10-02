// Seleccionamos todas las preguntas
const questions = document.querySelectorAll('.question');

// Añadimos un event listener a cada una
questions.forEach(question => {
  question.addEventListener('click', () => {
    // Obtenemos el siguiente elemento (que es la respuesta)
    const answer = question.nextElementSibling;

    // Alternamos el estado de visibilidad
    if (answer.style.display === 'block') {
      answer.style.display = 'none';
      question.querySelector('.arrow').textContent = '▼'; // Cambiamos la flecha a ▼
    } else {
      answer.style.display = 'block';
      question.querySelector('.arrow').textContent = '▲'; // Cambiamos la flecha a ▲
    }
  });
});
