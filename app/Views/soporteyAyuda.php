<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte y Ayuda</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/soporteyAyuda.css">
    <script src="/MoneyMinder/public/js/soporteyAyuda.js"></script>
</head>
<body>
    <header>
    <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo">
    </header>
    
    <div class="faq-container">
        <h1>Soporte y Ayuda</h1>
        <div class="faq-item">
            <div class="question">
                ¿Cómo funciona esta aplicación para ayudarme a ahorrar dinero?
                <span class="arrow">▼</span>
            </div>
            <div class="answer">
                <p>Esta aplicación web funciona como una agenda de ahorro personal. Te permite agregar tus ingresos y gastos, establecer metas de ahorro específicas y te proporciona consejos útiles sobre cómo mejorar tus hábitos financieros. Al llevar un registro detallado de tus finanzas, puedes identificar áreas donde puedes reducir gastos y ahorrar más eficazmente.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="question">
                ¿Cómo puedo realizar un seguimiento de mis ingresos?
                <span class="arrow">▼</span>
            </div>
            <div class="answer">
                <p>Puedes realizar un seguimiento de tus ingresos ingresándolos manualmente en la sección de ingresos de la aplicación. Además, la aplicación te permite categorizar tus ingresos para que puedas tener un mejor control y visión de tus fuentes de dinero, facilitando así el cumplimiento de tus metas de ahorro.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="question">
                ¿Qué debo hacer si tengo problemas técnicos?
                <span class="arrow">▼</span>
            </div>
            <div class="answer">
                <p>Si experimentas problemas técnicos, primero revisa la sección de Soporte y Ayuda en la aplicación, donde encontrarás respuestas a preguntas frecuentes y guías para resolver problemas comunes.Si el problema persiste, por favor contáctanos a través del correo electrónico appmoneyminder@gmail.com</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="question">
                ¿Cómo se asegura la aplicación sobre la protección de mis datos?
                <span class="arrow">▼</span>
            </div>
            <div class="answer">
                <p>La aplicación utiliza encriptación de datos y almacenamiento seguro para proteger tu información financiera. Además, cumple con estrictas políticas de privacidad para garantizar que tus datos personales no sean compartidos con terceros sin tu consentimiento. Estas medidas aseguran que tu información esté segura mientras utilizas la aplicación para gestionar tu ahorro personal.</p>
            </div>
        </div>
    </div>
    <script>
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
</script>
</body>
</html>
