document.addEventListener('DOMContentLoaded', () => {
    const questions = document.querySelectorAll('.question');
    questions.forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            if (answer.style.display === 'block') {
                answer.style.display = 'none';
                question.querySelector('.arrow').textContent = '▼';
            } else {
                answer.style.display = 'block';
                question.querySelector('.arrow').textContent = '▲';
            }
        });
    });
});
