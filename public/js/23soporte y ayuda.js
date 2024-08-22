document.querySelectorAll('.question').forEach(item => {
    item.addEventListener('click', () => {
        const answer = item.nextElementSibling;
        const arrow = item.querySelector('.arrow');

        if (answer.style.display === 'block') {
            answer.style.display = 'none';
            arrow.textContent = '▼';
        } else {
            answer.style.display = 'block';
            arrow.textContent = '▲';
        }
    });
});
